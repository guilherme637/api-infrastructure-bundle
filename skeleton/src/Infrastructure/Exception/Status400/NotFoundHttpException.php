<?php

namespace App\Infrastructure\Exception\Status400;

use App\Infrastructure\Enum\CodeEnum;
use App\Infrastructure\Exception\AbstractException;

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