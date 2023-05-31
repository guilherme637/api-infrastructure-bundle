<?php

namespace App\Infrastructure\Exception\Status200;

use App\Infrastructure\Enum\CodeEnum;
use App\Infrastructure\Exception\AbstractException;

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