<?php

namespace GuiChaves\Infrastructure\Exception\Status400;

use GuiChaves\Infrastructure\Enum\CodeEnum;
use GuiChaves\Infrastructure\Exception\AbstractException;

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