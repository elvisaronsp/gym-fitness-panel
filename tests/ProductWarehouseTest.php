<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductWarehouseTest extends TestCase
{
    public function testCorrectMethod()
    {
        $product = \App\Entities\Product\Product::first();
        $productWarehouse = app('\App\Repositories\ProductWarehouse\ProductWarehouseRepository');
        $newQuantity = rand(0, 300);
        $oldQuanaity = $product->getCurrentQuantity();
        $diff = $productWarehouse->getCorrectQuantity($product, $newQuantity);
        
        $this->assertTrue($newQuantity === ($oldQuanaity+$diff));
        
    }
    
    public function testInstance()
    {
        $this->assertTrue(is_object(factory(App\Entities\ProductWarehouse\ProductWarehouse::class)->make()));
    }
}
