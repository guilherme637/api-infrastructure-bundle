<?php

namespace GuiChaves\Infrastructure\Subscriber\Resolver\Handler;

use GuiChaves\Infrastructure\Exception\Status400\BadRequestHttpException;
use GuiChaves\Infrastructure\Subscriber\Resolver\ResolverAbstract;

class BadRequestHandler extends ResolverAbstract
{
    public function shoudCall(\Throwable $throwable): bool
    {
        return $throwable instanceof BadRequestHttpException;
    }
}