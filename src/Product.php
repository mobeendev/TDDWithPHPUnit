<?php

class Product extends AbstractProduct {

    protected $addLoggerCallable = [Logger::class, 'log'];
    
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function setLoggerCallable(callable $callable)
    {
        $this->addLoggerCallable = $callable;
    }

    // public function fetchProductById($id)
    // {
    //     // call the database to fetch the product e.g
    //     // $product = db->getProduct($id); 

    //     $product = 'product 1';
    //     $this->session->write($product);
    //     Logger::log($product);
    //     return $product;
    // }

    public function fetchProductById($id)
    {
        // call the database to fetch the product
        $product = 'product 1';
        $this->session->write($product);
        // Logger::log($product);
        call_user_func($this->addLoggerCallable, $product);

        return $product;
    }


}
