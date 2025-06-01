<?php

namespace App\Versions\Private\Reporters;

use App\Models\Comment;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CommentReporter
{
    public function execute(?Request $request = null): QueryBuilder
    {
        return QueryBuilder::for(Comment::class, $request)
            ->allowedFilters([
                AllowedFilter::exact('model_type'),
                AllowedFilter::exact('model_id'),
            ]);
    }
}
