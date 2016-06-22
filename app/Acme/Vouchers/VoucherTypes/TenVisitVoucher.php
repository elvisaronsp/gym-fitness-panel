<?php

namespace App\Acme\Vouchers\VoucherTypes;

use App\Acme\Vouchers\VisitVoucher;
use App\Repositories\CustomerVoucher\CustomerVoucherRepository;

class TenVisitVoucher extends VisitVoucher
{
    protected $visitLimit = 10;
    
    public function __construct(CustomerVoucherRepository $customerVoucher, $voucherId) 
    {
        parent::__construct($customerVoucher, $voucherId, $this->visitLimit);
    }
}