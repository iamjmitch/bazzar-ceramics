<?php
include '../includes/session.inc';
$code = "";
$message = ""; 

//checks if user is logged on
if (!isset($_SESSION['logged_in'])){
    header("Location: ../members/login.php");
		exit();

}
//checks if "message" variable passed in uri
if (isset($_GET['message'])){

$message = $_GET['message'];

    switch ($message) {
        case "logonsuccess":
            $message = "You have successfully signed in"  ;      
            break;
        case "signupsuccess":
            $message = "You have successfully signed up"    ;    
            break;
        
            // if "message" for some reason isnt matching above, it will auto direct to members page
        default:
        header("Location: ../members/members.php");
        exit;
    }
} else{
    // if "message" variable isnt present, user will be sent to members page. members page will first check they are logged in before displaying
    header("Location: ../members/members.php");
    exit;
}


$fname = $_SESSION['fname'];

echo '
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Success</title>
      <link rel="stylesheet" href="../../css/laptop.css">
      <link rel="stylesheet" media="screen and (max-width: 800px) and (min-width:501px)" href="../../css/tablet.css">
      <link rel="stylesheet" media="screen and (max-width: 500px)" href="../../css/mobile.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">     
   </head>
<div class="messagecontainer">
    <div class="centermessage">
    <p>'.$fname.',</p>
    <p>'.$message.'</p>
    <div class="loader"></div>
    <p>You will be transferred to the members page automatically</p>
    </div>
    </div>
';

// sends user to members page after 3sec of displaying success message
header( "Refresh:3; url=../members/members.php", true, 303);








?>