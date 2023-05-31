<?php

namespace App\Infrastructure\Exception\Status400;

use App\Infrastructure\Enum\CodeEnum;
use App\Infrastructure\Exception\AbstractException;

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