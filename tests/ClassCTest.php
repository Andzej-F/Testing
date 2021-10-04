<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ClassCTest extends TestCase
{
    public function testIfDefaultZeroReturnedInt(): void
    {
        $stubC = $this->createStub(C::class);
        $stubC
            // ->expects($this->any())
            ->method('returnTypeInt')
            ->willReturn(78);

        $this->assertSame(78, $stubC->returnTypeInt());
    }

    public function testIfDefaultZeroReturnedFloat(): void
    {
        $stubC = $this->createStub(C::class);
        $this->assertSame(0.0, $stubC->returnTypeFloat());
    }

    public function testIfDefaultEmptyArrayReturnedArray(): void
    {
        $stubC = $this->createStub(C::class);
        $this->assertSame([], $stubC->returnTypeArray());
    }

    public function testIfDefaultBoolReturnedBuool(): void
    {
        $stubC = $this->createStub(C::class);
        $this->assertSame(FALSE, $stubC->returnTypeBool());
        $this->assertNotTrue($stubC->returnTypeBool());
    }

    // public function testIftestDoubleDClassReturnedDClass(): void
    // {
    //     $stubC = $this->createStub(C::class);
    //     $stubC
    //         // ->expects($this->any())
    //         ->method('returnTypeDClass')
    //         ->willReturn(new D());
    //     $this->assertSame(new D(), $stubC->returnTypeDClass());
    // }
}
