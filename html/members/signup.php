<?php 
include '../includes/session.inc';
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
   <title>Members Signup | Bazaar Ceramics</title>
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
      ?>
      <div class="PageContainer tac addFortyTop addFortyBottom">
         <div id="contentContainer" class="">
            <h1>Member Sign Up</h1>

            <!-- start form -->
            <div id="signupFormContainer">
            <?php 
            if (isset($errors['sqlerror'])){
               echo '
            <div class="sqlerror">
            <p>Error Connecting to Database. If problem persists, please email our tech depatment</p>
            </div>';}
            ?>
               <div class="formContent white">
               <div id="formleftexi">
                     <div class="black">
                     <div class="formleftbox">
                           <p>Register as a member to gain access to our exclusive members only order page</p>
                           
                        </div>
                        <div class="formleftbox">
                           <h5>Already a Member?</h5>
                           <a href="../members/login.php">
                              <button>Login</button></a>
                        </div>
                        
                     </div>
                  </div>
                  <form action="../includes/signup.inc.php" method="post">
                     <div class="row2">
                        <div class="labelrow">
                        <label for="uname">Username:</label>
                        <?php 
                        if (isset($errors['invalidusername'])){echo '<p class="errorRed">Username Can Not Contain (/ . % \ @ ?)</p>';unset($_SESSION['uname']);}
                        if (isset($errors['usernametaken'])){echo '<p class="errorRed">Username Unavailable</p>';unset($_SESSION['uname']);}
                        if (isset($missingfields['uname'])){echo'<p class="errorRed">Required</p>';}
                        ?>
                        </div>
                        <input type="text"  name="uname" value="<?php 
                        if (isset($_SESSION['uname'])){echo $_SESSION['uname']; }?>" class="grey full-width" required>
                        
                     </div>
                     <div class="row2">
                     <div class="labelrow">
                        <label for="pword">Password:</label>
                        <?php 
                        if (isset($errors['invalidpassword'])){echo '<p class="errorRed">Must Be Atleast 6 Characters And Only Consist Of (a-Z . /)</p>';}
                        if (isset($missingfields['pw'])){echo'<p class="errorRed">Required</p>';}                        
                        ?>
                        </div>
                        <input type="password" name="pword"  class="grey full-width" required>  
                     </div>
                     <div class="row2">
                     <div class="labelrow">
                        <label for="repword">Re-Enter Password:</label>
                        <?php
                        if (isset($errors['pwdontmatch'])){echo '<p class="errorRed">Passwords Didnt Match</p>';}
                        if (isset($missingfields['repword'])){echo'<p class="errorRed">Required</p>';}
                        ?>
                        </div>
                        <input type="password"  name="repword" class="grey full-width" required>                                           
                                              
                     </div>
                     <div class="row2">
                     <div class="labelrow">
                        <label for="email">Email:</label>
                        <?php 
                        if (isset($errors['invalidemail'])){echo '<p class="errorRed">Invalid Email</p>';}
                        if (isset($errors['alreadymember'])){echo '<p class="errorRed">Email Already In Use</p>';}
                        if (isset($missingfields['email'])){echo'<p class="errorRed">Required</p>';}
                        ?>

                     </div>
                        <input type="email" name="email"  value="<?php if (isset($_SESSION['email'])){echo $_SESSION['email']; }?>"" class="grey full-width notcap" required>       
                     </div>
                     <div class="row2">
                     <div class="labelrow">
                        <label for="fname">First Name:</label>
                        <?php 
                        if (isset($missingfields['fname'])){echo'<p class="errorRed">Required</p>';}
                        ?>
                     </div>
                        <input type="text"  name="fname"  value="<?php if (isset($_SESSION['fname'])){echo $_SESSION['fname']; }?>"" class="grey full-width">
                        
                    </div>                    
                     <div class="row3">
                        <button type="submit" name="signupSubmit" class="blue">Submit</button>
                        <button type="reset" class="blue">Reset</button>
                        <button onclick="javascript: history.go(-1); return false;">Cancel</button>
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

<?php
if (isset($_SESSION['errors'])){
   unset($_SESSION['errors']);}
   ?>