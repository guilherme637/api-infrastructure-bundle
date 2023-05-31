<?php

namespace App\Infrastructure\Exception;

use App\Infrastructure\Enum\CodeEnum;

class InternalServerHttpException extends AbstractException
{
    protected function message(): string
    {
        return 'Internal Server Error.';
    }

    protected function code(): int
    {
        return CodeEnum::INTERNAL_SERVER->value;
    }
}