<?php

namespace App\Versions\Private\Swagger\Resources;

use Carbon\Carbon;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: 'SerialResource',
    description: 'Serial Resource',
    xml: new OA\Xml(
        name: 'SerialResource',
    ),
)]
final readonly class SerialResource
{
    #[OA\Property(
        title: 'id',
        description: 'Идентификатор сериала',
        format: 'int64',
        example: 1,
    )]
    private int $id;

    #[OA\Property(
        title: 'name',
        description: 'Название сериала',
        example: 'Breaking Bad',
    )]
    private string $name;

    #[OA\Property(
        title: 'description',
        description: 'Описание сериала',
        example: 'История учителя химии, ставшего наркобароном',
    )]
    private string $description;

    #[OA\Property(
        title: 'type',
        description: 'Тип контента',
        example: 'serial',
    )]
    private string $type;

    #[OA\Property(
        title: 'rating',
        description: 'Рейтинг сериала',
        format: 'float',
    )]
    private string $rating;

    #[OA\Property(
        title: 'created_at',
        description: 'Дата и время создания',
        type: 'string',
        format: 'datetime',
        example: '2024-01-15 18:20:00',
    )]
    private Carbon $created_at;

    #[OA\Property(
        title: 'updated_at',
        description: 'Дата и время последнего обновления',
        type: 'string',
        format: 'datetime',
        example: '2024-02-01 12:00:00',
    )]
    private Carbon $updated_at;
}
