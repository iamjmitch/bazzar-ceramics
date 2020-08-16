<?php include 'html/includes/session.inc'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Bazaar Ceramics</title>
   <link rel="stylesheet" href="./css/laptop.css">
   <link rel="stylesheet" media="screen and (max-width: 800px) and (min-width:501px)" href="./css/tablet.css">
   <link rel="stylesheet" media="screen and (max-width: 500px)" href="./css/mobile.css">
   <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet"
      crossorigin="anonymous">
</head>

<body>
   <div id="fullWidth">
      <?php include 'html/includes/logo.inc'; ?>
         <div id="navBarExtender">
         <?php include 'html/includes/nav.inc'; ?>
      </div>
      <!-- hero image -->
      <div id="heroImage">
         <h1>"Breathtaking"</h1>
         <h2>Summer Catalogue Out Now</h2>
         <a href="/html/catalogue/catalogue.php">
            <div class="heroButton">
               <p>View Catalogue</p>
            </div>
         </a>
      </div>
      <!-- Page content -->
      <div class="PageContainer tac addEightyTop">
         <div id="contentContainer" class="">
            <h2>Welcome</h2>
            <p class="eightyText">
               Bazaar Ceramics Studio has been operating for 20 years. We started as a small collective, operating
               in the picturesque township of Hahndorf, South Australia - known for its quality arts and crafts.
               Over the years the studio has passed through a number of transformations. In the first 7 years of
               its existence - as a co-operative, it was well known for producing quality domestic ware and fine
               individually designed art pieces.
            </p>
         </div>
      </div>
      <!-- Service boxes -->
      <div class="PageContainer addEightyBottom">
         <div id="serviceBoxContainer">
            <div class="serviceBox">
               <div class="serviceBoxIconContainer">
                  <i class="fas fa-check-circle"></i>
               </div>
               <p class="bold serviceBoxHeading">
                  High Quality
               </p>
               <p class="addTwentyBottom">
                  We provide an extensive range of well crafted and designed domestic ware
               </p>
            </div>
            <div class="serviceBox">
               <div class="serviceBoxIconContainer">
                  <i class="fas fa-hand-paper"></i>
               </div>
               <p class="bold serviceBoxHeading">
                  Hand Made
               </p>
               <p class="addTwentyBottom">
                  We produce unique hand crafted pieces for the individual and corporate collector
               </p>
            </div>
            <div class="serviceBox">
               <div class="serviceBoxIconContainer">
                  <i class="fas fa-user-friends"></i>
               </div>
               <p class="bold serviceBoxHeading">
                  Real People
               </p>
               <p class="addTwentyBottom">
                  Designed, Crafted and finished by highly trained designers
               </p>
            </div>
         </div>
      </div>
      <!-- who are we  -->
      <div id="aboutContainer">
         <div id="wawicon">
            <i class="fas fa-id-card"></i>
         </div>
         <div id="aboutContainerLeft">
            <div class="halfContainer">
               <h4>Who are we</h4>
               <h5 class="addTwentyBottom">We make pretty nice stuff </h5>
               <p>Bazaar Ceramics has a wide range of products to meet the needs of clients both nationally and
                  internationally. The studio produces exquisite one off sculptural pieces for the individual and
                  corporate collector. Commissions make up approximately 40% of this work. These pieces can be
                  found in:
               </p>
               <ul>
                  <li>Board Rooms</li>
                  <li>International Hotels</li>
                  <li>Private Homes</li>
                  <li>All over the world including the USA and Germany</li>
               </ul>
               <a href="/html/about/company_bg.php">
                  <div class="readmoreButton tac">
                     <p>Read More</p>
                  </div>
               </a>
            </div>
         </div>
         <div id="aboutContainerRight">
            <img src="./images/home/about.png" alt="Blue Glaze Vase">
         </div>
      </div>
   </div>
   <div class="addEightyBottom"></div>
   <!-- Product banner  -->
   <div id="productBanner">
      <div class="PageContainer">
         <div class="flexbox center aic">
            <img class="bannerImg" src="./images/home/pot.png" alt="charcoal modern bowls">
            <div id="productBannerContainer">
               <div class="newButton">
                  <p>New</p>
               </div>
               <h4 class="addTwentyBottom">Charcoal Modern Bowls<br>(2 Pack)</h4>
               <a href="/html/catalogue/catalogue.php">
                  <div class="heroButton">
                     <p>Order Now</p>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </div>
   <!-- Showroom -->
   <div class="addEightyBottom addEightyTop">
      <div id="showroomContainer" class="tac">
         <div id="globeBox">
            <i class="fas fa-globe-asia"></i>
         </div>
         <h3 class="red">Come Visit Our Showroom</h3>
         <div class="flexbox center addFiftyBottom">
            <div id="showroomDetails">
               <p class="bold red">Bazaar Ceramics Showroom </p>
               <p>123 Fake Street<br>SomeTown NSW<br>Australia 4000</p>
               <p>help@bazaarceramics.com</p>
               <p class="addFiftyBottom">(01) 2345 6789</p>
               <p class="bold red">Showroom Hours </p>
               <p>Mon-Fri: 9am-5pm<br>Sat & Sun: 10am-3pm</p>
            </div>
            <div id="showroomMap">
               <div class="mapouter">
                  <div class="mapouter">
                     <div class="gmap_canvas"><iframe id="gmap_canvas"
                           src="https://maps.google.com/maps?q=70%20Widderson%20St%2C%20Port%20Macquarie%20NSW%202444&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe><a
                           href="https://www.embedgooglemap.net/blog/best-wordpress-themes/">wordpress
                           themes</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Footer  -->
   <footer>
      <?php include 'html/includes/footer.inc'; ?>
   </footer>
   <script>
      console.log("worked")
   </script>
   <script src="./scripts/navbar.js"></script>
</body>

</html>