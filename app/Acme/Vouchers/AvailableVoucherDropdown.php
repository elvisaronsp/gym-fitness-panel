<?php

namespace App\Acme\Vouchers;

use App\Acme\Vouchers\AvailableVoucher;
use App\Acme\Vouchers\AvailableVoucherInterface;

class AvailableVoucherDropdown extends AvailableVoucher implements AvailableVoucherInterface
{
    
    /**
     * 
     * @return type
     */
    public function generate()
    {
        $voucherLookup = $this->getFactoryConfig();
        $dropdownArray[0] = '- wybierz karnet -';
        
        foreach ($voucherLookup as $voucherId => $voucherClass) {
            $voucher = $this->createVoucherInstance($voucherClass, $voucherId);
            $dropdownArray[$voucherId] = $voucher->getVoucherName();
        }
        
        return $dropdownArray;
    }
}