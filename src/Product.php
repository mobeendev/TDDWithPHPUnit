<?php

class Product {

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function fetchProductById($id)
    {
        // call the database to fetch the product e.g
        // $product = db->getProduct($id); 

        $product = 'product 1';
        $this->session->write($product);
        return $product;
    }
}
