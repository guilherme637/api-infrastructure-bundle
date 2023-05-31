<?php

namespace Infrastructure\Exception;

use App\Infrastructure\Enum\CodeEnum;
use App\Infrastructure\Exception\NotFoundHttpException;
use PHPUnit\Framework\TestCase;

class NotFoundHttpExceptionTest extends TestCase
{
    public function testOnResponse404()
    {
        $exception = new NotFoundHttpException();

        $this->assertEquals(CodeEnum::NOT_FOUND->value, $exception->getCode());
    }
}