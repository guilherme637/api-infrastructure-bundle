<?php

namespace GuiChaves\Infrastructure\Subscriber\Resolver\Handler;

use GuiChaves\Infrastructure\Exception\Status400\NotAuthorizationHttpException;
use GuiChaves\Infrastructure\Subscriber\Resolver\ResolverAbstract;

class NotAuthorizationHandler extends ResolverAbstract
{
    public function shoudCall(\Throwable $throwable): bool
    {
        return $throwable instanceof NotAuthorizationHttpException;
    }
}