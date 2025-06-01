<?php

namespace App\Versions\Private\Http\Dtos;

use App\Enums\CommentModelTypeEnum;
use App\Versions\Private\Http\Requests\CommentRequest;

final readonly class CommentDto
{
    public function __construct(
        private CommentModelTypeEnum $modelType,
        private int $modelId,
        private string $content,
        private array $mediaId,
    ) {
    }

    public static function fromRequest(CommentRequest $request): self
    {
        return new self(
            modelType: $request->get('model_type'),
            modelId: $request->get('model_id'),
            content: $request->get('content'),
            mediaId: $request->get('media_id'),
        );
    }

    public function toArrayForStore(): array
    {
        return [
            'model_type' => $this->modelType->value,
            'model_id'   => $this->modelId,
            'content'    => $this->content,
        ];
    }

    public function toArrayForUpdate(): array
    {
        return [
            'content' => $this->content,
        ];
    }

    public function getMediaIds(): array
    {
        return $this->mediaId;
    }
}
