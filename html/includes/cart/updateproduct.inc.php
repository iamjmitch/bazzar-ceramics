<?php
include '../session.inc'; 
require_once "../newdbh.inc.php";
require "../classLibrary.inc.php";

if (!isset($_SESSION['logged_in'])){    
    header("Location: ../../members/login.php");
    exit;
}

if (!isset($_POST['ordersubmit'])){    
    header("Location: ../../members/members.php");
    exit;
}

if (isset($_SESSION['errors'])){
	unset($_SESSION['errors']);
    }
$URL = $_POST['hiddenURL'];
$url = '"Location:'.$URL.'"';
$incorrectfields = array();
$errors = array();
$product = $_POST['productID'];
$qty = $_POST['qty'];

if (!is_numeric($qty) OR $qty <= 0){
    $incorrectfields[$product] = true;    
    $errors['incorrectfields'] = $incorrectfields; 
    $_SESSION['errors'] = $errors;
    header("Location: ../../members/members_order.php?$URL");
    exit;

} 


$check = new product;
if ($check->checkProd($product)){

    $cart = new cartUpdate;
    $cart->update($product, $qty);

    echo '<!DOCTYPE html>
    <html lang="en">
    
    <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Members Login | Bazaar Ceramics</title>
       <link rel="stylesheet" href="../../../css/laptop.css">
       <link rel="stylesheet" media="screen and (max-width: 800px) and (min-width:501px)" href="../../../css/tablet.css">
       <link rel="stylesheet" media="screen and (max-width: 500px)" href="../../../css/mobile.css">
       <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet"
          crossorigin="anonymous">
    </head>

    <body>
    
    <div class="postAddContainer" style="width: 100%;height: 90vh;display: flex;flex-direction: column;justify-content: center;align-items: center;">
        <p style="color: #AD5248;font-weight: bolder;font-size: 16px;">Item Successfully Added To Cart!</p>
        <form action="javascript:keepShopping();">
        <div class="checkoutButtons">
        <input type="submit" value="Keep Shopping">
        <input type="submit" value="Go To Cart" formaction="javascript:goCart();">
        </div>
        </form>

        <script>

        function keepShopping(){
            window.opener.location.reload(true);
            window.close();
        }

        function goCart(){
            opener.location.href = "../../members/cart.php";
            window.close();
        }
        
   
        </script>
    
    
    
    </div>
    
    </body>
    </html>';
    
    // echo "<script>window.close(); window.opener.location.reload(true);</script>";
    exit;
}else{
    header("Location: ../../members/members.php"); 
}
?>