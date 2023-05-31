<?php

namespace App\Infrastructure\Subscriber\Resolver;

use App\Infrastructure\Exception\InternalServerHttpException;
use App\Infrastructure\Subscriber\Resolver\Handler\NotFoundHandler;
use App\Infrastructure\VO\ResponseVO;

abstract class ResolverAbstract implements ResolverHandlerInterface
{
    private ?ResolverHandlerInterface $handler = null;

    public function setNext(ResolverHandlerInterface $handler): void
    {
        $this->handler = $handler;
    }

    public function handle(\Throwable $throwable): ?ResponseVO
    {
        dump($throwable);
        if ($this->shoudCall($throwable)) {
            $nameClass = get_class($this);
            $instanceOfNameClass = new $nameClass();

            return $instanceOfNameClass($throwable);
        }

        return !is_null($this->handler)
            ? $this->handler->handle($throwable)
            : new ResponseVO(new InternalServerHttpException());
    }

    abstract public function shoudCall(\Throwable $throwable): bool;

    public function __invoke(\Throwable $throwable): ResponseVO
    {
        return new ResponseVO($throwable);
    }
}