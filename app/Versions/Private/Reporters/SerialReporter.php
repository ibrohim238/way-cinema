<?php

namespace App\Versions\Private\Reporters;

use App\Models\Serial;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SerialReporter
{
    public function execute(?Request $request = null): QueryBuilder|Serial
    {
        return QueryBuilder::for(Serial::class, $request)
            ->allowedFilters([
                AllowedFilter::partial('title'),
                AllowedFilter::exact('category_id', 'categories.id'),
            ]);
    }
}
