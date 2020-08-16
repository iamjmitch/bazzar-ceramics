<?php
 include '../includes/session.inc';

 //quick check to make sure the user isnt already logged in
if (isset($_SESSION['logged_in'])){
    header("Location: ../members/members.php");

}

if (isset($_POST['loginSubmit'])){ //was the user sent here via the submit button on the login form

    

     //db connect settings
    require 'connect.inc.php';
   

    //setup variables
    $uname = $_POST['uname'];
    $pw = $_POST['pword'];
    $errors = array();
	$missingfields = array();
    $_SESSION['uname'] = $uname;	
    
    //clear error array if set
    if (isset($_SESSION['errors'])){
        unset($_SESSION['errors']);
        }

    //check for missing fields
    if (empty($uname) || empty($pw))
    {   //only runs below code if field is empty 
        if (empty($uname)){
            $missingfields['uname'] = true; 
        }
        if (empty($pw)){
            $missingfields['pw'] = true; 
        }
        $errors['missingfields'] = $missingfields; 
        if (count($errors) > 0){
            $_SESSION['errors'] = $errors;
            header("Location: ../members/login.php");
            connectionDie();
            exit;
    
        }
    }
        
    $sql = "SELECT * FROM member WHERE UserID=?"; //prepare statment to get password
    $statement = mysqli_stmt_init($connect_db);
        if (!mysqli_stmt_prepare($statement, $sql)){
            $errors['sql'] = true;
            $_SESSION['errors'] = $errors;
            header("Location: ../members/login.php");
            connectionDie();
            exit;
          }

        else {
            mysqli_stmt_bind_param($statement, "s", $uname); //execute statement to get password
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);
            if (mysqli_num_rows($result) < 1){
                $errors['invaliduser'] = true;
                $_SESSION['errors'] = $errors;
                header("Location: ../members/login.php");
                connectionDie();
                exit; 

            }else{
                if ($userdetails = mysqli_fetch_assoc($result)){ //returns user row
                    $hash = $userdetails['HashedPassword'];
                    $checkpw = password_verify($pw, $hash); //checks given PW with PW in DB
                    if ($checkpw == false){
                        $errors['wrongpassword'] = true;
                        $_SESSION['errors'] = $errors;
                        header("Location: ../members/login.php?");
                        connectionDie();
                        exit; 
                    }
                    else{
                        $custid = $userdetails['CustomerID'];
                        $sql = "SELECT * FROM customer WHERE CustomerID=$custid";
                        $result = mysqli_query($connect_db, $sql); //run as direct query as info is from DB and is not vulnerable to sql injection
                        $getfname = mysqli_fetch_assoc($result);
                        //assign to session data
                        $_SESSION['fname'] = $getfname['CustomerGivenName']; //grabs member 1st name
                        $_SESSION['custid'] = $userdetails['CustomerID']; //binds customerID from DB to sessions
                        $_SESSION['logged_in'] = true; //creates boolean for if user logged in. 
                        header("Location: ../includes/message.php?message=logonsuccess");
                        mysqli_stmt_close($statement);
                        connectionDie();
                        exit;
                    }
                }
            }
        }
        connectionDie();
    }

    else{
        header("Location: ../members/login.php");
    } 
?>