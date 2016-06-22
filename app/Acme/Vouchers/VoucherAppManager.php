<?php

namespace App\Acme\Vouchers;

use App\Acme\Vouchers\AvailableVoucherInterface;

class VoucherAppManager
{

    /**
     * 
     * @param type $voucherId
     * @return type
     * @throws \App\Acme\Vouchers\VoucherException
     */
    public function getVoucherObject($voucherId)
    {
        $voucherLookupArray = config('voucherLookup');
        
        if(!array_key_exists($voucherId, $voucherLookupArray)) {
            throw new \App\Acme\Vouchers\VoucherException('Incorrect voucher type, pass one from: ' .implode(', ', array_keys($voucherLookupArray)));
        }

        $className = $voucherLookupArray[$voucherId];

        return app($className, ['voucherId' => $voucherId]);  
    }
    
    /**
     * 
     * @param AvailableVoucherInterface $data
     * @return type
     */
    public function getAvailableVouchers(AvailableVoucherInterface $data)
    {
        return $data->generate();
    }
}