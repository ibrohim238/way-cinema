<?php

namespace App\Versions\Private\Http\Controllers;

use App\Models\Comment;
use App\Versions\Private\Http\CommentResource;
use App\Versions\Private\Reporters\CommentReporter;
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
}
