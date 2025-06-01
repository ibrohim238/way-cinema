<?php

namespace App\Versions\Private\Reporters;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class TeamReporter
{
    public function execute(User $user, ?Request $request = null): QueryBuilder|Team
    {
        return QueryBuilder::for($user->teams(), $request);
    }
}
