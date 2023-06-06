<?php

namespace GuiChaves\Infrastructure\Subscriber\Resolver;

use GuiChaves\Infrastructure\Subscriber\Resolver\Handler\BadRequestHandler;
use GuiChaves\Infrastructure\Subscriber\Resolver\Handler\CustomExceptionHandler;
use GuiChaves\Infrastructure\Subscriber\Resolver\Handler\NotAuthorizationHandler;
use GuiChaves\Infrastructure\Subscriber\Resolver\Handler\NotFoundHandler;
use GuiChaves\Infrastructure\VO\ResponseVO;

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