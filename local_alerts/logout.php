<?php
// variable assigned for user email
session_start();
unset($_SESSION["email"]); // unset the session
unset($_SESSION["userType"]); // unset the session
header("Location:alerts_page.php"); // redirect to login page
?>