<?php

//these two files can be occur an error
require_once('DBController.php');
require_once('items.php');
//*************************************/

$db = new DBController();

// Creating an instance of the Item class
$item= new Item($db);
$product_shuffle_1 = $item->getMostPopular();
$product_shuffle_2= $item->getNewArrivals();
?>
