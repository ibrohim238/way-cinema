<?php

namespace App\Versions\Admin\Services;

use App\Models\Team;

final readonly class TeamService
{
    public function __construct(
        private Team $team,
    ) {
    }

    public function destroy(): void
    {
        $this->team->delete();
    }
}
