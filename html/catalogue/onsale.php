<?php include '../includes/session.inc'; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>On Sale | Bazaar Ceramics</title>
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
            <a href="catalogue.php">Catalogue</a>
            <p>></p>
            <a href="onsale.php">On Sale</a>
         </div>
         <div class="PageContainer tac">
            <div id="contentContainer" class="">
               <h1>On Sale</h1>
            </div>
         </div>
         <div class="productPageContainer addFiftyBottom">
            <div id="catalogueContainer">
               <!-- cat item 1  -->
               <div class="catalogueItem">
                  <div class="catImgContainer">
                     <img src="../../images/products/smaller/bcpot021_smaller.jpg" alt="bcpot021">
                  </div>
                  <div class="catStarContainer">
                     <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                  </div>
                  <div class="catNameContainer">
                     <p>Ceramic Teapot</p>
                  </div>
                  <div class="catPriceContainer">
                     <p>$180</p>
                     <p class="priceRed">was $320</p>
                  </div>
                  <div class="catSizeContainer">
                     <p>7cm radius</p>
                  </div>
                  <div class="catGlazeContainer">
                     <p>Matte</p>
                  </div>
                  <div class="catBlurbContainer">
                     <p>Clasic style tea pot available in a range of colours</p>
                  </div>
               </div>
               <!-- onsale item 2  -->
               <div class="catalogueItem">
                  <div class="catImgContainer">
                     <img src="../../images/products/smaller/bcpot003_smaller.jpg" alt="bcpot003">
                  </div>
                  <div class="catStarContainer">
                     <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                  </div>
                  <div class="catNameContainer">
                     <p>Hand painted gold leaf teacup</p>
                  </div>
                  <div class="catPriceContainer">
                     <p>$50</p>
                     <p class="priceRed">was $100</p>
                  </div>
                  <div class="catSizeContainer">
                     <p>5cm radius</p>
                  </div>
                  <div class="catGlazeContainer">
                     <p>Teal Glaze</p>
                  </div>
                  <div class="catBlurbContainer">
                     <p>Teal and gold teacup with a shine finish</p>
                  </div>
               </div>
               <!-- onsale item 3  -->
               <div class="catalogueItem">
                  <div class="catImgContainer">
                     <img src="../../images/products/smaller/bcpot010_smaller.jpg" alt="bcpot010">
                  </div>
                  <div class="catStarContainer">
                     <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                        class="fas fa-star"></i><i class="fas fa-star"></i>
                  </div>
                  <div class="catNameContainer">
                     <p>Twin White Vases</p>
                  </div>
                  <div class="catPriceContainer">
                     <p>$150</p>
                     <p class="priceRed">was $200</p>
                  </div>
                  <div class="catSizeContainer">
                     <p>13cm diameter </p>
                  </div>
                  <div class="catGlazeContainer">
                     <p>White glaze</p>
                  </div>
                  <div class="catBlurbContainer">
                     <p>Classic style white vases. Sold as a 2 pack</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Footer  -->
      <footer>             
         <?php include '../includes/footer.inc'; ?>                                        
         </footer>
      <script src="../../scripts/navbar.js"></script>
   </body>
</html>