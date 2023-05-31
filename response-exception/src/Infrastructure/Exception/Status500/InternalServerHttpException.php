<?php

namespace App\Infrastructure\Exception\Status500;

use App\Infrastructure\Enum\CodeEnum;
use App\Infrastructure\Exception\AbstractException;

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