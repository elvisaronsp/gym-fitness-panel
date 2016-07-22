<?php

namespace App\Entities\CustomerVoucher;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CustomerVoucher extends Model implements Transformable
{
    use TransformableTrait;

    const CREATED_AT = 'customer_voucher_created_at';
    const UPDATED_AT = null;
    
    const VISITS_AVAILABLE = 'available';
    const VISITS_NOAVAILABLE = 'noavailable';
    
    protected $primaryKey = 'customer_voucher_id';
    
    protected $fillable = [
        'customer_voucher_name',
        'customer_voucher_customer_id',
        'customer_voucher_type',
        'customer_voucher_visit_limit',
        'customer_voucher_payed_at',
        'customer_voucher_expired_at'
    ];
    
    protected $dates = [
        'customer_voucher_created_at',
        'customer_voucher_payed_at',
        'customer_voucher_expired_at'
    ];
    
    protected $customer_voucher_visit_used = null;
    
    public function setCustomerVoucherVisitUsed($value)
    {
        $this->customer_voucher_visit_used = $value;
    }
    
    public function getCustomerVoucherVisitUsed()
    {
        if (!is_null($this->customer_voucher_visit_used))
        {
            return $this->customer_voucher_visit_used;
        }
        
        return count($this->Visits) ? array_sum($this->Visits->lists('customer_visit_quantity', 'customer_visit_id')->toArray()) : 0;
    }
    
    public function hasVisitsLimit()
    {
       return $this->customer_voucher_visit_limit > 0 ?: false; 
    }
    
    public function getExpiredDate()
    {
        if ($this->hasExpiredDate()) {
            return (new \Carbon\Carbon($this->customer_voucher_expired_at))->format('Y-m-d');
        }
        
        return null;
    }
    
    public function hasExpiredDate()
    {
        return !is_null($this->customer_voucher_expired_at);
    }
    
    public function getVisitsAvailableInfo()
    {
        return $this->getVisitsUsed().' / '.$this->getVisitsAvailable();
    }
    
    public function getVisitsUsed()
    {
        return $this->getCustomerVoucherVisitUsed();
    }
    
    public function getVisitsAvailable()
    {
       return $this->customer_voucher_visit_limit; 
    }
    
    public function hasVisitsAvailable()
    {
        return $this->hasVisits(self::VISITS_AVAILABLE);
    }
    
    public function hasNoVisitsAvailable()
    {
        return $this->hasVisits(self::VISITS_NOAVAILABLE);
    }
    
    public function hasVisits($availabilityType = self::VISITS_AVAILABLE)
    {
        if ($this->hasVisitsLimit()) {
            return $this->getVisitsByAbaialability($availabilityType);
        }
        
        return false;
    }
    
    public function getVisitsByAbaialability($availabilityType)
    {
             switch ($availabilityType)
            {
                case self::VISITS_AVAILABLE :
                    $state = $this->getVisitsUsed() < $this->getVisitsAvailable() ?: false;
                    break;

                case self::VISITS_NOAVAILABLE :
                    $state = $this->getVisitsUsed() >= $this->getVisitsAvailable() ?: false;
                    break;
                
                default :
                    $state = false;
                    break;
            }
            
            return $state;
    }
    
    public function isPayed()
    {
        if (!is_null($this->customer_voucher_payed_at)) {
            return true;
        }
        
        return false;
    }
    
    public function isExpired()
    {
        if ($this->hasExpiredDate()) {
            $now = \Carbon\Carbon::now();
            $expiredAt = new \Carbon\Carbon($this->customer_voucher_expired_at);
            
            return $now->gte($expiredAt);
        }
        
        return false;
    }
    
    public function isNotAvailableForUse()
    {
        return $this->isExpired() || ($this->hasNoVisitsAvailable());
    }
    
    public function customer()
    {
        return $this->hasOne('App\Entities\Customer\Customer', 'customer_id', 'customer_voucher_customer_id')->withTrashed();
    }
    
    public function visits()
    {
        return $this->hasMany('App\Entities\CustomerVisit\CustomerVisit', 'customer_visit_voucher_id', 'customer_voucher_id');
    }
}
