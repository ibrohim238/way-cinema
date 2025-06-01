<?php

namespace App\Http\Resources;

use App\Http\Resources\JsonResource;
use App\Models\Team;
use Illuminate\Http\Request;

/**
 * @mixin Team
 */
class TeamResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
