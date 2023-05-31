<?php

namespace App\Infrastructure\Exception;

use App\Infrastructure\Enum\CodeEnum;

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