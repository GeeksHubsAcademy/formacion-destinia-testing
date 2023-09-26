<?php

require_once 'src/password.php';
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{

    public function testNotValidLessThan8()
    {
        $password = new Password('12345678');
        $this->assertFalse($password->isValid());
    }
    public function testErrorLessThan8()
    {
        $password = new Password('12345678');
        $this->assertContains($password->posibleErrors['errorLength'], $password->getErrors());
    }

    public function testNotHaveErrorLessThan8()
    {
        $password = new Password('123456789');
        $this->assertNotContains($password->posibleErrors['errorLength'], $password->getErrors());
    }


    public function testNotValidNotSpecialChar()
    {
        $password = new Password('12345678');
        $this->assertFalse($password->isValid());
    }
    public function testErrorNotSpecialChar()
    {
        $password = new Password('12345678');
        $this->assertContains('Must have at least one especial character', $password->getErrors());
    }
    public function testNotHaveErrorSpecialChar()
    {
        $password = new Password('12345678!');
        $this->assertNotContains('Must have at least one especial character', $password->getErrors());
    }

    public function testNotValidNotNumber()
    {
        $password = new Password('ABCDEFGH');
        $this->assertFalse($password->isValid());
    }
    public function testErrorNotNumber()
    {
        $password = new Password('ABCDEFGH');
        $this->assertContains('Must have at least one number', $password->getErrors());
    }
    public function testNotHaveErrorNotNumber()
    {
        $password = new Password('ABCD1EFGH');
        $this->assertNotContains('Must have at least one number', $password->getErrors());
    }

    public function testNotValidNotUppercase()
    {
        $password = new Password('abcdefgh');
        $this->assertFalse($password->isValid());
    }
    public function testErrorNotUppercase()
    {
        $password = new Password('abcdefgh');
        $this->assertContains('Must have at least one uppercase', $password->getErrors());
    }
    public function testNotHaveErrorNotUppercase()
    {
        $password = new Password('abcdefgH');
        $this->assertNotContains('Must have at least one uppercase', $password->getErrors());
    }

    public function testNotValidNotLowercase()
    {
        $password = new Password('ABCDEFGH');
        $this->assertFalse($password->isValid());
    }
    public function testErrorNotLowercase()
    {
        $password = new Password('ABCDEFGH');
        $this->assertContains('Must have at least one lowercase', $password->getErrors());
    }
    public function testNotHaveErrorNotLowercase()
    {
        $password = new Password('abcdefgH');
        $this->assertNotContains('Must have at least one lowercase', $password->getErrors());
    }


    public function testErrorNotSpaces()
    {
        $password = new Password('ABCD EF!2');
        $this->assertContains('Must can not have any space', $password->getErrors());
    }
    public function testErrorNotSpaces2()
    {
        $password = new Password('ABCDEF!2 ');
        $this->assertContains('Must can not have any space', $password->getErrors());
    }

    public function testValid1()
    {
        $password = new Password('Abcdefg1!');
        $this->assertTrue($password->isValid());
    }
    public function testValid2()
    {
        $password = new Password('asdfT?u12');
        $this->assertTrue($password->isValid());
    }

    public function testGetPassword()
    {
        $password = new Password('123');
        $this->assertEquals($password->getPassword(), '123');
    }
    public function testMustOnlyOneErrorOfEachType()
    {
        $password = new Password(' ');
        $this->assertCount(6, $password->getErrors());
    }


}
