<?php

namespace App\Versions\Private\Reporters;

use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryReporter
{
    public function execute(?Request $request = null): QueryBuilder|Category
    {
        return QueryBuilder::for(Category::class, $request);
    }
}
