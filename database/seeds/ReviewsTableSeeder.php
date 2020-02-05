<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\User;
use App\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->delete();

        $ratings = [
            3 => 'Товар плохого качества',
            4 => 'Товар хорошего качества',
            5 => 'Товар отличного качества'
        ];

        $products = Product::select(['products.id'])
            ->get()
            ->toArray();

        $users = User::select(['users.id'])
            ->get()
            ->toArray();

        $prod_ids =  array_column($products, 'id');
        $user_ids = array_column($users, 'id');

        foreach($prod_ids as $prod_id) {
            $rating = rand(3, 5);

            Review::create(array(
                'user_id' => $user_ids[rand(0, count($user_ids)-1)],
                'prod_id' => $prod_id,
                'review' => $ratings[$rating],
                'rating' => $rating,
                'created_at' => date('Y-m-d h:m:s', time()),
            ));
        }
    }
}
