<?php

namespace App\Infrastructure\Subscriber\Resolver\Handler;

use App\Infrastructure\Subscriber\Resolver\ResolverAbstract;

class CustomExceptionHandler extends ResolverAbstract
{
    public function shoudCall(\Throwable $throwable): bool
    {
        return $throwable instanceof \DomainException;
    }
}