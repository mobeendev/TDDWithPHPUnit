<?php

trait ShoppingCartFixtureTrait {

    protected $cart;

    protected function setUp(): void
    {
        // echo 'ShoppingCartFixtureTrait/setUp is called every time before each test';
        $this->cart = new ShopingCart;
    }

    protected function tearDown(): void
    {
        // echo 'ShoppingCartFixtureTrait/tearDown is called every time after each test';
        unset($this->cart);
    }
}
