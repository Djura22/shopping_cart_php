<?php

class CartItem {

  public function __construct($name, $price, int $quantity = 1)
  {
      $this->name = $name;
      $this->price = $price;
      $this->quantity = $quantity;
  }

  public function getName()
  {
      return $this->name;
  }

  public function getPrice() 
  {
      return $this->price;
  }

  public function getQuantity()
  {
      return $this->quantity;
  }

  public function increaseQuantity()
  {
      $this->quantity += 1;
  }

  public function decreaseQuantity()
  {
      $this->quantity -= 1;
  }

}