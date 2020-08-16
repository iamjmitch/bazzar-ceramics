<?php


if (isset($_POST['signupSubmit'])){
	include '../includes/session.inc';
	require'connect.inc.php';
	$uname = $_POST['uname'];
	$pw = $_POST['pword'];
	$email = $_POST['email'];
	$repword = $_POST['repword'];
	$fname = $_POST['fname'];
	$dbfname = "";
	$custid = "";
	$hashed_pass = "";
	$statement = mysqli_stmt_init($connect_db);
	$errors = array();
	$missingfields = array();
	$_SESSION['fname'] = $fname;
	$_SESSION['uname'] = $uname;
	$_SESSION['email'] = $email;


	if (isset($_SESSION['errors'])){
	unset($_SESSION['errors']);
	}

	if (empty($fname) || empty($email) || empty($uname) || empty($pw) || empty($repword))
	{ //check for missing fields
		if (empty($fname)){
			$missingfields['fname'] = true; 
		}
		if (empty($email)){
			$missingfields['email'] = true; 
		}
		if (empty($uname)){
			$missingfields['uname'] = true; 
		}
		if (empty($pw)){
			$missingfields['pw'] = true; 
		}
		if (empty($repword)){
			$missingfields['repword'] = true; 
		}
		$errors['missingfields'] = $missingfields; 
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{ //check for valid email
		if (!empty($email)){
		$errors['invalidemail'] = true; 
		}
	}

	if (preg_match('/[%@?\/.\\\\]/', $uname))
	{ //check for valid userID (userID cannot contain "/.%\@?" )
		if (!empty($uname)){
		$errors['invalidusername'] = true; 
		}

	}

	if ($pw !== $repword && (!empty($pw)) && (!empty($repword)) )
	{ //checks if passwords match
		$errors['pwdontmatch'] = true; 
	}

	if ((strlen($pw) < 6) || (preg_match('/[\'~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\?\\\]/', $pw)))
	{ //checks if password has 6 or more chars or contains special chars other than . or /
		
		$errors['invalidpassword'] = true;
		

	}

	//checks if username is currently avaialable
	$sql = "SELECT UserID FROM member WHERE UserID =?";
	if (!mysqli_stmt_prepare($statement, $sql))
	{
		header("Location: ../members/signup.php?error=1");
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($statement, "s", $uname);
		mysqli_stmt_execute($statement);
		mysqli_stmt_store_result($statement);
		$checkResult = mysqli_stmt_num_rows($statement);
		if ($checkResult > 0)
		{
			$errors['usernametaken'] = true; 
		}
	}

	//checks to make sure the customer is not already registered in members table
	$sql = "SELECT * FROM customer WHERE CustomerEmail=?";
	if (!mysqli_stmt_prepare($statement, $sql))
	{
		header("Location: ../members/signup.php?error=1");
		exit();
	}
	else
	{
		mysqli_stmt_bind_param($statement, "s", $email);
		mysqli_stmt_execute($statement);
		$result = mysqli_stmt_get_result($statement);
		//pull user data from customer table and assign to $userdetails
		$userdetails = mysqli_fetch_assoc($result);		
		$custid = $userdetails['CustomerID'];
		$dbfname = $userdetails['CustomerGivenName'];
		$options = ['cost' => 10, ];
		$hashed_pass = password_hash("$pw", PASSWORD_BCRYPT, $options);
		
	}

	$sql = "SELECT CustomerID FROM member WHERE CustomerID=$custid";
	$userexistsquery = mysqli_query($connect_db, $sql); //run as direct query as info is from DB and is not vulnerable to sql injection
	if (mysqli_num_rows($userexistsquery) > 0)
	{
	$errors['alreadymember'] = true; 
	}
	

	if (count($errors) > 0){
		$_SESSION['errors'] = $errors;
		if ($connect_db) {
			mysqli_close($connect_db); 
		
		}	
		header("Location: ../members/signup.php");

	}
	elseif (empty($custid)){		
		    	//sets already entered inputs into session data to pass to new customer page
				$_SESSION['email'] = $email;
				$_SESSION['fname'] = $fname;
				$_SESSION['HP'] = $hashed_pass;
				$_SESSION['userID'] = $uname;                            
				$_SESSION['signupcheck'] = true;
				header("Location: ../members/new_customer.php");
		}
	
	else{

		$sqlinsert = "INSERT INTO member (CustomerID, UserID, HashedPassword) VALUES (?, ?, ?)";
		if (!mysqli_stmt_prepare($statement, $sqlinsert))
		{
			$errors['sqlerror'] = true;
			$_SESSION['errors'] = $errors;
			header("Location: ../members/signup.php?error=1");
		exit();
		}
		else
		{
			mysqli_stmt_bind_param($statement, "iss", $custid, $uname, $hashed_pass);
			mysqli_stmt_execute($statement);
			mysqli_stmt_store_result($statement);
			session_start();
			$_SESSION['custid'] = $customerId;
			$_SESSION['fname'] = $fname;
			$_SESSION['logged_in'] = true;
			header("Location: ../includes/message.php?message=signupsuccess");
			mysqli_stmt_close($statement);
			if ($connect_db) {
				mysqli_close($connect_db);    
			
			}
			exit();
			

		}

	}
	mysqli_stmt_close($statement);
if ($connect_db) {
    mysqli_close($connect_db);    

}
}	
else
{
	header("Location: ../members/signup.php");
	exit();
}

