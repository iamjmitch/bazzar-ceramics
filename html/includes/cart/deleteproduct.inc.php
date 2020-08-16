<?php
include '../session.inc'; 
require_once "../newdbh.inc.php";
require "../classLibrary.inc.php";

if (!isset($_SESSION['logged_in'])){    
    header("Location: ../../members/login.php");
    exit;
}
if (isset($_GET['productID'])){
    $product = $_GET['productID'];
    $cart = new cartUpdate;
    $cart->update($product, 0);
    header("Location: ../../members/cart.php?message=DeleteSuccess");
    exit;
}else{
    header("Location: ../../members/cart.php");
    exit;
}



?>