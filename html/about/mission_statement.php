<?php include '../includes/session.inc'; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Mission Statement | Bazaar Ceramics</title>
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
            <a href="mission_statement.php">Mission Statement</a>
         </div>
         <div class="PageContainer tal addFortyTop addFortyBottom">
            <div id="contentContainer" class="">
               <div class="eightyText addTwentyTop tac">
                  <h1 class="addFortyBottom">Mission Statement</h1>
                  <img class="addTwentyBottom" src="../../images/about/mission_statement.jpg" alt="Bazaar Ceramics Gallery">
               </div>
               <p class="eightyText addTwentyTop">
                  Bazaar Ceramics is committed to producing unique, evocative contemporary Ceramic Art of the highest
                  technical quality.
                  Our Goals:
               </p>
               <ul class="eightyText bullets">
                  <li>To produce unique hand crafted pieces for the individual and corporate collector</li>
                  <li>To showcase the best of Australian Ceramic Art and Design</li>
                  <li>To provide an extensive range of well crafted and designed domestic ware</li>
                  <li>To showcase technical excellence in ceramic technology</li>
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