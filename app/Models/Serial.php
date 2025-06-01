<?php

namespace App\Models;

use App\Enums\SerialTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Serial extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'type',
        'rating',
    ];

    protected $casts = [
        'type'   => SerialTypeEnum::class,
        'rating' => 'decimal:2',
    ];

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
