<?php

namespace GuiChaves\Infrastructure\Exception\Status400;

use GuiChaves\Infrastructure\Enum\CodeEnum;

use GuiChaves\Infrastructure\Exception\AbstractException;

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