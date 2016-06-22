<?php

namespace App\Acme\Vouchers\VoucherTypes;

use App\Acme\Vouchers\TimeVoucher;
use App\Repositories\CustomerVoucher\CustomerVoucherRepository;

class ThirtyDayLengthVoucher extends TimeVoucher
{
    protected $dayLimit = 30;
    
    public function __construct(CustomerVoucherRepository $customerVoucher, $voucherId) 
    {
        parent::__construct($customerVoucher, $voucherId, $this->dayLimit);
    }
}