<?php

namespace Infrastructure\Subscriber;

use App\Infrastructure\Enum\CodeEnum;
use App\Infrastructure\Exception\BadRequestHttpException;
use App\Infrastructure\Exception\InternalServerHttpException;
use App\Infrastructure\Exception\NotAuthorizationHttpException;
use App\Infrastructure\Exception\NotFoundHttpException;
use App\Infrastructure\Subscriber\ResponseSubscriber;
use App\Infrastructure\VO\ResponseVO;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\HttpKernel;

class ResponseSubscriberTest extends TestCase
{
//    public function testOnResponseInternalServer500()
//    {
//        $event = $this->mockEvent(new InternalServerHttpException());
//        $dispatcher = new ResponseSubscriber();
//
//        $dispatcher->onResponse($event);
//        $this->assertInstanceOf(JsonResponse::class, $event->getResponse());
//        $this->assertJsonStringEqualsJsonString($this->mockContent($event), $event->getResponse()->getContent());
//        $this->assertEquals(CodeEnum::INTERNAL_SERVER->value, $event->getResponse()->getStatusCode());
//    }

    public function testOnResponseNotFound404()
    {
        $event = $this->mockEvent(new NotFoundHttpException());
        $content = $this->mockContent($event);
        $dispatcher = new ResponseSubscriber();

        $dispatcher->onResponse($event);
        $this->assertInstanceOf(JsonResponse::class, $event->getResponse());
        $this->assertJsonStringEqualsJsonString($this->mockContent($event), $event->getResponse()->getContent());
        $this->assertEquals(CodeEnum::NOT_FOUND->value, $event->getResponse()->getStatusCode());
    }

    public function testOnResponseBadRequest400()
    {
        $event = $this->mockEvent(new BadRequestHttpException());

        $dispatcher = new ResponseSubscriber();

        $dispatcher->onResponse($event);

        $this->assertInstanceOf(JsonResponse::class, $event->getResponse());
        $this->assertJsonStringEqualsJsonString($this->mockContent($event), $event->getResponse()->getContent());
        $this->assertEquals(CodeEnum::BAD_REQUEST->value, $event->getResponse()->getStatusCode());
    }

    public function testOnResponseBadRequest401()
    {
        $event = $this->mockEvent(new NotAuthorizationHttpException());

        $dispatcher = new ResponseSubscriber();

        $dispatcher->onResponse($event);

        $this->assertInstanceOf(JsonResponse::class, $event->getResponse());
        $this->assertJsonStringEqualsJsonString($this->mockContent($event), $event->getResponse()->getContent());
        $this->assertEquals(CodeEnum::NOT_AUTHORIZATION->value, $event->getResponse()->getStatusCode());
    }

    public function mockEvent(\Throwable $throwable): ExceptionEvent
    {
        return new ExceptionEvent(
            $this->createMock(HttpKernel::class),
            $this->createMock(Request::class),
            1,
            $throwable
        );
    }

    public function mockContent(ExceptionEvent $event): string
    {
        $responseVO = new ResponseVO($event->getThrowable());

        return json_encode($responseVO->getResponse());
    }
}