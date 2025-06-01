<?php

namespace App\Versions\Admin\Http\Controllers;

use App\Models\Team;
use App\Versions\Admin\Reporters\TeamReporter;
use App\Http\Resources\TeamResource;
use App\Versions\Admin\Services\TeamService;
use Illuminate\Http\Request;

class TeamController
{
    public function index(TeamReporter $reporter, Request $request)
    {
        $teams = $reporter
            ->execute($request)
            ->paginate($request->get('limit', 15));

        return TeamResource::collection($teams);
    }

    public function show(Team $team)
    {
        return TeamResource::make($team);
    }

    public function destroy(Team $team)
    {
        app(
            TeamService::class,
            [
                'team' => $team,
            ],
        )
            ->destroy();

        return response()->noContent();
    }
}
