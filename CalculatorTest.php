<?php

require 'Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    protected $fixture;
    
    protected function setUp()
    {
        $this->fixture = new Calculator();
    }
    
    protected function tearDown()
    {
        $this->fixture = NULL;
    }
    
    /**
    * @dataProvider providerGetAnswer
    */
   
    public function testGetAnswer ($expected, $param)
    {
        $this->assertEquals($expected, $this->fixture->getAnswer($param));
        
    }
    
    /**
     * @dataProvider providerGetAnswerException
     * @expectedException Exception
     * 
     */
    public function testGetAnswerException($str)
    {
        $this->fixture->getAnswer($str);
    }
    
    public function providerGetAnswerException()
    {
        return array(
            array('9 0 /'),
            array('9 9 ^'),
            array('asdf'),
        );
    }


    public function providerGetAnswer()
    {
        return array(
            array(81, '9 9 *'),
            array(7, '3 4 +'),
            array(-1, '3 4 -'),
            array(4, '12 3 /'),
        );
    }
    
}
