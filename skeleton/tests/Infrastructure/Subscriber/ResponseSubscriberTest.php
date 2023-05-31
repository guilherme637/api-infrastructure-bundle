<?php

namespace Infrastructure\Subscriber;

use App\Infrastructure\Enum\CodeEnum;
use App\Infrastructure\Exception\Status400\BadRequestHttpException;
use App\Infrastructure\Exception\Status400\NotAuthorizationHttpException;
use App\Infrastructure\Exception\Status400\NotFoundHttpException;
use App\Infrastructure\Exception\Status500\InternalServerHttpException;
use App\Infrastructure\Subscriber\ResponseSubscriber;
use App\Infrastructure\VO\ResponseVO;
use App\Tests\Infrastructure\Subscriber\TestException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\HttpKernel;

class ResponseSubscriberTest extends TestCase
{
    private ResponseSubscriber $subscriber;

    protected function setUp(): void
    {
        $this->subscriber = new ResponseSubscriber();
        parent::setUp();
    }

    public function test_response_as_json()
    {
        $event = $this->mockEvent(new InternalServerHttpException());
        $this->subscriber->onResponse($event);

        $this->assertInstanceOf(JsonResponse::class, $event->getResponse());
    }

    public function testOnResponseInternalServer500()
    {
        $event = $this->mockEvent(new InternalServerHttpException());
        $this->subscriber->onResponse($event);

        $this->assertJsonStringEqualsJsonString($this->mockContent($event->getThrowable()), $event->getResponse()->getContent());
        $this->assertEquals(CodeEnum::INTERNAL_SERVER->value, $event->getResponse()->getStatusCode());
    }

    public function testOnResponseNotFound404()
    {
        $event = $this->mockEvent(new NotFoundHttpException());
        $this->subscriber->onResponse($event);

        $this->assertJsonStringEqualsJsonString(
            $this->mockContent($event->getThrowable()),
            $event->getResponse()->getContent()
        );
        $this->assertEquals(CodeEnum::NOT_FOUND->value, $event->getResponse()->getStatusCode());
    }

    public function testOnResponseBadRequest400()
    {
        $event = $this->mockEvent(new BadRequestHttpException());
        $this->subscriber->onResponse($event);

        $this->assertJsonStringEqualsJsonString(
            $this->mockContent($event->getThrowable()), 
            $event->getResponse()->getContent()
        );
        $this->assertEquals(CodeEnum::BAD_REQUEST->value, $event->getResponse()->getStatusCode());
    }

    public function testOnResponseBadRequest401()
    {
        $event = $this->mockEvent(new NotAuthorizationHttpException());
        $this->subscriber->onResponse($event);

        $this->assertJsonStringEqualsJsonString(
            $this->mockContent($event->getThrowable()),
            $event->getResponse()->getContent()
        );
        $this->assertEquals(CodeEnum::NOT_AUTHORIZATION->value, $event->getResponse()->getStatusCode());
    }

    public function test_on_response_when_not_exist_treatment()
    {
        $event = $this->mockEvent(new \InvalidArgumentException('test', 477));
        $this->subscriber->onResponse($event);

        $this->assertJsonStringEqualsJsonString(
            $this->mockContent(new InternalServerHttpException()),
            $event->getResponse()->getContent()
        );
        $this->assertEquals(CodeEnum::INTERNAL_SERVER->value, $event->getResponse()->getStatusCode());
    }

    public function test_kernel_event_exception_of_subscriber()
    {
        $this->assertEquals(key(ResponseSubscriber::getSubscribedEvents()), 'kernel.exception');
    }

    public function test_custom_exception()
    {
        $event = $this->mockEvent(new TestException('abcd', 400));
        $this->subscriber->onResponse($event);

        $this->assertJsonStringEqualsJsonString(
            $this->mockContent($event->getThrowable()),
            $event->getResponse()->getContent()
        );
        $this->assertEquals(CodeEnum::BAD_REQUEST->value, $event->getResponse()->getStatusCode());
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

    public function mockContent(\Throwable $event): string
    {
        $responseVO = new ResponseVO($event);

        return json_encode($responseVO->getResponse());
    }
}