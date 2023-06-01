<?php

require ('DBController.php');
require ('items.php');
require ('Cart.php');
$db = new DBController();
$item = new Item($db);
$item_shuffle = $item->getData();
$cart = new Cart($db);

?>