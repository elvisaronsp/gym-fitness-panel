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
        $customer = $this->create($data);
        $data[self::FORM_CUSTOMER_ID_INDEX] = $customer->customer_id;
        $this->assignVoucher($data, $voucher);
    }
    
    public function createWithAssignVoucherTransaction($data, Voucher $voucher)
    {
        return DB::transaction(function() use ($data, $voucher){
            $this->createWithAssignVoucher($data, $voucher);
        });
    }
    
    private function isCustomerVoucherPayed(array $data)
    {
        return isset($data[self::FORM_CUSTOMER_VOUCHER_PAYED_INDEX]) && $data[self::FORM_CUSTOMER_VOUCHER_PAYED_INDEX] != 0;
    }
    
    /**
     * 
     * @param type $data
     * @param VoucherInterface $voucher
     */
    public function assignVoucher($data, Voucher $voucher)
    {
        if ($this->isCustomerVoucherPayed($data)) {
            $voucher->setPayedAt(\Carbon\Carbon::now()->format($voucher->getDateTimeFormat()));
        }

        $voucher->assignToCustomer($data[self::FORM_CUSTOMER_ID_INDEX]);
    }
    
    public function allWithVoucher()
    {
        return $this->with('Voucher')->all();
    }
    
    /**
     * 
     * @return type
     */
    public function allWithNotAvailableVouchers()
    {
        $filtered = $this->allWithVoucher()->filter(function($item) {
            return $item->Voucher->isNotAvailableForUse();
        });
        
        return $filtered->all();
    }
}
