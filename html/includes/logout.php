<?php
require'connect.inc.php'; //db connect settings
session_start();
session_unset();
session_destroy();
if ($connect_db) {
    mysqli_close($connect_db);    
}

header("Location: ../members/login.php?message=loggedout");
?>