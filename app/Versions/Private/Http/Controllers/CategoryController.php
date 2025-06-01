<?php

namespace App\Versions\Private\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Versions\Private\Reporters\CategoryReporter;
use Illuminate\Http\Request;

class CategoryController
{
    public function index(CategoryReporter $reporter, Request $request)
    {
        $categories = $reporter
            ->execute($request)
            ->paginate($request->get('limit', 15));

        return CategoryResource::collection($categories);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
}
