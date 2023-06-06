<?php

namespace Infrastructure\Exception;

use GuiChaves\Infrastructure\Enum\CodeEnum;
use GuiChaves\Infrastructure\Exception\Status400\NotFoundHttpException;
use PHPUnit\Framework\TestCase;

class NotFoundHttpExceptionTest extends TestCase
{
    public function testOnResponse404()
    {
        $exception = new NotFoundHttpException();

        $this->assertEquals(CodeEnum::NOT_FOUND->value, $exception->getCode());
    }
}