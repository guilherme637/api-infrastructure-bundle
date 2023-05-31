<?php

namespace Infrastructure\Exception;

use App\Infrastructure\Enum\CodeEnum;
use App\Infrastructure\Exception\NoContentHttpException;
use PHPUnit\Framework\TestCase;

class NoContentHttpExceptionTest extends TestCase
{
    public function testOnResponse204()
    {
        $exception = new NoContentHttpException();

        $this->assertEquals(CodeEnum::NO_CONTENT->value, $exception->getCode());
    }
}