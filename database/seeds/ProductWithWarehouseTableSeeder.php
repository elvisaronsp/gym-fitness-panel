<?php

use Illuminate\Database\Seeder;

class ProductWithWarehouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\Product\Product::class, 10)
                ->create()
                ->each(function($product) {
                    $i = 0;
                    while($i < rand(1,5)) {
                        $quantities = factory(App\Entities\ProductWarehouse\ProductWarehouse::class)->make();
                        $product->quantites()->save($quantities);
                        $i++;
                    }
        });
    }
}
