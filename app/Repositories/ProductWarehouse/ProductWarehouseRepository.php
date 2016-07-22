<?php

namespace App\Repositories\ProductWarehouse;

use Prettus\Repository\Contracts\RepositoryInterface;
use App\Entities\Product\Product;

/**
 * Interface ProductWarehouseRepository
 * @package namespace App\Repositories\ProductWarehouse;
 */
interface ProductWarehouseRepository extends RepositoryInterface
{
    public function getSellQuantity($quantity);
    public function getCorrectQuantity(Product $product, $correctQuantity);
    public function saveProductSell(Product $product, $quantity);
    public function saveProductCorrect(Product $product, $quantity);
    public function saveProductQuantity(Product $product, $quantity);
}
