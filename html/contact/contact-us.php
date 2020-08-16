<?php include '../includes/session.inc'; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Contact Us | Bazaar Ceramics</title>
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
            <a href="contact-us.php">Contact Us</a>
         </div>
         <div class="PageContainer tac addFortyTop addFortyBottom">
            <div id="contentContainer" class="">
               <h1>Contact Us</h1>
               <div id="contactFormContainer">
                  <div class="formContent white">
                     <form action="#">
                        <div class="row2">
                           <input type="text" placeholder="Name" class="grey full-width">
                           <input type="text" placeholder="Phone Number" class="grey full-width">
                        </div>
                        <div class="row2">
                           <input type="email" placeholder="Email" class="grey full-width">
                           <input type="text" placeholder="Subject" class="grey full-width">
                        </div>
                        <div class="row2">
                           <textarea placeholder="Your Message" class="grey"></textarea>
                        </div>
                        <div class="row3">
                           <button type="submit" class="blue">Submit</button>
                           <button type="reset" class="blue">Reset</button>
                        </div>
                     </form>
                  </div>
               </div>
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