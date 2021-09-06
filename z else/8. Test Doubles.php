<?php
/*
                        8. Test Doubles
double = antrininkas

Gerard Meszaros introduces the concept of Test Doubles in Meszaros2007 like this:

Sometimes it is just plain hard to test the system under test (SUT) because it
depends on other components that cannot be used in the test environment. This
could be because they aren’t available, they will not return the results needed
for the test or because executing them would have undesirable side effects. In
other cases, our test strategy requires us to have more control or visibility 
of the internal behavior of the SUT (system under test).

When we are writing a test in which we cannot (or chose not to) use a real 
depended-on component (DOC), we can replace it with a Test Double. The Test
Double doesn’t have to behave exactly like the real DOC (depended-on component);
it merely has to provide the same API as the real one so that the SUT(system 
under test) thinks it is the real one!

$type = interface or class name

The createStub($type), createMock($type), and getMockBuilder($type) methods 
provided by PHPUnit can be used in a test to automatically generate an object
that can act as a test double for the specified original type (interface or 
class name). This test double object can be used in every context where an 
object of the original type is expected or required.

The createStub($type) and createMock($type) method immediately return a test 
double object for the specified type (interface or class). The creation
of this test double is performed using best practice defaults. The __construct()
and __clone() methods of the original class are not executed and the arguments 
passed to a method of the test double will not be cloned. If these defaults 
are not what you need then you can use the getMockBuilder($type) method to 
customize the test double generation using a fluent interface.

By default, all methods of the original class are replaced with a dummy 
implementation that returns null (without calling the original method). Using 
the will($this->returnValue()) method, for instance, you can configure these 
dummy implementations to return a value when called.

            Limitation: final, private, and static methods
Please note that final, private, and static methods cannot be stubbed or mocked.
They are ignored by PHPUnit’s test double functionality and retain their original
behavior except for static methods that will be replaced by a method throwing a
\PHPUnit\Framework\MockObject\BadMethodCallException exception.

                            Stubs
The practice of replacing an object with a test double that (optionally) 
returns configured return values is referred to as stubbing. You can use 
a stub to “replace a real component on which the SUT depends so that the 
test has a control point for the indirect inputs of the SUT. This allows 
the test to force the SUT down paths it might not otherwise execute”.

Example 8.2 shows how to stub method calls and set up return values. We
first use the createStub() method that is provided by the 
PHPUnit\Framework\TestCase class to set up a stub object that looks like 
an object of SomeClass (Example 8.1). We then use the Fluent Interface 
that PHPUnit provides to specify the behavior for the stub. In essence, 
this means that you do not need to create several temporary objects and 
wire them together afterwards. Instead, you chain method calls as shown 
in the example. This leads to more readable and “fluent” code.

Example 8.1 The class we want to stub
<?php declare(strict_types=1);
class SomeClass
{
    public function doSomething()
    {
        // Do something.
    }
}
Example 8.2 Stubbing a method call to return a fixed value
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class StubTest extends TestCase
{
    public function testStub(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createStub(SomeClass::class);

        // Configure the stub.
        $stub->method('doSomething')
             ->willReturn('foo');

        // Calling $stub->doSomething() will now return
        // 'foo'.
        $this->assertSame('foo', $stub->doSomething());
    }
}
                    Limitation: Methods named “method”
The example shown above only works when the original class does not declare
a method named “method”. If the original class does declare a method named 
“method” then 
$stub->expects($this->any())->method('doSomething')->willReturn('foo'); has
to be used. “Behind the scenes”, PHPUnit automatically generates a new PHP 
class that implements the desired behavior when the createStub() method is
used. Please note that createStub() will automatically and recursively stub
return values based on a method’s return type. Consider the example shown 
below:

Example 8.3 A method with a return type declaration
<?php declare(strict_types=1);
class C
{
    public function m(): D
    {
        // Do something.
    }
}
In the example shown above, the C::m() method has a return type declaration
indicating that this method returns an object of type D. When a test double 
for C is created and no return value is configured for m() using willReturn()
(see above), for instance, then when m() is invoked PHPUnit will automatically
create a test double for D to be returned.

Similarily, if m had a return type declaration for a scalar type then a return
value such as 0 (for int), 0.0 (for float), or [] (for array) would be generated.

Example 8.4 shows an example of how to use the Mock Builder’s fluent interface
to configure the creation of the test double. The configuration of this test 
double uses the same best practice defaults used by createStub().

Example 8.4 Using the Mock Builder API can be used to configure the generated 
test double class
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class StubTest extends TestCase
{
    public function testStub(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->getMockBuilder(SomeClass::class)
                     ->disableOriginalConstructor()
                     ->disableOriginalClone()
                     ->disableArgumentCloning()
                     ->disallowMockingUnknownTypes()
                     ->getMock();

        // Configure the stub.
        $stub->method('doSomething')
             ->willReturn('foo');

        // Calling $stub->doSomething() will now return
        // 'foo'.
        $this->assertSame('foo', $stub->doSomething());
    }
}
In the examples so far we have been returning simple values using 
willReturn($value) – a short syntax for convenience. Table 8.1 shows the 
available stubbing short hands alongside their longer counterparts.

Table 8.1 Stubbing short hands
short hand	longer syntax
willReturn($value)	will($this->returnValue($value))
willReturnArgument($argumentIndex)	will($this->returnArgument($argumentIndex))
willReturnCallback($callback)	will($this->returnCallback($callback))
willReturnMap($valueMap)	will($this->returnValueMap($valueMap))
willReturnOnConsecutiveCalls($value1, $value2)	will($this->onConsecutiveCalls($value1, $value2))
willReturnSelf()	will($this->returnSelf())
willThrowException($exception)	will($this->throwException($exception))
We can use variations on this longer syntax to achieve more complex stubbing 
behaviour.

Sometimes you want to return one of the arguments of a method call (unchanged)
as the result of a stubbed method call. Example 8.5 shows how you can achieve 
this using returnArgument() instead of returnValue().

Example 8.5 Stubbing a method call to return one of the arguments
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class StubTest extends TestCase
{
    public function testReturnArgumentStub(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createStub(SomeClass::class);

        // Configure the stub.
        $stub->method('doSomething')
             ->will($this->returnArgument(0));

        // $stub->doSomething('foo') returns 'foo'
        $this->assertSame('foo', $stub->doSomething('foo'));

        // $stub->doSomething('bar') returns 'bar'
        $this->assertSame('bar', $stub->doSomething('bar'));
    }
}
When testing a fluent interface, it is sometimes useful to have a stubbed 
method return a reference to the stubbed object. Example 8.6 shows how you 
can use returnSelf() to achieve this.

Example 8.6 Stubbing a method call to return a reference to the stub object
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class StubTest extends TestCase
{
    public function testReturnSelf(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createStub(SomeClass::class);

        // Configure the stub.
        $stub->method('doSomething')
             ->will($this->returnSelf());

        // $stub->doSomething() returns $stub
        $this->assertSame($stub, $stub->doSomething());
    }
}
Sometimes a stubbed method should return different values depending on a 
predefined list of arguments. You can use returnValueMap() to create a map 
that associates arguments with corresponding return values. See Example 8.7 
for an example.

Example 8.7 Stubbing a method call to return the value from a map
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class StubTest extends TestCase
{
    public function testReturnValueMapStub(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createStub(SomeClass::class);

        // Create a map of arguments to return values.
        $map = [
            ['a', 'b', 'c', 'd'],
            ['e', 'f', 'g', 'h']
        ];

        // Configure the stub.
        $stub->method('doSomething')
             ->will($this->returnValueMap($map));

        // $stub->doSomething() returns different values depending on
        // the provided arguments.
        $this->assertSame('d', $stub->doSomething('a', 'b', 'c'));
        $this->assertSame('h', $stub->doSomething('e', 'f', 'g'));
    }
}
When the stubbed method call should return a calculated value instead of a 
fixed one (see returnValue()) or an (unchanged) argument (see returnArgument()),
you can use returnCallback() to have the stubbed method return the result of 
a callback function or method. See Example 8.8 for an example.

Example 8.8 Stubbing a method call to return a value from a callback
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class StubTest extends TestCase
{
    public function testReturnCallbackStub(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createStub(SomeClass::class);

        // Configure the stub.
        $stub->method('doSomething')
             ->will($this->returnCallback('str_rot13'));

        // $stub->doSomething($argument) returns str_rot13($argument)
        $this->assertSame('fbzrguvat', $stub->doSomething('something'));
    }
}
A simpler alternative to setting up a callback method may be to specify a 
list of desired return values. You can do this with the onConsecutiveCalls() 
method. See Example 8.9 for an example.

Example 8.9 Stubbing a method call to return a list of values in the specified 
order
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class StubTest extends TestCase
{
    public function testOnConsecutiveCallsStub(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createStub(SomeClass::class);

        // Configure the stub.
        $stub->method('doSomething')
             ->will($this->onConsecutiveCalls(2, 3, 5, 7));

        // $stub->doSomething() returns a different value each time
        $this->assertSame(2, $stub->doSomething());
        $this->assertSame(3, $stub->doSomething());
        $this->assertSame(5, $stub->doSomething());
    }
}
Instead of returning a value, a stubbed method can also raise an exception. 
Example 8.10 shows how to use throwException() to do this.

Example 8.10 Stubbing a method call to throw an exception
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class StubTest extends TestCase
{
    public function testThrowExceptionStub(): void
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createStub(SomeClass::class);

        // Configure the stub.
        $stub->method('doSomething')
             ->will($this->throwException(new Exception));

        // $stub->doSomething() throws Exception
        $stub->doSomething();
    }
}
Alternatively, you can write the stub yourself and improve your design along 
the way. Widely used resources are accessed through a single façade, so you 
can replace the resource with the stub. For example, instead of having direct 
database calls scattered throughout the code, you have a single Database object,
an implementor of the IDatabase interface. Then, you can create a stub 
implementation of IDatabase and use it for your tests. You can even create an 
option for running the tests with the stub database or the real database, so 
you can use your tests for both local testing during development and integration
testing with the real database.

Functionality that needs to be stubbed out tends to cluster in the same object,
improving cohesion. By presenting the functionality with a single, coherent 
interface you reduce the coupling with the rest of the system.

                                Mock Objects
The practice of replacing an object with a test double that verifies expectations, for instance asserting that a method has been called, is referred to as mocking.

You can use a mock object “as an observation point that is used to verify the indirect outputs of the SUT as it is exercised. Typically, the mock object also includes the functionality of a test stub in that it must return values to the SUT if it hasn’t already failed the tests but the emphasis is on the verification of the indirect outputs. Therefore, a mock object is a lot more than just a test stub plus assertions; it is used in a fundamentally different way” (Gerard Meszaros).

Limitation: Automatic verification of expectations

Only mock objects generated within the scope of a test will be verified automatically by PHPUnit. Mock objects generated in data providers, for instance, or injected into the test using the @depends annotation will not be verified automatically by PHPUnit.

Here is an example: suppose we want to test that the correct method, update() in our example, is called on an object that observes another object. Example 8.11 shows the code for the Subject and Observer classes that are part of the System under Test (SUT).

Example 8.11 The Subject and Observer classes that are part of the System under Test (SUT)
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class Subject
{
    protected $observers = [];
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function doSomething()
    {
        // Do something.
        // ...

        // Notify observers that we did something.
        $this->notify('something');
    }

    public function doSomethingBad()
    {
        foreach ($this->observers as $observer) {
            $observer->reportError(42, 'Something bad happened', $this);
        }
    }

    protected function notify($argument)
    {
        foreach ($this->observers as $observer) {
            $observer->update($argument);
        }
    }

    // Other methods.
}

class Observer
{
    public function update($argument)
    {
        // Do something.
    }

    public function reportError($errorCode, $errorMessage, Subject $subject)
    {
        // Do something
    }

    // Other methods.
}
Example 8.12 shows how to use a mock object to test the interaction between Subject and Observer objects.

We first use the createMock() method that is provided by the PHPUnit\Framework\TestCase class to set up a mock object for the Observer.

Because we are interested in verifying that a method is called, and which arguments it is called with, we introduce the expects() and with() methods to specify how this interaction should look.

Example 8.12 Testing that a method gets called once and with a specified argument
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class SubjectTest extends TestCase
{
    public function testObserversAreUpdated(): void
    {
        // Create a mock for the Observer class,
        // only mock the update() method.
        $observer = $this->createMock(Observer::class);

        // Set up the expectation for the update() method
        // to be called only once and with the string 'something'
        // as its parameter.
        $observer->expects($this->once())
                 ->method('update')
                 ->with($this->equalTo('something'));

        // Create a Subject object and attach the mocked
        // Observer object to it.
        $subject = new Subject('My subject');
        $subject->attach($observer);

        // Call the doSomething() method on the $subject object
        // which we expect to call the mocked Observer object's
        // update() method with the string 'something'.
        $subject->doSomething();
    }
}
The with() method can take any number of arguments, corresponding to the number of arguments to the method being mocked. You can specify more advanced constraints on the method’s arguments than a simple match.

Example 8.13 Testing that a method gets called with a number of arguments constrained in different ways
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class SubjectTest extends TestCase
{
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

        $subject = new Subject('My subject');
        $subject->attach($observer);

        // The doSomethingBad() method should report an error to the observer
        // via the reportError() method
        $subject->doSomethingBad();
    }
}
The withConsecutive() method can take any number of arrays of arguments, depending on the calls you want to test against. Each array is a list of constraints corresponding to the arguments of the method being mocked, like in with().

Example 8.14 Testing that a method gets called two times with specific arguments.
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class FooTest extends TestCase
{
    public function testFunctionCalledTwoTimesWithSpecificArguments(): void
    {
        $mock = $this->getMockBuilder(stdClass::class)
                     ->addMethods(['set'])
                     ->getMock();

        $mock->expects($this->exactly(2))
             ->method('set')
             ->withConsecutive(
                 [$this->equalTo('foo'), $this->greaterThan(0)],
                 [$this->equalTo('bar'), $this->greaterThan(0)]
             );

        $mock->set('foo', 21);
        $mock->set('bar', 48);
    }
}
The callback() constraint can be used for more complex argument verification. This constraint takes a PHP callback as its only argument. The PHP callback will receive the argument to be verified as its only argument and should return true if the argument passes verification and false otherwise.

Example 8.15 More complex argument verification
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class SubjectTest extends TestCase
{
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
                     $this->callback(function($subject)
                     {
                         return is_callable([$subject, 'getName']) &&
                                $subject->getName() == 'My subject';
                     }
                 ));

        $subject = new Subject('My subject');
        $subject->attach($observer);

        // The doSomethingBad() method should report an error to the observer
        // via the reportError() method
        $subject->doSomethingBad();
    }
}
Example 8.16 Testing that a method gets called once and with the identical object as was passed
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class FooTest extends TestCase
{
    public function testIdenticalObjectPassed(): void
    {
        $expectedObject = new stdClass;

        $mock = $this->getMockBuilder(stdClass::class)
                     ->addMethods(['foo'])
                     ->getMock();

        $mock->expects($this->once())
             ->method('foo')
             ->with($this->identicalTo($expectedObject));

        $mock->foo($expectedObject);
    }
}
Example 8.17 Create a mock object with cloning parameters enabled
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class FooTest extends TestCase
{
    public function testIdenticalObjectPassed(): void
    {
        $cloneArguments = true;

        $mock = $this->getMockBuilder(stdClass::class)
                     ->enableArgumentCloning()
                     ->getMock();

        // now your mock clones parameters so the identicalTo constraint
        // will fail.
    }
}
Constraints shows the constraints that can be applied to method arguments and Table 8.2 shows the matchers that are available to specify the number of invocations.

Table 8.2 Matchers
Matcher	Meaning
PHPUnit\Framework\MockObject\Matcher\AnyInvokedCount any()	Returns a matcher that matches when the method it is evaluated for is executed zero or more times.
PHPUnit\Framework\MockObject\Matcher\InvokedCount never()	Returns a matcher that matches when the method it is evaluated for is never executed.
PHPUnit\Framework\MockObject\Matcher\InvokedAtLeastOnce atLeastOnce()	Returns a matcher that matches when the method it is evaluated for is executed at least once.
PHPUnit\Framework\MockObject\Matcher\InvokedCount once()	Returns a matcher that matches when the method it is evaluated for is executed exactly once.
PHPUnit\Framework\MockObject\Matcher\InvokedCount exactly(int $count)	Returns a matcher that matches when the method it is evaluated for is executed exactly $count times.
PHPUnit\Framework\MockObject\Matcher\InvokedAtIndex at(int $index)	Returns a matcher that matches when the method it is evaluated for is invoked at the given $index.
Note

The $index parameter for the at() matcher refers to the index, starting at zero, in all method invocations for a given mock object. Exercise caution when using this matcher as it can lead to brittle tests which are too closely tied to specific implementation details.

As mentioned in the beginning, when the defaults used by the createStub() and createMock() methods to generate the test double do not match your needs then you can use the getMockBuilder($type) method to customize the test double generation using a fluent interface. Here is a list of methods provided by the Mock Builder:

onlyMethods(array $methods) can be called on the Mock Builder object to specify the methods that are to be replaced with a configurable test double. The behavior of the other methods is not changed. Each method must exist in the given mock class.
addMethods(array $methods) can be called on the Mock Builder object to specify the methods that don’t exist (yet) in the given mock class. The behavior of the other methods remains the same.
setMethodsExcept(array $methods) can be called on the Mock Builder object to specify the methods that will not be replaced with a configurable test double while replacing all other public methods. This works inverse to onlyMethods().
setConstructorArgs(array $args) can be called to provide a parameter array that is passed to the original class’ constructor (which is not replaced with a dummy implementation by default).
setMockClassName($name) can be used to specify a class name for the generated test double class.
disableOriginalConstructor() can be used to disable the call to the original class’ constructor.
disableOriginalClone() can be used to disable the call to the original class’ clone constructor.
disableAutoload() can be used to disable __autoload() during the generation of the test double class.
Mocking Traits and Abstract Classes
The getMockForTrait() method returns a mock object that uses a specified trait. All abstract methods of the given trait are mocked. This allows for testing the concrete methods of a trait.

Example 8.18 Testing the concrete methods of a trait
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

trait AbstractTrait
{
    public function concreteMethod()
    {
        return $this->abstractMethod();
    }

    public abstract function abstractMethod();
}

final class TraitClassTest extends TestCase
{
    public function testConcreteMethod(): void
    {
        $mock = $this->getMockForTrait(AbstractTrait::class);

        $mock->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue(true));

        $this->assertTrue($mock->concreteMethod());
    }
}
The getMockForAbstractClass() method returns a mock object for an abstract class. All abstract methods of the given abstract class are mocked. This allows for testing the concrete methods of an abstract class.

Example 8.19 Testing the concrete methods of an abstract class
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

abstract class AbstractClass
{
    public function concreteMethod()
    {
        return $this->abstractMethod();
    }

    public abstract function abstractMethod();
}

final class AbstractClassTest extends TestCase
{
    public function testConcreteMethod(): void
    {
        $stub = $this->getMockForAbstractClass(AbstractClass::class);

        $stub->expects($this->any())
             ->method('abstractMethod')
             ->will($this->returnValue(true));

        $this->assertTrue($stub->concreteMethod());
    }
}
Stubbing and Mocking Web Services
When your application interacts with a web service you want to test it without actually interacting with the web service. To create stubs and mocks of web services, the getMockFromWsdl() can be used like getMock() (see above). The only difference is that getMockFromWsdl() returns a stub or mock based on a web service description in WSDL and getMock() returns a stub or mock based on a PHP class or interface.

Example 8.20 shows how getMockFromWsdl() can be used to stub, for example, the web service described in GoogleSearch.wsdl.

Example 8.20 Stubbing a web service
<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class GoogleTest extends TestCase
{
    public function testSearch(): void
    {
        $googleSearch = $this->getMockFromWsdl(
          'GoogleSearch.wsdl', 'GoogleSearch'
        );

        $directoryCategory = new stdClass;
        $directoryCategory->fullViewableName = '';
        $directoryCategory->specialEncoding = '';

        $element = new stdClass;
        $element->summary = '';
        $element->URL = 'https://phpunit.de/';
        $element->snippet = '...';
        $element->title = '<b>PHPUnit</b>';
        $element->cachedSize = '11k';
        $element->relatedInformationPresent = true;
        $element->hostName = 'phpunit.de';
        $element->directoryCategory = $directoryCategory;
        $element->directoryTitle = '';

        $result = new stdClass;
        $result->documentFiltering = false;
        $result->searchComments = '';
        $result->estimatedTotalResultsCount = 3.9000;
        $result->estimateIsExact = false;
        $result->resultElements = [$element];
        $result->searchQuery = 'PHPUnit';
        $result->startIndex = 1;
        $result->endIndex = 1;
        $result->searchTips = '';
        $result->directoryCategories = [];
        $result->searchTime = 0.248822;

        $googleSearch->expects($this->any())
                     ->method('doGoogleSearch')
                     ->will($this->returnValue($result));

        /**
         * $googleSearch->doGoogleSearch() will now return a stubbed result and
         * the web service's doGoogleSearch() method will not be invoked.
         */
        /*
        $this->assertEquals(
          $result,
          $googleSearch->doGoogleSearch(
            '00000000000000000000000000000000',
            'PHPUnit',
            0,
            1,
            false,
            '',
            false,
            '',
            '',
            ''
          )
        );
    }
}

 */