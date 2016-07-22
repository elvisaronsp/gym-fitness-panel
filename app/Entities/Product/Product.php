<?php

namespace App\Entities\Product;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;

    const CREATED_AT = 'product_created_at';
    const UPDATED_AT = null;
    
    protected $primaryKey = 'product_id';
    
    protected $fillable = [
        'product_name'
    ];

    protected $dates = [
        'product_created_at'
    ];
    
    public function quantites()
    {
        return $this->hasMany('App\Entities\ProductWarehouse\ProductWarehouse', 'product_warehouse_product_id', 'product_id');
    }
    
    public function currentQuantity()
    {
        return $this->hasOne('App\Entities\ProductWarehouse\ProductWarehouse', 'product_warehouse_product_id', 'product_id')
                ->addSelect('*', \DB::raw('SUM(product_warehouse_quantity) AS product_warehouse_quantity'))
                ->groupBy('product_warehouse_product_id');
    }
    
    public function getCurrentQuantity()
    {
        if (false === $this->hasCurrentQuantity()) {
            return 0;
        }
        
        return $this->CurrentQuantity->product_warehouse_quantity;
    }
    
    public function hasCurrentQuantity()
    {
        return !is_null($this->CurrentQuantity);
    }
}
