<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReviewsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('reviews')) {
            DB::table('reviews')->insert(
                array(
                    'user_id' => 1,
                    'prod_id' => 1,
                    'review' => 'Товар хорошего качества',
                    'rating' => 4,
                    'created_at' => date('Y-m-d h:m:s', time()),
                )
            );
            DB::table('reviews')->insert(
                array(
                    'user_id' => 1,
                    'prod_id' => 2,
                    'review' => 'Товар среднего качества',
                    'rating' => 3,
                    'created_at' => date('Y-m-d h:m:s', time()),
                )
            );
            DB::table('reviews')->insert(
                array(
                    'user_id' => 1,
                    'prod_id' => 3,
                    'review' => 'Товар отличного качества',
                    'rating' => 5,
                    'created_at' => date('Y-m-d h:m:s', time()),
                )
            );
            DB::table('reviews')->insert(
                array(
                    'user_id' => 2,
                    'prod_id' => 1,
                    'review' => 'Товар отличного качества',
                    'rating' => 5,
                    'created_at' => date('Y-m-d h:m:s', time()),
                )
            );
            DB::table('reviews')->insert(
                array(
                    'user_id' => 2,
                    'prod_id' => 2,
                    'review' => 'Товар хорошего качества',
                    'rating' => 4,
                    'created_at' => date('Y-m-d h:m:s', time()),
                )
            );
            DB::table('reviews')->insert(
                array(
                    'user_id' => 2,
                    'prod_id' => 4,
                    'review' => 'Товар хорошего качества',
                    'rating' => 4,
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
        Schema::table('reviews', function($table)
        {
            $table->truncate();
        });
    }
}
