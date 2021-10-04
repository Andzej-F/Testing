<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SubjectTest extends TestCase
{
    // Example 8.12 Testing that a method gets called once
    // and with a specified argument
    public function testObserversAreUpdate(): void
    {
        // Create a mock for the Observer class,
        // only mock the update() method
        $observer = $this->createMock(Observer::class);

        // Set up the expectation for the update() method
        // to be called only once and with the string 'something'
        // as its parameter
        $observer->expects($this->once())
            ->method('update')
            ->with($this->equalTo('something'));

        // Create a Subject object and attach the mocked
        // Observer object to it.
        $subject = new Subject('My Subject');
        $subject->attach($observer);

        // Call the doSomething() method on the $subject object
        // which we expect to call the mocked Observer object's
        // update() method with the string 'something'
        $subject->doSomething();
    }

    // Example 8.13 Testing that a method gets called with
    // a number of arguments constrained in different ways
    public function testErrorReported(): void
    {
        // Create a mock for the Observer class, mocking the
        // reportError() method
        $observer = $this->createMock(Observer::class);

        $observer->expects($this->once())
            ->method('reportError')
            ->with(
                $this->greaterThan(0),
                $this->stringContains('Something'),
                $this->anything()
            );

        $subject = new Subject('My Subject');
        $subject->attach($observer);

        // The doSomethingBad() method should report an error
        // to the observer via the reportError() method
        $subject->doSomethingBad();
    }
}
