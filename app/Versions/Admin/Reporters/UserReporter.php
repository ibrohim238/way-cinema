<?php

namespace App\Versions\Admin\Reporters;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class UserReporter
{
    public function execute(?Request $request = null): QueryBuilder|User
    {
        return QueryBuilder::for(User::class, $request);
    }
}
