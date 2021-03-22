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

    public function removeItem($name) {
        $found = false;
        foreach ($this->cart as $key => $value) {
            if ($value->name == $name) {
                $this->total -= $value->price * $value->quantity;
                $found = true;
                break;
            }
        }
        if ($found) unset($this->cart[$key]);
    }

    public function addQuantity($name) {
        foreach ($this->cart as $key => $value) {
            if ($value->name == $name) {
                if ($value->quantity >= 1) {
                    $value->quantity += 1;
                    $this->total += $value->price;
                }
                break;
            }
        }
    }

    public function reduceQuantity($name) {
        foreach ($this->cart as $key => $value) {
            if ($value->name == $name) {
                if ($value->quantity > 1) {
                    $value->quantity -= 1;
                    $this->total -= $value->price;
                }
                break;
            }
        }
    }

}