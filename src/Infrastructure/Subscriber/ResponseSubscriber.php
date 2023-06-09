<?php

namespace GuiChaves\Infrastructure\Subscriber;

use GuiChaves\Infrastructure\Subscriber\Resolver\Resolver;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ResponseSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => [
                ['onResponse', 100]
            ]
        ];
    }

    public function onResponse(ExceptionEvent $event)
    {
        $resolver = new Resolver();
        $responseVO = $resolver->resolver($event->getThrowable());

        $event->setResponse(
            new JsonResponse(
                $responseVO->getResponse(),
                $responseVO->getCode()
            )
        );
    }
}