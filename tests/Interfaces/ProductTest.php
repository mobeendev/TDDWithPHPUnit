<?php
use PHPUnit\Framework\TestCase;

class ProductInterfaceTest extends  TestCase {


    public function testProductWithSessionInterface()
    {
        $product = new Product(new Session);
        $this->assertSame('product 1',$product->fetchProductById(1));
    }


    public function testProductWithMockSessionInterface()
    {
        $product = new Product(new Session);
        $session = new class implements SessionInterface {
            public function open() {}
            public function close() {}
            public function write($product)
            {
                echo 'mocked writing to the session '. $product;
            }
        };
        $product = new Product($session);
        $this->assertSame('product 1',$product->fetchProductById(1));
    }

}
