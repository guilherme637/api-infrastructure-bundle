<?php

namespace GuiChaves\Infrastructure\Subscriber\Resolver\Handler;

use GuiChaves\Infrastructure\Subscriber\Resolver\ResolverAbstract;

class CustomExceptionHandler extends ResolverAbstract
{
    public function shoudCall(\Throwable $throwable): bool
    {
        return $throwable instanceof \DomainException;
    }
}