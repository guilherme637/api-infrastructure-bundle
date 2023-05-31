<?php

namespace App\Infrastructure\Exception;

use App\Infrastructure\Enum\CodeEnum;

class BadRequestHttpException extends AbstractException
{
    protected function message(): string
    {
        return 'Request invalid. Check your form';
    }

    protected function code(): int
    {
        return CodeEnum::BAD_REQUEST->value;
    }
}