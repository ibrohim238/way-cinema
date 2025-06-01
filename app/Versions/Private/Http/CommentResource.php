<?php

namespace App\Versions\Private\Http;

use App\Http\Resources\JsonResource;
use App\Models\Comment;
use Illuminate\Http\Request;

/**
 * @mixin Comment
*/
class CommentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'text'       => $this->text,
            'children'   => CommentResource::collection($this->whenLoaded('childrenRecursive')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
