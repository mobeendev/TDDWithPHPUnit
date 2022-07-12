<?php
use PHPUnit\Framework\TestCase;

class StaticProductTest extends  TestCase {


    public function testProduct()
    {
        // $product = new Product(new Session);
        $session = new class implements SessionInterface {
            public function open() {}
            public function close() {}
            public function write($product)
            {
                echo PHP_EOL . ' :: mocked writing to the session '. $product;
            }
        };
        $product = new Product($session);
        $product->setLoggerCallable(function(){
            echo PHP_EOL . ' :::: Real Logger was not called!';
        });
        $this->assertSame('product 1',$product->fetchProductById(1));
    }

}
