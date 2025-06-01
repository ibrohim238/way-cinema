<?php

namespace App\Enums;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

enum CommentModelTypeEnum: string
{
    use EnumTrait;

    case COMMENT = 'comment';
    case SERIAL  = 'serial';
    case USER    = 'user';

    /**
     * @return class-string<Model>
     */
    public function getMorphedModelClass(): string
    {
        return Relation::getMorphedModel($this->value);
    }
}
