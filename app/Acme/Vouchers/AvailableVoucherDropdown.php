<?php

namespace App\Acme\Vouchers;

use App\Acme\Vouchers\AvailableVoucher;
use App\Acme\Vouchers\AvailableVoucherInterface;

class AvailableVoucherDropdown extends AvailableVoucher implements AvailableVoucherInterface
{
    
    const DEFAULT_DROPDOWN_ITEM_INDEX = 0;
    const DEFAULT_DROPDOWN_ITEM_TEXT = '- wybierz karnet -';
    
    /**
     * 
     * @return type
     */
    public function generate()
    {
        $voucherLookup = $this->getFactoryConfig();
        $dropdownArray[self::DEFAULT_DROPDOWN_ITEM_INDEX] = self::DEFAULT_DROPDOWN_ITEM_TEXT;
        
        foreach ($voucherLookup as $voucherId => $voucherClass) {
            $voucher = $this->createVoucherInstance($voucherClass, $voucherId);
            $dropdownArray[$voucherId] = $voucher->getVoucherName();
        }
        
        return $dropdownArray;
    }
}