<?php

namespace App\Versions\Private\Http\Requests;

use App\Enums\CommentModelTypeEnum;
use App\Enums\MediaCollectionNameEnum;
use App\Rules\CommentableRule;
use App\Versions\Private\Http\Dtos\CommentDto;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content'    => ['required', 'string', 'max:255'],
            'media_id.*' => ['required', 'array', 'max:4'],
            'media_id'   => [
                'required',
                Rule::exists(Media::class, 'id')
                    ->where(function (Builder $query) {
                        $query
                            ->where(function (Builder $query) {
                                $query->where('model_type', 'user')
                                    ->where('collection_name', MediaCollectionNameEnum::TEMP);
                            })
                            ->orWhere(function (Builder $query) {
                                $query->where('model_type', 'category');
                            });
                    }),

            ],
            'model_type' => [
                Rule::excludeIf($this->method() !== 'POST'),
                'required',
                'string',
                Rule::enum(CommentModelTypeEnum::class),
            ],
            'model_id' => [
                Rule::excludeIf($this->method() !== 'POST'),
                'required',
                'int',
                new CommentableRule(),
            ],
        ];
    }

    public function toDto(): CommentDto
    {
        return CommentDto::fromRequest($this);
    }
}
