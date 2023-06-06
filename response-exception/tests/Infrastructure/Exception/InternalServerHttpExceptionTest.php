<?php

namespace Infrastructure\Exception;

use GuiChaves\Infrastructure\Enum\CodeEnum;
use GuiChaves\Infrastructure\Exception\Status500\InternalServerHttpException;
use PHPUnit\Framework\TestCase;

class InternalServerHttpExceptionTest extends TestCase
{
    public function testOnResponse500()
    {
        $exception = new InternalServerHttpException();

        $this->assertEquals(CodeEnum::INTERNAL_SERVER->value, $exception->getCode());
    }
}