<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('categories')) {
            DB::table('categories')->insert(
                array(
                    'id' => 1,
                    'name' => 'Категория 1',
                    'description' => 'Категория 1',
                    'created_at' => date('Y-m-d h:m:s', time()),
                )
            );
            DB::table('categories')->insert(
                array(
                    'id' => 2,
                    'name' => 'Категория 2',
                    'description' => 'Категория 2',
                    'created_at' => date('Y-m-d h:m:s', time()),
                )
            );
            DB::table('categories')->insert(
                array(
                    'id' => 3,
                    'name' => 'Категория 3',
                    'description' => 'Категория 3',
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
        //
    }
}
