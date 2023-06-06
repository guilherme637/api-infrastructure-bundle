<?php

namespace Infrastructure\Exception;

use GuiChaves\Infrastructure\Enum\CodeEnum;
use GuiChaves\Infrastructure\Exception\Status400\NotAuthorizationHttpException;
use PHPUnit\Framework\TestCase;

class NotAuthorizationHttpExceptionTest extends TestCase
{
    public function testOnResponse401()
    {
        $exception = new NotAuthorizationHttpException();

        $this->assertEquals(CodeEnum::NOT_AUTHORIZATION->value, $exception->getCode());
    }
}