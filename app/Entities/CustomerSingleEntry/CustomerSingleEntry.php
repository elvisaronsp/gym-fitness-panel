<?php

namespace App\Entities\CustomerSingleEntry;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class CustomerSingleEntry extends Model implements Transformable
{
    use TransformableTrait;

    const CREATED_AT = 'customer_single_entry_created_at';
    const UPDATED_AT = null;
    
    protected $fillable = [
        'customer_single_entry_quantity'
    ];

    protected $dates = [
        'customer_single_entry_created_at'
    ];
}
