<?php

require('C:\xampp\htdocs\shopping_cart\src\shopping_cart.php');
require('C:\xampp\htdocs\shopping_cart\src\products.php');
session_start();

$cart = new ShoppingCart();
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = $cart;
}

$print = [];

if (isset($_POST['add1'])) {
    $_SESSION['cart']->addItem($products[0]['name'], $products[0]['price']);
} elseif (isset($_POST['add2'])) {
    $_SESSION['cart']->addItem($products[1]['name'], $products[1]['price']);
} elseif (isset($_POST['add3'])) {
    $_SESSION['cart']->addItem($products[2]['name'], $products[2]['price']);
} elseif (isset($_POST['add4'])) {
    $_SESSION['cart']->addItem($products[3]['name'], $products[3]['price']);
} elseif (isset($_POST['add5'])) {
    $_SESSION['cart']->addItem($products[4]['name'], $products[4]['price']);
}

$cart = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ezyVet Tool Shop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>

<div class="container">

    <div class="card">
        <img src="https://5.imimg.com/data5/BS/PG/MY-22915948/gold-sledge-hammer-500x500.jpg" style="width:100%">
        <a class="title"><?php echo $products[0]['name']; ?></a>
        <p class="price"><strong>£<?php echo number_format($products[0]['price'], 2); ?></strong></p>
        <form method="post">
            <input type="submit" name="add1" value="Add to cart"/>
        </form>
    </div>

    <div class="card">
        <img src="https://workware.co.uk/wp-content/uploads/2018/06/yankee_axe_1600g.jpg" style="width:100%">
        <a class="title"><?php echo $products[1]['name']; ?></a>
        <p class="price"><strong>£<?php echo number_format($products[1]['price'], 2); ?></strong></p>
        <form method="post">
            <input type="submit" name="add2" value="Add to cart"/>
        </form>
    </div>

    <div class="card">
        <img src="https://media.screwfix.com/is/image//ae235?src=ae235/5688P_P&$prodImageMedium$" style="width:100%">
        <a class="title"><?php echo $products[2]['name']; ?></a>
        <p class="price"><strong>£<?php echo number_format($products[2]['price'], 2); ?></strong></p>
        <form method="post">
            <input type="submit" name="add3" value="Add to cart"/>
        </form>
    </div>

    <div class="card">
        <img src="https://www.fullertool.com/wp-content/uploads/2018/10/300-0094_AA-768x768.jpg" style="width:100%">
        <a class="title"><?php echo $products[3]['name']; ?></a>
        <p class="price"><strong>£<?php echo number_format($products[3]['price'], 2); ?></strong></p>
        <form method="post">
            <input type="submit" name="add4" value="Add to cart"/>
        </form>
    </div>

    <div class="card">
        <img src="https://www.robertdyas.co.uk/media/catalog/product/cache/ee7f57371963fdaf9f4353c1acf7bd18/2/0/203343-_1_.gif" style="width:100%">
        <a class="title"><?php echo $products[4]['name']; ?></a>
        <p class="price"><strong>£<?php echo number_format($products[4]['price'], 2); ?></strong></p>
        <form method="post">
            <input type="submit" name="add5" value="Add to cart"/>
        </form>
    </div>

</div>

<div id="cart">
    <section id="cart-content">
        <div style="clear: both"></div>
        <h3 class="title2">Shopping Cart</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Product Price</th>
                <th width="7.5%">Product Total</th>
                <th width="10%">Cart Total: £<?php echo number_format($cart->getTotal(), 2); ?></th>
            </tr>
            <tr>
                <td><?php
                    if(!empty($cart->cart)) {
                        foreach($cart->cart as $cartItem) {
                            $print = $cartItem->getName() . PHP_EOL;
                            echo nl2br($print);
                        }
                    } ?>
                </td>
                <td><?php 
                    if(!empty($cart->cart)) {
                        foreach($cart->cart as $cartItem) {
                            $print = $cartItem->getQuantity() . PHP_EOL;
                            echo nl2br($print);
                        }
                    } ?>
                </td>
                <td><?php 
                    if(!empty($cart->cart)) {
                        foreach($cart->cart as $cartItem) {
                            $print = number_format($cartItem->getPrice(), 2) . PHP_EOL;
                            echo nl2br("£" . $print);
                        }    
                    } ?>
                </td>
                <td><?php 
                    if(!empty($cart->cart)) {
                        foreach($cart->cart as $cartItem) {
                            $print = number_format($cartItem->getTotalCost(), 2) . PHP_EOL;
                            echo nl2br("£" . $print);
                        }    
                    } ?>
                </td>
            </tr>
    </section>
</div>
  
</body>
</html>