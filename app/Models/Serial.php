<?php

namespace App\Models;

use App\Enums\SerialTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serial extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
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
}
