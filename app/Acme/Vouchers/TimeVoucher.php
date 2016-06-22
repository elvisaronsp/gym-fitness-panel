<?php

namespace App\Acme\Vouchers;

use App\Acme\Vouchers\Voucher;
use App\Acme\Vouchers\VoucherTimeInterface;

use App\Repositories\CustomerVoucher\CustomerVoucherRepository;
use Carbon\Carbon;

class TimeVoucher extends Voucher implements VoucherTimeInterface
{
    protected $dayLimit = null;
    
    public function __construct(CustomerVoucherRepository $customerVoucher, $voucherId, $dayLimit) 
    {
        parent::__construct($voucherId);
        
        $this->customerVoucher = $customerVoucher;
        $this->dayLimit = (int)$dayLimit;
    }
    
    /**
     * 
     * @return type
     */
    public function getDayLimit()
    {
        return $this->dayLimit;
    }
    
    /**
     * 
     * @return type
     */
    public function getExpiredAtPeriod()
    {
        return Carbon::now()->addDays($this->getDayLimit())->format('Y-m-d');
    }
    
    /**
     * 
     * @return type
     */
    public function getVoucherName()
    {
        return "Karnet na {$this->getDayLimit()} dni";
    }
    
    /**
     * 
     * @param type $customerId
     * @return type
     */
    public function assignToCustomer($customerId)
    {
        return $this->customerVoucher->create([
                'customer_voucher_name' => $this->getVoucherName(),
                'customer_voucher_customer_id' => $customerId,
                'customer_voucher_type' => $this->getVoucherId(),
                'customer_voucher_visit_limit' => null,
                'customer_voucher_payed_at' => $this->getPayedAt(),
                'customer_voucher_expired_at' => $this->getExpiredAtPeriod()
            ]);
    }
}