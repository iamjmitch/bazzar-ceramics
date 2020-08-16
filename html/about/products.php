<?php include '../includes/session.inc'; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Products | Bazaar Ceramics</title>
      <link rel="stylesheet" href="../../css/laptop.css">
      <link rel="stylesheet" media="screen and (max-width: 800px) and (min-width:501px)" href="../../css/tablet.css">
      <link rel="stylesheet" media="screen and (max-width: 500px)" href="../../css/mobile.css">
      <link href=" https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
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
            <a href="company_bg.php">About Us</a>
            <p>></p>
            <a href="products.php">Products</a>
         </div>
         <div class="PageContainer tal addFortyTop addFortyBottom">
            <div id="contentContainer" class="">
               <div class="eightyText addTwentyTop tac">
                  <h1 class="addFortyBottom">The Products</h1>
                  <img class="addTwentyBottom" src="../../images/about/products.jpg" alt="Bazaar Ceramics Red Glazed Bowl">
               </div>
               <p class="eightyText addTwentyTop">
                  The current range of products consist of one off ceramic forms (eg vase and bottle forms and dishes)
                  using a number of traditional glazes that are highly prized amongst ceramic collectors. These
                  include:
               </p>
               <ul class="eightyText bullets">
                  <li>Copper Red </li>
                  <li>Reduced Lustre </li>
                  <li>Celadon</li>
                  <li>Jun </li>
               </ul>
               <p class="eightyText addTwentyTop">
                  The other area of ceramic production is the “domestic” ware range. These pieces are also
                  individually designed and hand crafted to the highest quality, however unlike the individual art
                  pieces, our customers are able to purchase entire dinner, coffee and ovenware in a range of designs.
                  Products available in this range include:
               </p>
               <ul class="eightyText bullets">
                  <li>Earthenware dinner sets in a range of brightly coloured contemporary designs</li>
                  <li>Stoneware tea and coffee sets</li>
                  <li>Stoneware oven and serving dishes</li>
               </ul>
            </div>
         </div>
         <!-- Footer  -->
         <footer>             
         <?php include '../includes/footer.inc'; ?>                                        
         </footer>
      </div>
      <script src="../../scripts/navbar.js"></script>
   </body>
</html>