<?php

namespace App\Infrastructure\Exception;

use App\Infrastructure\Enum\CodeEnum;

class NotFoundHttpException extends AbstractException
{
    protected function message(): string
    {
        return '';
    }

    protected function code(): int
    {
        return CodeEnum::NOT_FOUND->value;
    }
}