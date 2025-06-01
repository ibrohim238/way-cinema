<?php

namespace App\Versions\Private\Reporters;

use App\Models\Serial;
use App\Models\Team;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class SerialReporter
{
    public function execute(?Request $request = null): QueryBuilder|Team
    {
        return QueryBuilder::for(Serial::class, $request);
    }
}
