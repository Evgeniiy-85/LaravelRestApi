<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProdInCat;

class ProductsInCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prod_in_cat')->delete();

        $products = Product::select(['products.id'])
            ->get()
            ->toArray();

        $categories = Category::select(['categories.id'])
            ->get()
            ->toArray();

        $cat_ids =  array_column($categories, 'id');

        $data = [];

        foreach ($products as $product) {
            $count_cats = rand(1,4);
            $rand_cat_ids = [];

            for ($count_cats = 1; $count_cats <= rand(1,3); $count_cats++) {
                $cat_id = $cat_ids[rand(0, count($cat_ids)-1)];

                while (array_search($cat_id , $rand_cat_ids) !== false) {
                    $cat_id = $cat_ids[rand(0, count($cat_ids)-1)];
                }

                $rand_cat_ids[] = $cat_id;

                ProdInCat::create(array(
                    'prod_id' => $product['id'],
                    'cat_id' => $cat_id
                ));
            }
        }
    }
}
