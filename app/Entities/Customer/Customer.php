<?php

namespace App\Entities\Customer;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    const CREATED_AT = 'customer_created_at';
    const UPDATED_AT = 'customer_updated_at';    
    const DELETED_AT = 'customer_deleted_at';
     
    protected $primaryKey = 'customer_id';
    
    protected $fillable = [
        'customer_name',
        'customer_surname',
        'customer_phone'
    ];
    
    protected $dates = [
        'customer_created_at',
        'customer_updated_at',
        //'customer_deleted_at'
    ];

    public function namePresenter()
    {
        return $this->customer_surname . ' '. $this->customer_name;
    }
    
    public function isDeleted()
    {
        return !is_null($this->customer_deleted_at);
    }
    
    public function voucher()
    {
        $relation = $this->hasOne('App\Entities\CustomerVoucher\CustomerVoucher', 'customer_voucher_customer_id', 'customer_id')
                ->with('Visits')
                ->orderBy('customer_voucher_id', 'DESC');
        
        return $relation;
    }
    
    public function vouchers()
    {
        return $this->hasMany('App\Entities\CustomerVoucher\CustomerVoucher', 'customer_voucher_customer_id', 'customer_id')
                ->orderBy('customer_voucher_id', 'DESC');
    }
    
    /**
     * use only with criteria Customer\WithVisitVoucher
     * @return type
     */
    public function visitVoucher()
    {
        return $this->hasOne('App\Entities\CustomerVoucher\CustomerVoucher', 'customer_voucher_id', 'customer_voucher_id')
                ->with('Visits');
    }
}
