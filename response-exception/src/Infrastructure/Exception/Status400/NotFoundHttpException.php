<?php

namespace GuiChaves\Infrastructure\Exception\Status400;

use GuiChaves\Infrastructure\Enum\CodeEnum;
use GuiChaves\Infrastructure\Exception\AbstractException;

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