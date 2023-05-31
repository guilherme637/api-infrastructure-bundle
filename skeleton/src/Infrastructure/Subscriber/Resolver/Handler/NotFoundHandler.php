<?php

namespace App\Infrastructure\Subscriber\Resolver\Handler;

use App\Infrastructure\Exception\NotFoundHttpException;
use App\Infrastructure\Subscriber\Resolver\ResolverAbstract;

class NotFoundHandler extends ResolverAbstract
{
    public function shoudCall(\Throwable $throwable): bool
    {
        return $throwable instanceof NotFoundHttpException;
    }
}