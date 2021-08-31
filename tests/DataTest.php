<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/* Example 2.5 Using a data provider that returns an
   array of arrays */

// final class DataTest extends TestCase
// {
//     /* Data provider method must be public and either return
//        an array of arrays or an object that implements the
//        Iterator interface and yields an array for each 
//        iteration step.  */
//     public function additionProvider(): array
//     {
//         return [
//             'adding zeros' => [0, 0, 0],
//             'zero plus one' => [0, 1, 1],
//             'one plus zero' => [1, 0, 1],
//             'one plus one' => [1, 1, 3]
//         ];
//         // return [
//         //     [0, 0, 0],
//         //     [0, 1, 1],
//         //     [1, 0, 1],
//         //     [1, 1, 3]
//         // ];
//     }
//     /**
//      * @dataProvider additionProvider
//      */
//     public function testAdd(int $a, int $b, int $expected): void
//     {
//         $this->assertSame($expected, $a + $b);
//     }
// }

/* Example 2.7 Using a data provider that returns an Iterator object */

// final class DataTest extends TestCase
// {
//     /**
//      * @dataProvider additionProvider
//      */
//     public function testAdd(int $a, int $b, int $expected): void
//     {
//         $this->assertSame($expected, $a + $b);
//     }

//     public function additionProvider(): CsvFileIterator
//     {
//         return new CsvFileIterator('data.csv');
//     }
// }

/* Example 2.10 Using multiple data providers for a single test */

final class DataTest extends TestCase
{
    /**
     * @dataProvider additionWithNonNegativeNumbersProvider
     * @dataProvider additionWithNegativeNumbersProvider
     */
    public function testAdd(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }

    public function additionWithNonNegativeNumbersProvider(): array
    {
        return [
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 3]
        ];
    }

    public function additionWithNegativeNumbersProvider(): array
    {
        return [
            [-1, 1, 0],
            [-1, 1, -2],
            [1, 1, 0]
        ];
    }
}
