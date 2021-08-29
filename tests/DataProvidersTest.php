<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DataProvidersTest extends TestCase
{
    // public function testTrimTrimsLeadingSpace()
    // {
    //     $input = ' Hello World';
    //     $expectedResult = 'Hello World';

    //     self::assertSame($expectedResult, trim($input));
    // }

    /**
     * @dataProvider provideTrimData
     */
    // public function testTrim($expectedResult, $input): void
    // {
    //     self::assertSame($expectedResult, trim($input));
    // }

    // public function provideTrimData()
    // {
    //     return [
    //         // 'leading space is trimmed' => [
    //         //     'Hello World',
    //         //     ' Hello World'
    //         // ],
    //         // 'trailing space and newline are trimmed' => [
    //         //     'Hello World',
    //         //     " Hello World\n"
    //         // ],
    //         // 'space in the middle is removed' => [
    //         //     'HelloWorld',
    //         //     "Hello World",
    //         // ]

    //         [
    //             'Hello World',
    //             ' Hello World'
    //         ],
    //         [
    //             'Hello World',
    //             " Hello World\n"
    //         ],
    //         [
    //             'HelloWorld',
    //             "Hello World",
    //         ]
    //     ];
    // }

    // /**
    //  * @dataProvider provideTrimData
    //  */
    // public function testTrimTrims(
    //     string $expectedOutput,
    //     string $input
    // ): void {
    //     self::assertSame($expectedOutput, trim($input));
    // }

    // /**
    //  * @return string[][]
    //  */
    // public function provideTrimData(): array
    // {
    //     return [
    //         'leading space is trimmed' => [
    //             'Hello World',
    //             ' Hello World'
    //         ],
    //         'trailing space and newline are trimmed' => [
    //             'Hello World',
    //             " Hello World\n"
    //         ],
    //     ];
    // }

    /* Return instances from the data provide */
    public function provideDateTimesPartOfDay(): array
    {
        return [
            ['morning', new DateTimeImmutable('2018-10-01 10:00:00')],
            ['afternoon', new DateTimeImmutable('2019-09-01 15:00:00')]
        ];
    }
}
