<?php

namespace App\Acme\Vouchers;

use App\Acme\Vouchers\AvailableVoucher;
use App\Acme\Vouchers\AvailableVoucherInterface;

class AvailableVoucherArray extends AvailableVoucher implements AvailableVoucherInterface
{
    /**
     * 
     * @return type
     */
    public function generate()
    {
        $voucherLookup = $this->getFactoryConfig();
        
        $voucherArray = [];
        foreach ($voucherLookup as $voucherId => $voucherClass) {
            $voucher = $this->createVoucherInstance($voucherClass, $voucherId);
            $voucherArray[] = [
                'id' => $voucherId,
                'name' => $voucher->getVoucherName()
            ];
        }
        
        return $voucherArray;
    }
}