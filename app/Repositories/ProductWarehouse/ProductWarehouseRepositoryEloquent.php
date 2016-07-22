<?php

namespace App\Repositories\ProductWarehouse;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductWarehouse\ProductWarehouseRepository;
use App\Entities\ProductWarehouse\ProductWarehouse;
use App\Validators\ProductWarehouse\ProductWarehouseValidator;
use App\Entities\Product\Product;

/**
 * Class ProductWarehouseRepositoryEloquent
 * @package namespace App\Repositories\ProductWarehouse;
 */
class ProductWarehouseRepositoryEloquent extends BaseRepository implements ProductWarehouseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductWarehouse::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function getSellQuantity($quantity)
    {
        if (!$this->isValidQuantity($quantity)) {
            throw new \RuntimeException('Quantity must be numeric.');
        }
        
        return ($quantity * (-1));
    }
    
    private function isValidQuantity($quantity)
    {
        return is_numeric($quantity);
    }
    
    public function getCorrectQuantity(Product $product, $correctQuantity)
    {
        $currentQuantity = $product->getCurrentQuantity();
        if ($this->isCurrentQuantityGreaterThanZero($currentQuantity)) {
            return ($currentQuantity - $correctQuantity) * (-1);
        }
        
        return $correctQuantity;
    }
    
    public function isCurrentQuantityGreaterThanZero($currentQuantity)
    {
        return $currentQuantity > 0;
    }
    
    public function saveProductSell(Product $product, $quantity)
    {
        return $this->saveProductQuantity($product, $this->getSellQuantity($quantity));
    }
    
    public function saveProductCorrect(Product $product, $quantity)
    {
        return $this->saveProductQuantity($product, $this->getCorrectQuantity($product, $quantity));
    }
    
    public function saveProductQuantity(Product $product, $quantity)
    {
        return $this->create([
            'product_warehouse_product_id' => $product->product_id,
            'product_warehouse_quantity' => $quantity
        ]);
    }
    
}
