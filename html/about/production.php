<?php include '../includes/session.inc'; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>The Production Process | Bazaar Ceramics</title>
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
            <a href="production.php">Production Process</a>
         </div>
         <div class="PageContainer addFortyTop addFortyBottom">
            <div id="contentContainer" class="eightyText addTwentyTop tac">
               <h1 class="addFortyBottom">The Production Process</h1>
            </div>
            <div class="productionSlider">
               <div class="slidesContent">
                  <div id="slide1" class="slider">
                  </div>
                  <div id="slide2" class="slider">
                  </div>
                  <div id="slide3" class="slider">
                  </div>
                  <div id="slide4" class="slider">
                  </div>
                  <div id="slide5" class="slider">
                  </div>
               </div>
               <div id="thumbs">
                  <a href="#slide1" onclick="slideToggle(1); return false;"><img
                     src="../../images/production/thumb/thumb_production1.jpg" alt="Production Process Thumbnail 1"></a>
                  <a href="#slide2" onclick="slideToggle(2); return false;"><img
                     src="../../images/production/thumb/thumb_production2.jpg" alt="Production Process Thumbnail 2"></a>
                  <a href="#slide3" onclick="slideToggle(3); return false;"><img
                     src="../../images/production/thumb/thumb_production3.jpg" alt="Production Process Thumbnail 3"></a>
                  <a href="#slide4" onclick="slideToggle(4); return false;"><img
                     src="../../images/production/thumb/thumb_production4.jpg" alt="Production Process Thumbnail 4"></a>
                  <a href="#slide5" onclick="slideToggle(5); return false;"><img
                     src="../../images/production/thumb/thumb_production5.jpg" alt="Production Process Thumbnail 5"></a>
               </div>
            </div>
         </div>
         <div class="PageContainer addFiftyBottom">
            <p class="eightyText"> Bazaar Ceramics are constantly experimenting with new designs and techniques. The
               process of developing
               a particular range of ceramics, starts with the design process. The ceramic designers and gallery
               director meet regularly to discuss new ideas for product ranges. It may be that the designers are
               following through on an inspiration from a field trip or perhaps the gallery director has some
               suggestions to make based on feedback from customers.
            </p>
            <br>
            <p class="eightyText"> Promising designs are developed into working drawings which the production potters
               use to create the
               ceramic forms. Depending on the type of decoration, the designers may apply the decoration at this
               stage, or after they have been “bisqued” (fired to 1000 degrees celsius). These prototype designs go
               through a lengthy development stage of testing and review until the designer is happy with the finished
               product. At this stage a limited number of pots are produced and displayed in the gallery. If they do
               well in the gallery, they become a “standard line”.
            </p>
         </div>
         <!-- Footer  -->
         <footer>
         <?php include '../includes/footer.inc'; ?>
         </footer>
      </div>
      <script></script>
      <script src="../../scripts/navbar.js"></script>
      <script src="../../scripts/slideshow.js"></script>
   </body>
</html>