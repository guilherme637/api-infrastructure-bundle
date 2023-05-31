<?php

namespace App\Infrastructure\Subscriber\Resolver\Handler;

use App\Infrastructure\Exception\InternalServerHttpException;
use App\Infrastructure\Subscriber\Resolver\ResolverAbstract;

class InternalServerHandler extends ResolverAbstract
{
    public function shoudCall(\Throwable $throwable): bool
    {
        return $throwable instanceof InternalServerHttpException;
    }
}