<?php
include '../session.inc'; 
require_once "../newdbh.inc.php";
require "../classLibrary.inc.php";

if (!isset($_SESSION['logged_in'])){    
    header("Location: ../../members/login.php");
    exit;
}

if (isset($_SESSION['currentOrder'])){
$cart = new cartUpdate;
$cart->deleteCart();
}
header("Location: ../../members/cart.php");

?>