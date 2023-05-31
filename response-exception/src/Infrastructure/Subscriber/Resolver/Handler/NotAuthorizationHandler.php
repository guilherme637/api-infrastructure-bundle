<?php

namespace App\Infrastructure\Subscriber\Resolver\Handler;

use App\Infrastructure\Exception\Status400\NotAuthorizationHttpException;
use App\Infrastructure\Subscriber\Resolver\ResolverAbstract;

class NotAuthorizationHandler extends ResolverAbstract
{
    public function shoudCall(\Throwable $throwable): bool
    {
        return $throwable instanceof NotAuthorizationHttpException;
    }
}