<?php

namespace GuiChaves\Infrastructure\Subscriber\Resolver\Handler;

use GuiChaves\Infrastructure\Exception\Status400\NotFoundHttpException;
use GuiChaves\Infrastructure\Subscriber\Resolver\ResolverAbstract;

class NotFoundHandler extends ResolverAbstract
{
    public function shoudCall(\Throwable $throwable): bool
    {
        return $throwable instanceof NotFoundHttpException;
    }
}