<?php

namespace App\Versions\Private\Swagger\Controllers;

use App\Versions\Private\Swagger\Pagination;
use App\Versions\Private\Swagger\Resources\CommentResource;
use App\Versions\Private\Swagger\Responses\NotFoundResponse;
use App\Versions\Private\Swagger\Responses\UnauthorizedResponse;
use OpenApi\Attributes as OA;

interface CommentController
{
    #[OA\Get(
        path: '/comments',
        description: 'Список комментариев',
        summary: 'Список комментариев',
        security: [
            ['api-key' => []],
        ],
        tags: ['Comments'],
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
                    items: new OA\Items(ref: CommentResource::class),
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
        path: '/comments/{comment}',
        description: 'Просмотр комментария',
        summary: 'Просмотр комментария',
        security: [
            ['api-key' => []],
        ],
        tags: ['Comments'],
        parameters: [
            new OA\Parameter(
                name: 'comment',
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
                    ref: CommentResource::class,
                ),
            ],
        ),
    )]
    #[NotFoundResponse]
    #[UnauthorizedResponse]
    public function show();
}