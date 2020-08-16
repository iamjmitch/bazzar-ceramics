<?php
if (isset($_POST['signupSubmit']))
{

    require 'connect.inc.php';

    $uname = $_POST['uname'];
    $pw = $_POST['pword'];
    $email = $_POST['email'];
    $repword = $_POST['repword'];
    $fname = $_POST['fname'];
    $dbfname = "";
    $custid = "";
    $hashed_pass = "";
    $db = new database;
    $connect_db = $db->connect;


    if (empty($fname) || empty($email) || empty($uname) || empty($pw) || empty($repword))
    { //check for missing fields
        header("Location: ../members/existing_customers.php?error=missingfields");
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    { //check for valid email
        header("Location: ../members/existing_customers.php?error=invalidemail");
        exit();
    }

    else if (preg_match('/[%@?\.]/', $uname))
    { //check for valid userID (userID cannot contain "/.%\@?" )
        header("Location: ../members/existing_customers.php?error=invalidusername");
        exit();

    }

    else if ($pw !== $repword)
    { //checks if passwords match
        header("Location: ../members/existing_customers.php?error=passwordmismatch");
        exit();

    }

    else if ((strlen($pw) < 6) || (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pw)))
    { //checks if password has 6 or more chars or contains special chars
        header("Location: ../members/existing_customers.php?error=invalidpassword");
        exit();
    }

    else
    {
        //checks if username is currently avaialable
        $sql = "SELECT UserID FROM member WHERE UserID =?";
        $statement = mysqli_stmt_init($connect_db);
        if (!mysqli_stmt_prepare($statement, $sql))
        {
            header("Location: ../members/signup.php?error=sqlerror");
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
                header("Location: ../members/existing_customers.php?error=usertaken");
                exit();
            }
            else
            {
                //checks to make sure the customer is not already registered in members table
                $sql = "SELECT * FROM customer WHERE CustomerEmail=?";
                $statement = mysqli_stmt_init($connect_db);
                if (!mysqli_stmt_prepare($statement, $sql))
                {
                    header("Location: ../members/existing_customers.php?error=sqlerror");
                    exit();
                }
                else{  
                    mysqli_stmt_bind_param($statement, "s", $email);
                    mysqli_stmt_execute($statement);
                    $result = mysqli_stmt_get_result($statement);
                    //pull user data from customer table and assign to $userdetails
                    if ($userdetails = mysqli_fetch_assoc($result))
                        {
                        $dbfname = $userdetails['CustomerGivenName'];
                        $custid = $userdetails['CustomerID'];
                        $sqlq = "SELECT CustomerID FROM member WHERE CustomerID=$custid";
                        $userexistsquery = mysqli_query($connect_db, $sqlq); //run as direct query as info is from DB and is not vulnerable to sql injection
                        if (mysqli_num_rows($userexistsquery) > 0)
                        {
                            header("Location: ../members/existing_customers.php?error=alreadyamember");
                            exit();
                        }
                        else
                        {

                            if (strtolower($dbfname) == strtolower($fname))
                            { //account check to match inputted name with name on file (minor security measure)
                                $options = ['cost' => 10, ];
                                $hashed_pass = password_hash("$pw", PASSWORD_BCRYPT, $options);
                                $sql2 = "INSERT INTO member (CustomerID, UserID, HashedPassword) VALUES (?, ?, ?)";

                                if (!mysqli_stmt_prepare($statement, $sql2))
                                {
                                    header("Location: ../members/existing_customers.php?error=sqlerror1");
                                    exit();
                                }

                                else
                                {
                                    //code to insert into members table
                                    mysqli_stmt_bind_param($statement, "iss", $custid, $uname, $hashed_pass);
                                    mysqli_stmt_execute($statement);
                                    mysqli_stmt_store_result($statement);
                                    session_start();
                                    echo "got past name matching";
                                    session_start();
                                    $_SESSION['custid'] = $customerId;
                                    $_SESSION['fname'] = $fname;
                                    $_SESSION['logged_in'] = true;
                                    header("Location: ../members/members.php");
                                    exit;

                                }

                            }
                            else
                            {
                                header("Location: ../members/existing_customers.php?error=incorrectuserdetails");
                                exit;
                            }
                        }
                    }
                }
            }
        }
        mysqli_stmt_close($statement);
        mysqli_close($connect_db);
        exit();
    }
}
else
{
    header("Location: ../members/existing_customers.php?error=incorrectuserdetails");
    exit;
}
?>
