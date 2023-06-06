<?php

namespace GuiChaves\Infrastructure\Subscriber\Resolver;

use GuiChaves\Infrastructure\VO\ResponseVO;

interface ResolverHandlerInterface
{
    public function setNext(ResolverHandlerInterface $handler): ResolverHandlerInterface;
    public function handle(\Throwable $throwable): ?ResponseVO;
}