<?php

require('../DBController.php');
require('../items.php');
require('../Cart.php');

$db = new DBController();

//item object
$item = new Item($db);

//item object
$cart = new Cart($db);

// print_r($_POST);

if (isset($_POST['bookid']) and isset($_POST['cid']) and isset($_POST['qty'])) {

    $Book = $item->getItemData($_POST['bookid']);
    $cartUpdate = $cart->updateCartData($_POST['cid'], $_POST['qty'], $Book[0]['book_price']);
    $result = $item->getItemData($_POST['bookid']);
    echo json_encode($result); 
}
