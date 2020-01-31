<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductsInCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('prod_in_cat')) {
            DB::table('prod_in_cat')->insert(
                array(
                    'prod_id' => 1,
                    'cat_id' => 1,
                )
            );
            DB::table('prod_in_cat')->insert(
                array(
                    'prod_id' => 1,
                    'cat_id' => 2,
                )
            );
            DB::table('prod_in_cat')->insert(
                array(
                    'prod_id' => 2,
                    'cat_id' => 2,
                )
            );
            DB::table('prod_in_cat')->insert(
                array(
                    'prod_id' => 3,
                    'cat_id' => 1,
                )
            );
            DB::table('prod_in_cat')->insert(
                array(
                    'prod_id' => 4,
                    'cat_id' => 2,
                )
            );
            DB::table('prod_in_cat')->insert(
                array(
                    'prod_id' => 4,
                    'cat_id' => 3,
                )
            );
            DB::table('prod_in_cat')->insert(
                array(
                    'prod_id' => 5,
                    'cat_id' => 3,
                )
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prod_in_cat', function($table)
        {
            $table->truncate();
        });
    }
}
