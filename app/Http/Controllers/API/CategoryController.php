<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function fetch()
    {
        $categories = Category::select('id', 'name')->get();
        return response()->json([
            'status' => 'success',
            'data' => $categories
        ]);
    }
}
