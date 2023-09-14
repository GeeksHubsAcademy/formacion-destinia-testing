<?php

include 'src/main.php';

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase

{
    protected $fizzbuzz;

    public function setUp(): void
    {
        parent::setUp();
        $this->fizzbuzz = new FizzBuzz();
    }
    /**
     * @covers FizzBuzz
     */
    public function testIterations_3()
    {
        $expected = '1\n2\nGeeks\n';
        $value = $this->fizzbuzz->run(3);
        $this->assertEquals($value, $expected);
    }
    /**
     * @covers FizzBuzz
     */
    public function testIterations_30()
    {
        $expected = '1\n2\nGeeks\n4\nHubs\nGeeks\n7\n8\nGeeks\nHubs\n11\nGeeks\n13\n14\nGeeksHubs\n16\n17\nGeeks\n19\nHubs\nGeeks\n22\n23\nGeeks\nHubs\n26\nGeeks\n28\n29\nGeeksHubs\n';
        $value = $this->fizzbuzz->run(30);
        $this->assertEquals($value, $expected);
    }
    /**
     * @covers FizzBuzz
     */
    public function testIterations_60()
    {
        $expected =  '1\n2\nGeeks\n4\nHubs\nGeeks\n7\n8\nGeeks\nHubs\n11\nGeeks\n13\n14\nGeeksHubs\n16\n17\nGeeks\n19\nHubs\nGeeks\n22\n23\nGeeks\nHubs\n26\nGeeks\n28\n29\nGeeksHubs\n31\n32\nGeeks\n34\nHubs\nGeeks\n37\n38\nGeeks\nHubs\n41\nGeeks\n43\n44\nGeeksHubs\n46\n47\nGeeks\n49\nHubs\nGeeks\n52\n53\nGeeks\nHubs\n56\nGeeks\n58\n59\nGeeksHubs\n';
        $value = $this->fizzbuzz->run(60);
        $this->assertEquals($value, $expected);
    }
    /**
     * @covers FizzBuzz
     */
    public function testIterations_100()
    {
        $expected = '1\n2\nGeeks\n4\nHubs\nGeeks\n7\n8\nGeeks\nHubs\n11\nGeeks\n13\n14\nGeeksHubs\n16\n17\nGeeks\n19\nHubs\nGeeks\n22\n23\nGeeks\nHubs\n26\nGeeks\n28\n29\nGeeksHubs\n31\n32\nGeeks\n34\nHubs\nGeeks\n37\n38\nGeeks\nHubs\n41\nGeeks\n43\n44\nGeeksHubs\n46\n47\nGeeks\n49\nHubs\nGeeks\n52\n53\nGeeks\nHubs\n56\nGeeks\n58\n59\nGeeksHubs\n61\n62\nGeeks\n64\nHubs\nGeeks\n67\n68\nGeeks\nHubs\n71\nGeeks\n73\n74\nGeeksHubs\n76\n77\nGeeks\n79\nHubs\nGeeks\n82\n83\nGeeks\nHubs\n86\nGeeks\n88\n89\nGeeksHubs\n91\n92\nGeeks\n94\nHubs\nGeeks\n97\n98\nGeeks\nHubs\n';
        $value = $this->fizzbuzz->run(100);
        $this->assertEquals($value, $expected);
    }
}
