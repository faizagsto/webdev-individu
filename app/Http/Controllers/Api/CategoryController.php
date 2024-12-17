<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\ListCategoriesRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category; // Import the Category model

class CategoryController extends Controller
{
    public function __invoke(ListCategoriesRequest $request)
    {
        // Query the Category model
        $categories = Category::where('category_id', $request->category_id)->get();

        return CategoryResource::collection($categories);
    }
}
