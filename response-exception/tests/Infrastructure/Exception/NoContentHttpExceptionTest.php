<?php

namespace Infrastructure\Exception;

use GuiChaves\Infrastructure\Enum\CodeEnum;
use GuiChaves\Infrastructure\Exception\Status200\NoContentHttpException;
use PHPUnit\Framework\TestCase;

class NoContentHttpExceptionTest extends TestCase
{
    public function testOnResponse204()
    {
        $exception = new NoContentHttpException();

        $this->assertEquals(CodeEnum::NO_CONTENT->value, $exception->getCode());
    }
}