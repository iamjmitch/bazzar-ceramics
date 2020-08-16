<?php include '../includes/session.inc';
if(!isset($_SESSION['signupcheck'])) {
   header("Location: ../members/signup.php");
   exit();
   }
 
if (isset($_SESSION['errors'])){
   $errors = $_SESSION['errors'];}
   
if (isset($errors['missingfields'])){
   $missingfields = $errors['missingfields'];}?>
   
   
   
   

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Members Login | Bazaar Ceramics</title>
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
      <?php include '../includes/feature_banner.inc'; 
      // include '../includes/breadcrubs.inc.php'; ?>
      <div class="PageContainer tac addFortyTop addFortyBottom">
         <div id="contentContainer" class="">
            <h1>New Customer Sign Up</h1>

            <!-- start form -->
            <div id="signupFormContainer" >
            <?php 
            if (isset($errors['sqlerror'])){
               echo '
            <div class="sqlerror">
            <p>Error Connecting to Database. If problem persists, please email our tech depatment</p>
            </div>';}
            ?>
               <div class="formContent white">
                  <div id="formleft">
                     <div class="black">
                        <div id="signup" class="formleftbox">
                           <p><?php echo $_SESSION['fname']?>, you're almost registered!</p>
                           <p>We just need a few more details from you</p>
                           </div>
                       
                     </div>
                  </div>
                  <form action="../includes/new_signup.inc.php" method="post">
                  <div class="row2">
                        <div class="labelrow">
                        <label for="uname">First Name:</label>
                        <?php 
                        if (isset($missingfields['fname'])){echo'<p class="errorRed">Required</p>';}
                        ?>
                        </div>
                        <input type="text"  name="uname" value="<?php 
                        if (isset($_SESSION['fname'])){echo $_SESSION['fname']; }?>" class="grey full-width" required>                        
                     </div>
                        
                     <div class="row2">
                        <div class="labelrow">
                        <label for="uname">Last Name:</label>
                        <?php 
                        if (isset($missingfields['lname'])){echo'<p class="errorRed">Required</p>';}
                        ?>
                        </div>
                        <input type="text"  name="lname" value="<?php 
                        if (isset($_SESSION['lname'])){echo $_SESSION['lname']; }?>" class="grey full-width" required>                        
                     </div>

                     <div class="row2">
                        <div class="labelrow">
                        <label for="uname">Phone Number:</label>
                        <?php 
                        if (isset($missingfields['phone'])){echo'<p class="errorRed">Required</p>';}
                        if (isset($errors['invalidphone'])){echo'<p class="errorRed">Invalid Phone Number</p>';}
                        
                        ?>
                        </div>
                        <input type="number"  name="phone" value="<?php 
                        if (isset($_SESSION['phone']) && !isset($errors['invalidphone'])){echo $_SESSION['phone']; }?>" class="grey full-width" required>                        
                     </div>
                     <div class="row2">
                        <div class="labelrow">
                        <label for="uname">Address:</label>
                        <?php 
                        if (isset($missingfields['address'])){echo'<p class="errorRed">Required</p>';}
                        ?>
                        </div>
                        <input type="text"  name="address" value="<?php 
                        if (isset($_SESSION['address'])){echo $_SESSION['address']; }?>" class="grey full-width" required>                        
                     </div>
                     <div class="row2">
                        <div class="labelrow">
                        <label for="uname">Suburb:</label>
                        <?php 
                        if (isset($missingfields['suburb'])){echo'<p class="errorRed">Required</p>';}
                        ?>
                        </div>
                        <input type="text"  name="suburb" value="<?php 
                        if (isset($_SESSION['suburb'])){echo $_SESSION['suburb']; }?>" class="grey full-width" required>                        
                     </div>
                     <div class="row2">
                        <div class="labelrow">
                        <label for="uname">State:</label>
                        <?php 
                        if (isset($missingfields['state'])){echo'<p class="errorRed">Required</p>';}
                        ?>
                        </div>
                        <input type="text"  name="state" value="<?php 
                        if (isset($_SESSION['state'])){echo $_SESSION['state']; }?>" class="grey full-width" required>                        
                     </div>
                     <div class="row2">
                        <div class="labelrow">
                        <label for="uname">Postcode:</label>
                        <?php 
                        if (isset($missingfields['post'])){echo'<p class="errorRed">Required</p>';}
                        ?>
                        </div>
                        <input type="text"  name="postcode" value="<?php 
                        if (isset($_SESSION['postcode'])){echo $_SESSION['postcode']; }?>" class="grey full-width" required>                        
                     <div class="row2">
                        <div class="labelrow">
                        <label for="uname">Country:</label>
                        <?php 
                        if (isset($missingfields['country'])){echo'<p class="errorRed">Required</p>';}
                        ?>
                        </div>
                        <input type="text"  name="country" value="<?php 
                        if (isset($_SESSION['country'])){echo $_SESSION['country']; }?>" class="grey full-width" required>                        
                     </div>
                     <div class="row3">
                        <button type="submit" name="signupSubmit" class="blue">Submit</button>
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