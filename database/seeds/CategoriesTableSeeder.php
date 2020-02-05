<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        for($cat_id = 1; $cat_id <= 10; $cat_id++){
            Category::create(array(
                'id' => $cat_id,
                'name' => "Категория $cat_id",
                'description' => "Категория $cat_id",
                'created_at' => date('Y-m-d h:m:s', time()),
            ));
        }
    }
}
