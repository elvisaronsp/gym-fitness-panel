<?php

namespace App\Repositories\Product;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Product\ProductRepository;
use App\Entities\Product\Product;
use App\Validators\Product\ProductValidator;
use App\Repositories\ProductWarehouse\ProductWarehouseRepository;
use DB;

/**
 * Class ProductRepositoryEloquent
 * @package namespace App\Repositories\Product;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    
    public function create(array $attributes)
    {
        return DB::transaction(function() use ($attributes){
            
            $product = parent::create($attributes);
            
            if (array_key_exists('product_warehouse_quantity', $attributes)) {
                $productWarehouse = app('\App\Repositories\ProductWarehouse\ProductWarehouseRepository');
                $productWarehouse->create([
                    'product_warehouse_product_id' => $product->product_id,
                    'product_warehouse_quantity' => $attributes['product_warehouse_quantity']
                ]);   
            }
            
            return $product;
        });
    }
            
}
