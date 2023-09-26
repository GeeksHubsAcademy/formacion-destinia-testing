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

class MockingTest extends TestCase
{
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
