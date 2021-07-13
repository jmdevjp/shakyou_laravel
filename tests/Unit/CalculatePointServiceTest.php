<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Service\CalculatePointService;
use App\Exceptions\PreconditionException;

class CalculatePointServiceTest extends TestCase
{
    public function dataProvider_for_calcPoint(): array
    {
        return [
            '購入金額が0ならポイントは0'       => [0, 0],
            '購入金額が999ならポイントは0'     => [0, 999],
            '購入金額が1000ならポイントは10'   => [10, 1000],
            '購入金額が9999ならポイントは99'   => [99, 9999],
            '購入金額が10000ならポイントは200' => [200, 10000],
        ];
    }

    /**
     * @test
     * @dataProvider dataProvider_for_calcPoint
     */
    public function calcPoint(int $expected, int $amount)
    {
        $result = CalculatePointService::calcPoint($amount);

        $this->assertSame($expected, $result);
    }

    /**
     * @test
     */
    public function calcPoint_購入金額が負の数なら例外を投げる()
    {
        $this->expectException(PreconditionException::class);
        $this->expectExceptionMessage('購入金額が負の数');

        CalculatePointService::calcPoint(-1);
    }

    /**
     * @test
     */
    public function exception_try_catch()
    {
        try {
            throw new \InvalidArgumentException('message', 200);
            $this->fail();
        } catch (\Throwable $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
            $this->assertSame(200, $e->getCode());
            $this->assertSame('message', $e->getMessage());
        }
    }

    /**
     * @test
     */
    public function exception_expectException_method()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(200);
        $this->expectExceptionMessage('message');

        throw new \InvalidArgumentException('message', 200);
    }
}
