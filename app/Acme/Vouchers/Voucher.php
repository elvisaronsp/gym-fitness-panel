<?php

namespace App\Acme\Vouchers;

abstract class Voucher
{
    protected $payedAt = null;
    protected $voucherId = null;
    protected $dateTimeFormat = 'Y-m-d H:i:s';
    
    public function __construct($voucherId)
    {
        $this->voucherId = $voucherId;
    }
    
    /**
     * 
     * @return type
     */
    public function getDateTimeFormat()
    {
        return $this->dateTimeFormat;
    }
    
    /**
     * 
     * @return type
     */
    public function getPayedAt()
    {
        return $this->payedAt;
    }
    
    /**
     * 
     * @param type $date
     * @throws \App\Acme\Vouchers\VoucherException
     */
    public function setPayedAt($date)
    {
        $format = $this->getDateTimeFormat();
        $d = \DateTime::createFromFormat($format, $date);
        
        if (false === ($d && $d->format($format) == $date)) {
            throw new \App\Acme\Vouchers\VoucherException("Date must have format {$format}");
        }
        
        $this->payedAt = $date;
    }
    
    /**
     * 
     * @return type
     */
    public function getVoucherId()
    {
        return $this->voucherId;
    }
    
    abstract public function getVoucherName();
    
    abstract public function assignToCustomer($customerId);
}
