<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        for($user_id = 1; $user_id <= 10; $user_id++) {
            User::create(array(
                'id' => $user_id,
                'name' => "User{$user_id}",
                'email' => "test{$user_id}@mail.ru",
                'password' => bcrypt(str_random(16)),
                'created_at' => date('Y-m-d h:m:s', time()),
            ));
        }
    }
}
