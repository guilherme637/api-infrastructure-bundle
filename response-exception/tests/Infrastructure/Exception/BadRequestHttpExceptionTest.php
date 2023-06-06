<?php

namespace Infrastructure\Exception;

use GuiChaves\Infrastructure\Enum\CodeEnum;
use GuiChaves\Infrastructure\Exception\Status400\BadRequestHttpException;
use PHPUnit\Framework\TestCase;

class BadRequestHttpExceptionTest extends TestCase
{
    public function testOnResponse400()
    {
        $exception = new BadRequestHttpException();

        $this->assertEquals(CodeEnum::BAD_REQUEST->value, $exception->getCode());
    }
}