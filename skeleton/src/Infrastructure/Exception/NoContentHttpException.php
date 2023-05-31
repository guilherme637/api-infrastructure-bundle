<?php

namespace App\Infrastructure\Exception;

use App\Infrastructure\Enum\CodeEnum;

class NoContentHttpException extends AbstractException
{
    protected function message(): string
    {
        return '';
    }

    protected function code(): int
    {
        return CodeEnum::NO_CONTENT->value;
    }
}