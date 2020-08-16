<?php include '../includes/session.inc'; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>The Design Process | Bazaar Ceramics</title>
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
            <a href="design.php">Design Process</a>
         </div>
         <div class="PageContainer tal addFortyTop addFortyBottom">
            <div id="contentContainer" class="">
               <div class="eightyText addTwentyTop tac">
                  <h1 class="addFortyBottom">Design Process</h1>
                  <img class="addTwentyBottom" src="../../images/about/design-process.jpg" alt="Image of Our Design Process">
               </div>
               <p class="eightyText addTwentyTop">
                  The ceramic designers take regular trips to remote regions looking for inspiration from the natural
                  environment, whether it is the outback or the wild coastlines.
               </p>
               <p class="eightyText addTwentyTop"> Back in the studio their sketches and
                  photographs are worked up into designs, which complement the ceramic forms.
               </p>
               <p class="eightyText addTwentyTop">
                  The ceramic designers
                  work closely with the gallery director, to ensure that not only is their work unique and
                  contemporary, but is also responsive to the requirements of their clients.
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