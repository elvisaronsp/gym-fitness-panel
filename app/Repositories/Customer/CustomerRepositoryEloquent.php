<?php

namespace App\Repositories\Customer;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Customer\CustomerRepository;
use App\Entities\Customer\Customer;
use App\Validators\Customer\CustomerValidator;

use App\Acme\Vouchers\Voucher;
use DB;

/**
 * Class CustomerRepositoryEloquent
 * @package namespace App\Repositories\Customer;
 */
class CustomerRepositoryEloquent extends BaseRepository implements CustomerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Customer::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    /**
     * 
     * @param type $data
     * @param VoucherInterface $voucher
     */
    public function createWithAssignVoucher($data, Voucher $voucher)
    {
        DB::transaction(function() use ($data, $voucher){
            
            $customer = $this->create($data);
            $data['id'] = $customer->customer_id;
            
            $this->assignVoucher($data, $voucher);
        });
    }
    
    /**
     * 
     * @param type $data
     * @param VoucherInterface $voucher
     */
    public function assignVoucher($data, Voucher $voucher)
    {
        if (isset($data['customer_voucher_payed']) && $data['customer_voucher_payed'] != 0) {
            $voucher->setPayedAt(\Carbon\Carbon::now()->format('Y-m-d H:i:s'));
        }

        $voucher->assignToCustomer($data['id']);
    }
    
    /**
     * 
     * @return type
     */
    public function allWithNotAvailableVouchers()
    {
        $all = $this->with('Voucher')->all();
        
        $filtered = $all->filter(function($item) {
            return $item->Voucher->isNotAvailableForUse();
        });
        
        return $filtered->all();
    }
}
