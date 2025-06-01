<?php

namespace App\Versions\Private\Services;

use App\Models\Comment;
use App\Versions\Private\Http\Dtos\CommentDto;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

final readonly class CommentService
{
    public function __construct(
        private Comment $comment,
    ) {
    }

    public function store(CommentDto $dto): Comment
    {
        $this->comment->fill($dto->toArrayForStore());
        $this->comment->save();

        Media::findMany($dto->getMediaIds())
            ->each(fn(Media $media) => $media->move($this->comment));

        return $this->comment;
    }

    public function update(CommentDto $dto): Comment
    {
        $this->comment->fill($dto->toArrayForUpdate());
        $this->comment->save();

        $this->comment
            ->media()
            ->whereNotIn('id', $dto->getMediaIds())
            ->cursor()
            ->map(fn(Media $media) => $media->delete());
        Media::findMany($dto->getMediaIds())
            ->each(function (Media $media) {
                $media->move($this->comment);
            });

        return $this->comment;
    }

    public function destroy(): void
    {
        $this->comment->delete();
    }
}
