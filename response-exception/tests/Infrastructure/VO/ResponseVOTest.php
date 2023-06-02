<?php

namespace App\Tests\Infrastructure\VO;

use App\Infrastructure\Enum\CodeEnum;
use App\Infrastructure\Exception\Status500\InternalServerHttpException;
use App\Infrastructure\VO\ResponseVO;
use PHPUnit\Framework\TestCase;

class ResponseVOTest extends TestCase
{
    public function test_code()
    {
        $this->assertIsInt($this->mockResponseVO()->getCode());
        $this->assertEquals(CodeEnum::INTERNAL_SERVER->value, $this->mockResponseVO()->getCode());
    }

    public function test_message()
    {
        $this->assertIsString($this->mockResponseVO()->getMessage());
        $this->assertEquals('Internal Server Error.', $this->mockResponseVO()->getMessage());
    }

    public function test_response()
    {
        $this->assertIsArray($this->mockResponseVO()->getResponse());
        $this->assertEquals(
            [
            "message" => "Internal Server Error.",
            "code" => 500
            ],
            $this->mockResponseVO()->getResponse()
        );
    }

    public function mockResponseVO(): ResponseVO
    {
        return new ResponseVO(new InternalServerHttpException());
    }
}