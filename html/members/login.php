<?php include '../includes/session.inc'; 
if (isset($_SESSION['errors'])){
   $errors = $_SESSION['errors'];}
    //quick check to make sure the user isnt already logged in
if (isset($_SESSION['logged_in'])){
   header("Location: ../members/members.php");
}

if (isset($errors['missingfields'])){
$missingfields = $errors['missingfields'];}




?>





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
      <?php include '../includes/feature_banner.inc'; ?>
      <div id="breadcrumbs" class="PageContainer">
         <a href="../../index.php">Home</a>
         <p>></p>
         <a href="login.php">Login</a>
      </div>
      <div class="PageContainer tac addFortyTop addFortyBottom">
         <div id="contentContainer" class="">
            <h1>Members Login</h1>
            <?php
            if (isset($_GET['message'])){
               echo '         
                     <div id="successlogout">
                     <p>You have been successfully signed out</p>
                     </div>'
                     ;
            }
            ?>
            
            <div id="signupFormContainer">
            <?php 
            if (isset($errors['sqlerror'])){
               echo '
            <div class="sqlerror">
            <p>Error Connecting to Database. If problem persists, please email our tech depatment</p>
            </div>';}
            ?>
              <div class="formContent white">
              <div id="formleftlog">
                     <div class="black">
                        <div class="formleftbox">
                           <h5>Not a Member?</h5>
                           <a href="../members/signup.php">
                              <button>Signup</button></a>
                        </div>
                        
                     </div>
                  </div>
                  <form action="../includes/newlogin.inc.php" method="post">
                  <div class="row2">
                        <div class="labelrow">
                        <label for="uname">Username:</label>
                        <?php 
                        if (isset($errors['invaliduser'])){echo '<p class="errorRed">Username Not Found</p>';}                        
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
                        if (isset($errors['wrongpassword'])){echo '<p class="errorRed">Wrong Password</p>';}
                        if (isset($missingfields['pw'])){echo'<p class="errorRed">Required</p>';}                        
                        ?>
                        </div>
                        <input type="password" name="pword"  class="grey full-width" required>  
                     </div>
                     <div class="row3">
                        <button type="submit" name="loginSubmit" class="blue">Submit</button>
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
   <script>
function goBack() {
  window.history.back();
}
</script>
</body>

</html>

<?php
if (isset($_SESSION['errors'])){
   unset($_SESSION['errors']);}
   ?>




