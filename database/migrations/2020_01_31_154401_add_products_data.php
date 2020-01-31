<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('products')) {
            DB::table('products')->insert(
                array(
                    'id' => 1,
                    'name' => 'Товар 1',
                    'short_description' => 'Товар 1',
                    'description' => 'Тестовый товар 1',
                    'price' => 100,
                    'average_rating' => 4.2,
                    'created_at' => date('Y-m-d h:m:s', time()),
                )
            );
            DB::table('products')->insert(
                array(
                    'id' => 2,
                    'name' => 'Товар 2',
                    'short_description' => 'Товар 2',
                    'description' => 'Тестовый товар 2',
                    'price' => 110,
                    'average_rating' => 4.3,
                    'created_at' => date('Y-m-d h:m:s', time()),
                )
            );
            DB::table('products')->insert(
                array(
                    'id' => 3,
                    'name' => 'Товар 3',
                    'short_description' => 'Товар 3',
                    'description' => 'Тестовый товар 3',
                    'price' => 120,
                    'average_rating' => 4.3,
                    'created_at' => date('Y-m-d h:m:s', time()),
                )
            );
            DB::table('products')->insert(
                array(
                    'id' => 4,
                    'name' => 'Товар 4',
                    'short_description' => 'Товар 4',
                    'description' => 'Тестовый товар 4',
                    'price' => 130,
                    'average_rating' => 4.4,
                    'created_at' => date('Y-m-d h:m:s', time()),
                )
            );
            DB::table('products')->insert(
                array(
                    'id' => 5,
                    'name' => 'Товар 5',
                    'short_description' => 'Товар 5',
                    'description' => 'Тестовый товар 5',
                    'price' => 140,
                    'average_rating' => 4.5,
                    'created_at' => date('Y-m-d h:m:s', time()),
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
        Schema::table('products', function($table)
        {
            $table->truncate();
        });
    }
}
