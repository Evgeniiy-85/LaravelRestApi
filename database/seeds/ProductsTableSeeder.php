<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        for($prod_id = 1; $prod_id <= 100; $prod_id++) {
            Product::create(array(
                'id' => $prod_id,
                'name' => "Товар $prod_id",
                'short_description' => "Товар $prod_id",
                'description' => "Тестовый товар $prod_id",
                'price' => rand(100, 1000),
                'average_rating' => rand(3, 5),
                'created_at' => date('Y-m-d h:m:s', time()),
            ));
        }
    }
}
