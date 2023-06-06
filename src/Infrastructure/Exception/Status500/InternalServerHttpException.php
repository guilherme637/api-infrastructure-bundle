<?php

namespace GuiChaves\Infrastructure\Exception\Status500;

use GuiChaves\Infrastructure\Enum\CodeEnum;
use GuiChaves\Infrastructure\Exception\AbstractException;

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