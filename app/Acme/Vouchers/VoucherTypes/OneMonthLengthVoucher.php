<?php

namespace App\Acme\Vouchers\VoucherTypes;

use App\Acme\Vouchers\TimeVoucher;
use App\Repositories\CustomerVoucher\CustomerVoucherRepository;
use Carbon\Carbon;

class OneMonthLengthVoucher extends TimeVoucher
{
    protected $dayLimit = 30;
    
    public function __construct(CustomerVoucherRepository $customerVoucher, $voucherId) 
    {
        parent::__construct($customerVoucher, $voucherId, $this->dayLimit);
    }
    
    public function getExpiredAtPeriod()
    {
        return Carbon::now()->addMonth()->subDay()->format('Y-m-d');
    }
    
    public function getVoucherName() 
    {
        return 'Karnet na 1 miesiąc';
    }
}