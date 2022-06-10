<?php
use PHPUnit\Framework\TestCase;

class MathCalculatorTest extends  PHPUnit\Framework\TestCase {

    public function testAddNumbersResult()
    {
        $expected = 15;
        $MathCalculator = new MathCalculator();
        $MathCalculator->a = 5;
        $MathCalculator->b = 10;
        $result = $MathCalculator->add();
        $this->assertSame($expected, $result);

    }


    public function testMultiplyNumbersResult()
    {
        $expected = 20;
        $MathCalculator = new MathCalculator();
        $MathCalculator->a = 2;
        $MathCalculator->b = 10;
        $result = $MathCalculator->multiply();
        $this->assertSame($expected, $result);

    }

   

}
