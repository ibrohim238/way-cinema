<?php

namespace App\Versions\Private\Swagger\Resources;

use Carbon\Carbon;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: 'CommentResource',
    description: 'Comment Resource',
    xml: new OA\Xml(
        name: 'CommentResource',
    ),
)]
final readonly class CommentResource
{
    #[OA\Property(
        title: 'id',
        description: 'Идентификатор комментария',
        format: 'int64',
        example: 1,
    )]
    private int $id;

    #[OA\Property(
        title: 'text',
        description: 'Текст комментария',
        example: 'Отличная статья!',
    )]
    private string $text;

    #[OA\Property(
        title: 'children',
        description: 'Вложенные ответы',
        type: 'array',
        items: new OA\Items(ref: CommentResource::class),
    )]
    private array $children;

    #[OA\Property(
        title: 'created_at',
        description: 'Дата и время создания',
        type: 'string',
        format: 'datetime',
        example: '2024-04-01 12:34:56',
    )]
    private Carbon $created_at;

    #[OA\Property(
        title: 'updated_at',
        description: 'Дата и время последнего обновления',
        type: 'string',
        format: 'datetime',
        example: '2024-04-02 14:00:00',
    )]
    private Carbon $updated_at;
}