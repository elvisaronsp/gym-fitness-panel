<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInstance()
    {
        $product = factory(App\Entities\Product\Product::class)->make();

        $this->assertTrue(strlen($product->product_name) > 0);
    }
}