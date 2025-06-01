<?php

namespace App\Versions\Private\Http\Controllers;

use App\Models\Comment;
use App\Versions\Private\Http\CommentResource;
use App\Versions\Private\Http\Requests\CommentRequest;
use App\Versions\Private\Reporters\CommentReporter;
use App\Versions\Private\Services\CommentService;
use Illuminate\Http\Request;

class CommentController
{
    public function index(CommentReporter $reporter, Request $request)
    {
        $comments = $reporter
            ->execute($request)
            ->paginate($request->get('limit', 15));

        return CommentResource::collection($comments);
    }

    public function show(Comment $comment)
    {
        $comment->load('childrenRecursive');

        return CommentResource::make($comment);
    }

    public function store(CommentRequest $request, CommentService $service)
    {
        $comment = $service->store($request->toDto());

        return CommentResource::make($comment);
    }

    public function update(Comment $comment, CommentRequest $request)
    {
        $comment = app(CommentService::class, [
            'comment' => $comment,
        ])
            ->update($request->toDto());

        return CommentResource::make($comment);
    }

    public function destroy(Comment $comment)
    {
        app(CommentService::class, [
            'comment' => $comment,
        ])
            ->destroy();

        return response()->noContent();
    }
}
