<?php
use PHPUnit\Framework\TestCase;

class ProductAbstractTest extends  TestCase {


    public function testProductAbstractClass()
    {
        $phpunit = $this;
        $expected = 3928;
        $productAbstract = new class() extends AbstractProduct {};
        $this->assertSame($expected, $productAbstract->fetchProductById($expected));

    }

}
