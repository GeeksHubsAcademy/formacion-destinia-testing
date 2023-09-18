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
        $sut = $this->createMock(ClassToBeMocked::class);
        $sut->method('methodToBeMockedA')->willReturn('C');
        $this->assertEquals('C', $sut->methodToBeMockedA());
        $this->assertEquals(null, $sut->methodToBeMockedB());
    }

    public function testSpyMock() {
        $sut = $this->createMock(ClassToBeMocked::class);

        $sut->expects($this->exactly(2))
            ->method('methodToBeMockedA')
            ->willReturn('C');
        $this->assertEquals('C', $sut->methodToBeMockedA());
        $sut->methodToBeMockedA();
    }

    public function testSpyOriginal() {
        $sut = $this->getMockBuilder(ClassToBeMocked::class)
            ->enableOriginalConstructor()
            ->enableOriginalClone()
            ->enableProxyingToOriginalMethods()
            ->getMock();


        $this->assertEquals('A', $sut->methodToBeMockedA());
    }

}
