<?php

namespace App\Entities\CustomerVisit;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CustomerVisit extends Model implements Transformable
{
    use TransformableTrait;

    const CREATED_AT = 'customer_visit_created_at';
    const UPDATED_AT = null;
    
    protected $primaryKey = 'customer_visit_id';
    
    protected $fillable = [
        'customer_visit_voucher_id',
        'customer_visit_quantity'
    ];

    protected $dates = [
        'customer_visit_created_at'
    ];
    
    public function voucher()
    {
        return $this->hasOne('App\Entities\CustomerVoucher\CustomerVoucher', 'customer_voucher_id', 'customer_visit_voucher_id')
                ->with('Customer');
    }
}
