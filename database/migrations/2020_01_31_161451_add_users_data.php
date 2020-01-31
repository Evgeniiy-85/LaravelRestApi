<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            DB::table('users')->insert(
                array(
                    'id' => 1,
                    'name' => 'Евгений',
                    'email' => 'test@mail.ru',
                    'password' => 'e10adc3949ba59abbe56e057f20f883e',
                    'remember_token' => '',
                    'created_at' => date('Y-m-d h:m:s', time()),
                )
            );
            DB::table('users')->insert(
                array(
                    'id' => 2,
                    'name' => 'Василий',
                    'email' => 'test2@mail.ru',
                    'password' => 'e10adc3949ba59abbe56e057f20f883e',
                    'remember_token' => '',
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
        Schema::table('users', function($table)
        {
            $table->truncate();
        });
    }
}
