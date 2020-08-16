<?php include '../includes/session.inc'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Company Background | Bazaar Ceramics</title>
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
              </div>
      <div class="PageContainer tal addFortyTop addFortyBottom">
         <div id="contentContainer" class="">
            <div class="eightyText addTwentyTop tac">
               <h1 class="addFortyBottom">About Us</h1>
               <img class="addTwentyBottom" src="../../images/about/gallery.jpg" alt="Bazaar Ceramics Gallery">
            </div>
            <p class="eightyText addTwentyTop">
               Bazaar Ceramics Studio has been operating for 20 years. We started as a small collective, operating
               in the picturesque township of Hahndorf, South Australia - known for its quality arts and crafts.
               Over the years the studio has passed through a number of transformations. In the first 7 years of
               its existence - as a co-operative, it was well known for producing quality domestic ware and fine
               individually designed art pieces.
            </p>
            <p class="eightyText addTwentyTop">
               Each member of the co-operative was responsible for designing, throwing, glazing and firing their
               own work. A gallery director was employed to look after the gallery and all aspects of marketing.
            </p>
            <p class="eightyText addTwentyTop">
               As the reputation of the studio grew nationally, and production expanded to meet demand, the
               structure of the business changed to its present form. Emma Rich bought the business and moved into
               larger premises in Stepney, Adelaide. The production staff increased and currently includes a
               production manager, 2 full time ceramic designers and 6 production potters.
            </p>
            <p class="eightyText addTwentyTop">
               Bazaar Ceramics has a wide range of products to meet the needs of clients both nationally and
               internationally. The studio produces exquisite one off sculptural pieces for the individual and
               corporate collector. Commissions make up approximately 40% of this work. These pieces can be found
               in board rooms, international hotels and private homes as far away as the US and Germany.
            </p>
            <p class="eightyText addTwentyTop">
               Bazaar Ceramics also produce unique, individually designed domestic ware, including full dinner sets
               and ovenware.
            </p>
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