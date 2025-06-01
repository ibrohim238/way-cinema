<?php

namespace App\Versions\Admin\Reporters;

use App\Models\Team;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class TeamReporter
{
    public function execute(?Request $request = null): QueryBuilder|Team
    {
        return QueryBuilder::for(Team::class, $request);
    }
}
