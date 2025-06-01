<?php

namespace App\Versions\Admin\Swagger\Controllers;

use App\Versions\Admin\Swagger\Pagination;
use App\Versions\Admin\Swagger\Resources\TeamResource;
use App\Versions\Admin\Swagger\Responses\NotFoundResponse;
use App\Versions\Admin\Swagger\Responses\UnauthorizedResponse;
use OpenApi\Attributes as OA;

interface TeamController
{
    #[OA\Get(
        path: '/teams',
        description: 'Список команд',
        summary: 'Список команд',
        security: [
            [
                'api-key' => [],
            ],
        ],
        tags: ['Teams'],
        parameters: [
            new OA\Parameter(
                name: 'limit',
                in: 'query',
                required: false,
                schema: new OA\Schema(type: 'integer'),
            ),
            new OA\Parameter(
                name: 'page',
                in: 'query',
                required: false,
                schema: new OA\Schema(type: 'integer'),
            ),
        ],
    )]
    #[OA\Response(
        response: 200,
        description: 'OK',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: 'data',
                    type: 'array',
                    items: new OA\Items(ref: TeamResource::class),
                ),
                new OA\Property(
                    property: 'meta',
                    ref: Pagination::class,
                ),
            ],
        ),
    )]
    public function index();

    #[OA\Get(
        path: '/teams/{team}',
        description: 'Просмотр команды',
        summary: 'Просмотр команды',
        security: [
            [
                'api-key' => [],
            ],
        ],
        tags: ['Teams'],
        parameters: [
            new OA\Parameter(
                name: 'team',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer'),
            ),
        ],
    )]
    #[OA\Response(
        response: 200,
        description: 'OK',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(
                    property: 'data',
                    ref: TeamResource::class,
                ),
            ],
        ),
    )]
    #[NotFoundResponse]
    #[UnauthorizedResponse]
    public function show();

    #[OA\Delete(
        path: '/teams/{team}',
        description: 'Удалить команду',
        summary: 'Удалить команду',
        security: [
            [
                'api-key' => [],
            ],
        ],
        tags: ['Teams'],
        parameters: [
            new OA\Parameter(
                name: 'team',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer'),
            ),
        ],
    )]
    #[OA\Response(
        response: 204,
        description: 'No Content',
        content: new OA\JsonContent(),
    )]
    #[NotFoundResponse]
    #[UnauthorizedResponse]
    public function destroy();
}
