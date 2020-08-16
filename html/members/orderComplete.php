<?php 
include '../includes/session.inc'; 
require '../includes/newdbh.inc.php';
require '../includes/classLibrary.inc.php';

?>

<?php
         if( !isset($_SESSION["logged_in"])){
            header("Location: ../members/login.php?error=notloggedin");
         }

         if( !isset($_SESSION["currentOrder"])){
            header("Location: ../members/cart.php");
         }
       
      ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Members Order Page | Bazaar Ceramics</title>
   <link rel="stylesheet" href="../../css/laptop.css">
   <link rel="stylesheet" media="screen and (max-width: 800px) and (min-width:501px)" href="../../css/tablet.css">
   <link rel="stylesheet" media="screen and (max-width: 500px)" href="../../css/mobile.css">
   <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet"
      crossorigin="anonymous">
</head>

<body>

   <div id="fullWidth">
   <?php include '../includes/logo.inc'; ?> 
    <div id="navBarExtender">
         <?php include '../includes/nav.inc'; ?>
      </div>
      <!-- feature image  -->
      <?php include '../includes/feature_banner.inc'; ?>
        <div id="breadcrumbs" class="PageContainer">
         <a href="../../index.php">Home</a>
         <p>></p>
         <a href="orderComplete.php">Order Complete!</a>
        </div>
        <div class="PageContainer tac">
            <div id="contentContainer" class="">
            <h1>Order Complete!</h1>
            
            <?php 
            $orderConfirm = new cart;
            $orderConfirm->confirmOrder();
            $toggle = new userUpdate;
            $toggle->flagToggle();
            
            ?>




            </div>
        </div>
    </div>
        
   <!-- Footer  -->
   <footer>
   <?php include '../includes/footer.inc'; ?>
   </footer>
   <script src="../../scripts/navbar.js"></script>
   <script src="../../scripts/windowOpen.js"></script>
</body>

</html>


