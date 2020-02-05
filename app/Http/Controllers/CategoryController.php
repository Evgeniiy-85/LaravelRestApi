<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class CategoryController extends Controller
{
    public function index() {
        $categories = App\Category::select(['id', 'name', 'description'])
            ->withCount('products')
            ->get();

        return \Response::json(['categories' => $categories->toArray()]);
    }

    public function show($id) {
        $category = App\Category::select(['id', 'name', 'description'])
            ->findOrFail($id);

        return \Response::json(['category' => $category->toArray()]);
    }
}