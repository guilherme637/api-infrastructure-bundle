<?php

namespace Infrastructure\Exception;

use App\Infrastructure\Enum\CodeEnum;
use App\Infrastructure\Exception\Status400\NotAuthorizationHttpException;
use PHPUnit\Framework\TestCase;

class NotAuthorizationHttpExceptionTest extends TestCase
{
    public function testOnResponse401()
    {
        $exception = new NotAuthorizationHttpException();

        $this->assertEquals(CodeEnum::NOT_AUTHORIZATION->value, $exception->getCode());
    }
}