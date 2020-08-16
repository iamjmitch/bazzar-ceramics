<?php
$servername = "localhost";
$username = "username";
$password = "password";
$database = "db_table";

// Create connection
$connect_db = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$connect_db) {
    die("Connection to database failed: " . mysqli_connect_error());
}




?>



