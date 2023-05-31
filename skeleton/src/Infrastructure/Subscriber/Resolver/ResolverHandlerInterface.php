<?php

namespace App\Infrastructure\Subscriber\Resolver;

use App\Infrastructure\VO\ResponseVO;

interface ResolverHandlerInterface
{
    public function setNext(ResolverHandlerInterface $handler): void;
    public function handle(\Throwable $throwable): ?ResponseVO;
}