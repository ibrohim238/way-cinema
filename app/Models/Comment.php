<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Comment extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function children(): MorphMany
    {
        return $this->morphMany(Comment::class, 'model');
    }

    public function childrenRecursive(): MorphMany
    {
        return $this->children()->with('childrenRecursive');
    }
}
