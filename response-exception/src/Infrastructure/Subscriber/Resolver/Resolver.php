<?php

namespace App\Infrastructure\Subscriber\Resolver;

use App\Infrastructure\Subscriber\Resolver\Handler\BadRequestHandler;
use App\Infrastructure\Subscriber\Resolver\Handler\CustomExceptionHandler;
use App\Infrastructure\Subscriber\Resolver\Handler\NotAuthorizationHandler;
use App\Infrastructure\Subscriber\Resolver\Handler\NotFoundHandler;
use App\Infrastructure\VO\ResponseVO;

class Resolver
{
    public function resolver(\Throwable $throwable): ResponseVO
    {
        $response = new BadRequestHandler();
        $response->setNext(new NotFoundHandler())
            ->setNext(new NotAuthorizationHandler())
            ->setNext(new CustomExceptionHandler());

        return $response->handle($throwable);
    }
}