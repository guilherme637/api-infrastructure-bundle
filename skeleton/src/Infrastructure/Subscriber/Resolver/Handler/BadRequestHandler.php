<?php

namespace App\Infrastructure\Subscriber\Resolver\Handler;

use App\Infrastructure\Exception\BadRequestHttpException;
use App\Infrastructure\Subscriber\Resolver\ResolverAbstract;

class BadRequestHandler extends ResolverAbstract
{
    public function shoudCall(\Throwable $throwable): bool
    {
        return $throwable instanceof BadRequestHttpException;
    }
}