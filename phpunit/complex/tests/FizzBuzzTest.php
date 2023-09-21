<?php

include 'src/fizzbuzz.php';

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase

{
    protected $fizzbuzz;

    public function setUp(): void
    {
        parent::setUp();
        $this->fizzbuzz = new FizzBuzz();
    }

    public function testIterations_3()
    {
        $expected = '1\n2\nGeeks\n';
        $value = $this->fizzbuzz->run(3);
        $this->assertEquals($value, $expected);
    }


    public function testIterations_5()
    {
        $expected = '1\n2\nGeeks\n4\nHubs\n';
        $value = $this->fizzbuzz->run(5);
        $this->assertEquals($value, $expected);
    }
    // Mock a method step to return a fixed value A
    public function testOnlyRunMethod()
    {

        $mock = $this->getMockBuilder(FizzBuzz::class)
            ->onlyMethods(['step'])
            ->getMock();

        // configure the stub to return a fixed value
        $mock->method('step')->willReturn('A');

        // call the method being tested
        $result = $mock->run(2);

        // assert that the method returned the expected value
        $this->assertEquals('A\nA\n', $result);
    }

    public function testStepMethodHaveBeenCalled()
    {
        $mock = $this->getMockBuilder(FizzBuzz::class)
            ->onlyMethods(['step'])
            ->getMock();

        $mock->expects($this->exactly(5))
            ->method('step');

        $mock->run(5);
    }
}
