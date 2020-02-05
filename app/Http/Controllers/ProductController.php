<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ProductController extends Controller
{
    public function index(Request $request) {
        $query = App\Product::productWithData();

        if ($category_id = (int)$request->get('category_id')) {
            $query
                ->join('prod_in_cat', 'prod_in_cat.prod_id', '=', 'products.id')
                ->where('prod_in_cat.cat_id', $category_id);
        }

        $products = $query
            ->paginate(12)
            ->toArray();

        if (empty($products['data'])) {
            abort('404');
        }

        return \Response::json([
            'products' => [
                'page' => $products['current_page'],
                'pages' => $products['last_page'],
                'data' => $products['data']
            ]
        ]);
    }

    public function show($id) {
        $product = App\Product::productWithData()
            ->findOrFail($id);

        return \Response::json(['product' => $product->toArray()]);
    }
}