<?php
require 'lib/lime.php';
require 'src/TwoDialog/Test/TestCase.php';
require 'src/TwoDialog/Test/TestRunner.php';

class ExampleTest extends TwoDialog_Test_TestCase
{
    public function testCanRunTests()
    {
        $this->assertTrue(1 === 1, '1 should be equal to 1');
        $this->assertEquals('1', '1', '1 === 1');
        $this->assertGreaterThan(3, 10, '10 is greater than 3');
        $this->assertInstanceOf('Exception', new Exception(), "Object's class is Exception");
        $this->assertNotEquals('hola', null, '"hola" and null are different');
        $this->assertRegExp('/hola/', 'hola mundo', 'String starts with hola');
        $this->assertNotRegExp('/ok/', 'cancel', '"cancel" does not match pattern "ok"');
    }
    
    public function anotherTest() {}
}

$runner = new TwoDialog_Test_TestRunner();
$runner->run(new ExampleTest());