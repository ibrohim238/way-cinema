<?php

namespace App\Versions\Private\Swagger\Resources;

use Carbon\Carbon;
use OpenApi\Attributes as OA;

#[OA\Schema(
    title: 'TeamResource',
    description: 'Team Resource',
    xml: new OA\Xml(
        name: 'TeamResource',
    ),
)]
final readonly class TeamResource
{
    #[OA\Property(
        title: 'id',
        description: 'Идентификатор команды',
        format: 'int64',
        example: 1,
    )]
    private int $id;

    #[OA\Property(
        title: 'name',
        description: 'Название команды',
        example: 'Development',
    )]
    private string $name;

    #[OA\Property(
        title: 'owner_id',
        description: 'идентификатор владельца',
        format: 'int64',
    )]
    private int $owner_id;

    #[OA\Property(
        title: 'created_at',
        description: 'Дата и время создания',
        type: 'string',
        format: 'datetime',
        example: '2024-05-20 14:30:00',
    )]
    private Carbon $created_at;

    #[OA\Property(
        title: 'updated_at',
        description: 'Дата и время последнего обновления',
        type: 'string',
        format: 'datetime',
        example: '2024-05-25 09:15:00',
    )]
    private Carbon $updated_at;
}
