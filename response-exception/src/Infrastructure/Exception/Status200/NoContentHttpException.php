<?php

namespace GuiChaves\Infrastructure\Exception\Status200;

use GuiChaves\Infrastructure\Enum\CodeEnum;
use GuiChaves\Infrastructure\Exception\AbstractException;

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