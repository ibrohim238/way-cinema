<?php

namespace App\Rules;

use App\Enums\CommentModelTypeEnum;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class CommentableRule implements ValidationRule, DataAwareRule
{
    private mixed $modelType = null;

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_string($this->modelType)) {
            return;
        }

        if (!CommentModelTypeEnum::has($this->modelType)) {
            return;
        }

        if (!is_int($value)) {
            return;
        }

        $enum = CommentModelTypeEnum::from($this->modelType);

        $model = $enum->getMorphedModelClass();

        $model = $model::find($value);

        if ($model === null) {
            $fail('The selected ' . $enum->value . ' does not exist.');
        }
    }

    public function setData(array $data): void
    {
        if (!isset($data['model_type'])) {
            $this->modelType = $data['model_type'];
        }
    }
}
