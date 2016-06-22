<?php

namespace App\Acme\Vouchers;

use App\Acme\Vouchers\Voucher;
use App\Acme\Vouchers\VoucherVisitInterface;

use App\Repositories\CustomerVoucher\CustomerVoucherRepository;

class VisitVoucher extends Voucher implements VoucherVisitInterface
{
    
    private $visitLimit = null;
    
    public function __construct(CustomerVoucherRepository $customerVoucher, $voucherId, $visitLimit) 
    {
        parent::__construct($voucherId);
        
        $this->customerVoucher = $customerVoucher;
        $this->visitLimit = (int)$visitLimit;
    }
    
    /**
     * 
     * @return type
     */
    public function getVoucherName()
    {
        return 'Karnet '.$this->visitLimit.' wejść';
    }
    
    /**
     * 
     * @return type
     */
    public function getVisitLimit()
    {
        return $this->visitLimit;
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
                'customer_voucher_visit_limit' => $this->getVisitLimit(),
                'customer_voucher_payed_at' => $this->getPayedAt(),
            ]);
    }
}
