<?php


use PHPUnit\Framework\TestCase;

class ClassToBeMocked
{
    public function methodToBeMockedA()
    {
        return 'A';
    }
    public function methodToBeMockedB()
    {
        return 'B';
    }
}

class ServiceClass {
    private $classToBeMocked;

    public function __construct(ClassToBeMocked $classToBeMocked)
    {
        $this->classToBeMocked = $classToBeMocked;
    }
    public function methodToBeTested() {

        return $this->$classToBeMocked->methodToBeMockedA();
    }
}


class StaticClass {
    static $state = 'A';

    public function setState($data) {
        self::$state = $data;
    }
    public function getState() {
        return self::$state;
    }
}

class MockingTest extends TestCase
{


    public function testWillReturnCB() {



        $mock = $this->createMock(ClassToBeMocked::class);
        $mock->method('methodToBeMockedA')->willReturnCallback(function() {
            return 'CB';
        });

        $this->assertEquals('CB', $mock->methodToBeMockedA());

    }

    public function testStatic()
    {

        $instanceB = new StaticClass();

        $instanceB->setState('B');

        $this->assertEquals('B', $instanceB->getState());
        $this->assertEquals('B', StaticClass::$state);


        $instanceC = new StaticClass();
        $this->assertEquals('B', $instanceC->getState());

    }

    // public function testStaticMocked() {

    //     $mock = $this->createMock(StaticClass::class);
    //     $mock->method('getState')->willReturn('C');




    // }



    public function testMock()
    {
        $mock = $this->createMock(ClassToBeMocked::class);
        $mock->method('methodToBeMockedA')->willReturn('C');
        $this->assertEquals('C', $mock->methodToBeMockedA());
        $this->assertEquals(null, $mock->methodToBeMockedB());
    }

    public function testSpyMock() {
        $mock = $this->createMock(ClassToBeMocked::class);

        $mock->expects($this->exactly(2))
            ->method('methodToBeMockedA')
            ->willReturn('C');
        $this->assertEquals('C', $mock->methodToBeMockedA());
        $mock->methodToBeMockedA();
    }

    public function testSpyOriginal() {
        $mock = $this->getMockBuilder(ClassToBeMocked::class)
            // ->enableProxyingToOriginalMethods()
            ->onlyMethods([])
            ->getMock();


        $this->assertEquals('A', $mock->methodToBeMockedA());
    }

}
