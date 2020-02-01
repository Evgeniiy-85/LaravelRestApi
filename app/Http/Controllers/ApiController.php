<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ApiController extends Controller
{
    public function product($id)
    {
        try {
            $product = App\Product::select(['id', 'name', 'description', 'short_description', 'price'])
                ->with(['categories' => function ($query) {
                    $query->select(['categories.id', 'categories.name', 'categories.description']);
                }])
                ->find($id);

            if (!$product) {
                throw new \Exception('Товар не найден');
            }

            $reviews = App\Review::select(['id', 'review', 'rating', 'prod_id', 'user_id'])
                ->with(['user' => function ($query) {
                    $query->select(['users.id', 'users.name']);
                }])
                ->where('prod_id', $product->id)
                ->get()
                ->toArray();

            return \Response::json([
                'status' => 'ok',
                'product' => array_merge($product->toArray(), ['reviews' => $reviews])
            ], 200, [
                'Content-Type'                     => 'application/json; charset=UTF-8',
                'charset'                          => 'utf-8',
                'Access-Control-Allow-Origin'      => '*',
                'Access-Control-Allow-Credentials' => 'true'
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        } catch (\Exception $e) {
            return \Response::json(['status' => 'error', 'description'=> $e->getMessage()], 200, [
                'Content-Type'                     => 'application/json; charset=UTF-8',
                'charset'                          => 'utf-8',
                'Access-Control-Allow-Origin'      => '*',
                'Access-Control-Allow-Credentials' => 'true'
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }

    public function products(Request $request)
    {
        try {
            $query = App\Product::select(['products.id', 'products.name', 'products.description', 'products.short_description', 'products.price'])
                ->with(['categories' => function ($query) {
                    $query->select(['categories.id', 'categories.name', 'categories.description']);
                }])
                ->join('prod_in_cat', 'prod_in_cat.prod_id', '=', 'products.id');

            if ($category_id = (int)$request->get('category_id')) {
                $query->where('prod_in_cat.cat_id', $category_id);
            }

            $products = $query
                ->paginate(12)
                ->toArray();

            if (empty($products['data'])) {
                throw new \Exception('Товары не найдены');
            }

            $products['data'] = array_map(function($product) {
                $reviews = App\Review::select(['id', 'review', 'rating', 'prod_id', 'user_id'])
                    ->with(['user' => function ($query) {
                        $query->select(['users.id', 'users.name']);
                    }])
                    ->where('prod_id', $product['id'])
                    ->get()
                    ->toArray();

                return array_merge($product, ['reviews' => $reviews]);
            }, $products['data']);

            return \Response::json([
                'status' => 'ok',
                'products' => [
                    'page' => $products['current_page'],
                    'pages' => $products['last_page'],
                    'data' => $products['data']
                ]
            ], 200, [
                'Content-Type'                     => 'application/json; charset=UTF-8',
                'charset'                          => 'utf-8',
                'Access-Control-Allow-Origin'      => '*',
                'Access-Control-Allow-Credentials' => 'true'
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        } catch (\Exception $e) {
            return \Response::json(['status' => 'error', 'description'=> $e->getMessage()], 200, [
                'Content-Type'                     => 'application/json; charset=UTF-8',
                'charset'                          => 'utf-8',
                'Access-Control-Allow-Origin'      => '*',
                'Access-Control-Allow-Credentials' => 'true'
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }

    public function category($id)
    {
        try {
            $category = App\Category::select(['id', 'name', 'description'])
                ->withCount('products')
                ->find($id);

            if (!$category) {
                throw new \Exception('Категория не найдена');
            }

            return \Response::json([
                'status' => 'ok',
                'category' => $category->toArray()
            ], 200, [
                'Content-Type'                     => 'application/json; charset=UTF-8',
                'charset'                          => 'utf-8',
                'Access-Control-Allow-Origin'      => '*',
                'Access-Control-Allow-Credentials' => 'true'
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        } catch (\Exception $e) {
            return \Response::json(['status' => 'error', 'description'=> $e->getMessage()], 200, [
                'Content-Type'                     => 'application/json; charset=UTF-8',
                'charset'                          => 'utf-8',
                'Access-Control-Allow-Origin'      => '*',
                'Access-Control-Allow-Credentials' => 'true'
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }

    public function categories()
    {
        try {
            $categories = App\Category::select(['id', 'name', 'description'])
                ->withCount('products')
                ->get();

            if (count($categories) < 1) {
                throw new \Exception('Категории не найдены');
            }

            return \Response::json([
                'status' => 'ok',
                'categories' => $categories->toArray()
            ], 200, [
                'Content-Type'                     => 'application/json; charset=UTF-8',
                'charset'                          => 'utf-8',
                'Access-Control-Allow-Origin'      => '*',
                'Access-Control-Allow-Credentials' => 'true'
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } catch (\Exception $e) {
            return \Response::json(['status' => 'error', 'description'=> $e->getMessage()], 200, [
                'Content-Type'                     => 'application/json; charset=UTF-8',
                'charset'                          => 'utf-8',
                'Access-Control-Allow-Origin'      => '*',
                'Access-Control-Allow-Credentials' => 'true'
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
}
