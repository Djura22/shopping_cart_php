<?php

require('C:\xampp\htdocs\shopping_cart\src\cart_item.php');

class ShoppingCart {

    public function __construct($total = 0) {
        $this->total = $total;

    }

    public array $cart = [];

    public function getTotal() {

        return $this->total;
    }

    public function addItem($name, $price) {
        $this->total += $price;
        foreach ($this->cart as $cartItem) {
            if ($cartItem->getName() == $name) {
                $cartItem->increaseQuantity();
            return;
            }
        }
        $newCartItem = new CartItem($name, $price);
        array_push($this->cart, $newCartItem);
    }

}