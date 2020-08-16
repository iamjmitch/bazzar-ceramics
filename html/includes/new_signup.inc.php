<?php
session_start();

if (isset($_POST['signupSubmit']))
{

    require'connect.inc.php';

    $uname = $_SESSION['userID'];
    $fname = $_SESSION['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_SESSION['email'];
    $address = $_POST['address'];
    $suburb = $_POST['suburb'];
    $state = $_POST['state'];
    $post = $_POST['postcode'];
    $country = $_POST['country'];
    $hashed_pass = $_SESSION['HP'];
    $statement = mysqli_stmt_init($connect_db);
	$errors = array();
    $missingfields = array();
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['phone'] = $phone;
    $_SESSION['address'] = $address;
    $_SESSION['suburb'] = $suburb;
    $_SESSION['state'] = $state;
    $_SESSION['postcode'] = $post;
    $_SESSION['country'] = $country;

	if (isset($_SESSION['errors'])){
	unset($_SESSION['errors']);
	}

    
    if (empty($fname) || empty($lname) || empty($phone) || empty($address) || empty($suburb) || empty($state) || empty($post) || empty($country))
	{ //check for missing fields
		if (empty($fname)){
			$missingfields['fname'] = true; 
		}
		if (empty($lname)){
			$missingfields['lname'] = true; 
		}
		if (empty($phone)){
			$missingfields['phone'] = true; 
		}
		if (empty($address)){
			$missingfields['address'] = true; 
		}
		if (empty($suburb)){
			$missingfields['suburb'] = true; 
        }
        if (empty($state)){
			$missingfields['state'] = true; 
        }
        if (empty($post)){
			$missingfields['post'] = true; 
        }
        if (empty($country)){
			$missingfields['country'] = true; 
		}
		$errors['missingfields'] = $missingfields; 
	}

    if (!preg_match("/^[0-9]*$/", $phone))
    { 	
        $errors['invalidphone'] = true; 	
    }


    if (count($errors) > 0){
        $_SESSION['errors'] = $errors;
        header("Location: ../members/new_customer.php");
        // connectionDie();
        exit();

    }

    else
    {   $sql = "SELECT * FROM customer WHERE CustomerEmail =?";
        $statement = mysqli_stmt_init($connect_db);
        if (!mysqli_stmt_prepare($statement, $sql))
        {
            $errors['sqlerror'] = true;
            $_SESSION['errors'] = $errors;
            header("Location: ../members/new_customer.php");
            // connectionDie();
            exit;
        }

        else
        {            
        $sql = "INSERT INTO customer (CustomerGivenName, CustomerLastName, CustomerEmail, CustomerAddress, CustomerSuburb, CustomerState, CustomerPostCode, CustomerCountry, CustomerPhoneNumber, CustomerAccountFlag) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = mysqli_stmt_init($connect_db);
        if (!mysqli_stmt_prepare($statement, $sql)) {
            $errors['sqlerror'] = true;
            $_SESSION['errors'] = $errors;
            header("Location: ../members/new_customer.php");
            // connectionDie();
            exit;
        }
        else
        {
            $zero = false;
            mysqli_stmt_bind_param($statement, "sssssssssi", $fname, $lname, $email, $address, $suburb, $state, $post, $country, $phone, $zero);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);
            $customerId = mysqli_insert_id($connect_db);
            $sql2 = "INSERT INTO member (CustomerID, UserID, HashedPassword) VALUES (?, ?, ?)";
            if (!mysqli_stmt_prepare($statement, $sql2))
            {
                $errors['sqlerror'] = true;
                $_SESSION['errors'] = $errors;
                connectionDie();
                header("Location: ../members/new_customer.php");
                
                exit;
            }
            else
            {
                mysqli_stmt_bind_param($statement, "iss", $customerId, $uname, $hashed_pass);
                mysqli_stmt_execute($statement);
                mysqli_stmt_store_result($statement);
                session_destroy();//clear out all previously saved session variables
                session_start();
                $_SESSION['custid'] = $customerId;
                $_SESSION['fname'] = $fname;
                $_SESSION['logged_in'] = true;
                header("Location: ../includes/message.php?message=signupsuccess");
                exit();


            }
        }
    }

mysqli_stmt_close($statement);
connectionDie();
header("Location: ../members/members.php");


exit();
}
}

else
{
header("Location: ../members/signup.php");
exit();

}