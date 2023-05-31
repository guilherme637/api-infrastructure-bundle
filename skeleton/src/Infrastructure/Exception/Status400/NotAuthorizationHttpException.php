<?php

namespace App\Infrastructure\Exception\Status400;

use App\Infrastructure\Enum\CodeEnum;
use App\Infrastructure\Exception\AbstractException;

class NotAuthorizationHttpException extends AbstractException
{
    protected function message(): string
    {
        return 'Not Authorization';
    }

    protected function code(): int
    {
        return CodeEnum::NOT_AUTHORIZATION->value;
    }
}