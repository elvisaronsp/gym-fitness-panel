<?php

namespace App\Entities\ProductWarehouse;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductWarehouse extends Model implements Transformable
{
    use TransformableTrait;

    const CREATED_AT = 'product_warehouse_created_at';
    const UPDATED_AT = null;
    
    protected $primaryKey = 'product_warehouse_id';
    
    protected $fillable = [
        'product_warehouse_product_id',
        'product_warehouse_quantity'
    ];

    protected $dates = [
        'product_warehouse_created_at'
    ];

}
