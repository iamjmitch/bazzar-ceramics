<?php
include '../session.inc'; 
require_once "../newdbh.inc.php";
require "../classLibrary.inc.php";

if (!isset($_SESSION['logged_in'])){    
    header("Location: ../../members/login.php");
    exit;
}

if (isset($_SESSION['errors'])){
	unset($_SESSION['errors']);
    }

$incorrectfields = array();
$errors = array();


$cart = new cart;
$cartHandle = new cartUpdate;
$cartContents = $cart->getCart();
foreach ($_POST as $product => $qty){
   
    if (!is_numeric($qty) OR $qty < 0){
        $incorrectfields[$product] = true; 
    } 
    else{
        for ($x = 0;$x < count($cartContents); $x++){
            if ($product == $cartContents[$x]['ProductID']){
                if ($qty !== $cartContents[$x]['OrderQuantity']){
                    $cartHandle->batchUpdate ($product, $qty);
                    header("Location: ../../members/cart.php?message=UpdateSuccess");
                    exit;
                }
            }
        }
    }
    if (!empty($incorrectfields)){
    $errors['incorrectfields'] = $incorrectfields; 
    $_SESSION['errors'] = $errors;   
    }

}
header("Location: ../../members/cart.php");
exit; 
?>