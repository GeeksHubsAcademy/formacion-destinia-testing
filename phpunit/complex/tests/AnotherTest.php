<?php


use PHPUnit\Framework\TestCase;

class AnotherTest extends TestCase
{
    public function testMustPass()
    {

        $this->assertEquals(1, 1);
    }
    public function testMustFail()
    {
        $this->markTestSkipped(
            'I don t want to run this test',
        );
        $this->assertEquals(1, 2);
    }
}
