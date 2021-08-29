<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

// final class StackTest extends TestCase
// {
// public function testPushAndPop(): void
// {
//     $stack = [];
//     $this->assertSame(0, count($stack));

//     array_push($stack, 'foo');
//     $this->assertSame('foo', $stack[count($stack) - 1]);
//     $this->assertSame(1, count($stack));

//     $this->assertSame('foo', array_pop($stack));
//     $this->assertSame(0, count($stack));
// }

/*                Test Dependencies        
    Example 2.2*/

//     public function testEmpty(): array
//     {
//         $stack = [];
//         $this->assertEmpty($stack);

//         /* Returns fixture as its result */
//         return $stack;
//     }

//     /**
//      * @depends testEmpty
//      */
//     public function testPush(array $stack): array
//     {
//         array_push($stack, 'foo');
//         $this->assertSame('foo', $stack[count($stack) - 1]);
//         $this->assertNotEmpty($stack);

//         return $stack;
//     }

//     /**
//      * // @depends testPush
//      */

//     public function testPop(array $stack): void
//     {
//         $this->assertSame('foo', array_pop($stack));
//         $this->assertEmpty($stack);
//     }
// }

/* Example 2.3 Exploiting the dependencies between tests
 */

// final class DependencyFailureTest extends TestCase
// {
//     public function testOne(): void
//     {
//         $this->assertTrue(false);
//     }

//     /**
//      * @ depends testOne
//      */
//     public function testTwo(): void
//     {
//     }
// }