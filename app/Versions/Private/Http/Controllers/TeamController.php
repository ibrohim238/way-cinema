<?php

namespace App\Versions\Private\Http\Controllers;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Versions\Private\Reporters\TeamReporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController
{
    public function index(TeamReporter $reporter, Request $request)
    {
        $user = Auth::user();

        $teams = $reporter
            ->execute(
                $user,
                $request,
            )
            ->paginate($request->get('limit', 15));

        return TeamResource::collection($teams);
    }

    public function show(Team $team)
    {
        $user = Auth::user();

        if (!$team->users()->whereAttachedTo($user)->exists()) {
            abort('403', 'action not authorized');
        }

        return TeamResource::make($team);
    }
}
