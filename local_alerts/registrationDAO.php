<?php

// get connection from config.php
include "../include/config.php";

// create new user function
if ($_POST['phpFunction']=='create') {
    create();
}
// retrieve function
else if ($_POST['phpFunction']=='retrieve') {
    retrieve();
}
// update function
else if ($_POST['phpFunction']=='update') {
    update();
}
// delete function
else if ($_POST['phpFunction']=='delete') {
    delete();
}
// verify function
else if ($_GET['phpFunction']=='verify') {
    verify();
}
// function to return the area code
function returnAreaCode($location){
    $connection=OpenConnection();
    $sql="SELECT * FROM `tbl_area` WHERE Area_Name='$location'";
    $result = mysqli_query($connection, $sql);
    $rows = mysqli_fetch_array($result);
    $areaCode = $rows["Area_ID"];
    return $areaCode;

//    $sql = "SELECT * FROM `tbl_area` WHERE Area_Name = ?";
//    $stmt = $connection->prepare($sql);
//    $stmt -> bind_param("s", $location);
//    $stmt->execute();
//    $result = $stmt->get_result();
//    $row = $result->fetch_assoc();
//    return $row["Area_ID"];
}

// insert data into db table tbl_user
function create() {
    $email= strip_tags(trim($_POST['email']));
    $password= strip_tags(trim($_POST['password']));
    $location= strip_tags(trim($_POST['userLocation']));
    $areaCode = returnAreaCode($location);
    //    $password = hash("sha256", $pass);
    $len=64;
    $verificationcode=substr(hash('sha256', openssl_random_pseudo_bytes(20)),-$len);
    // query to select from database
    $connection=OpenConnection();

    $sql="SELECT * FROM `tbl_user_account` WHERE email='$email'";
    $query = mysqli_query($connection, $sql);
    if(mysqli_num_rows($query) > 0){
        echo "This email is already registered!";
        return;
    }

    // construct query string - insert into db
    $sql2= "insert into tbl_user_account (User_Type, Password, Email, UserLevel, isVerified, Verification_Code, Location) values
		('Customer','$password','$email', 1,'1','$verificationcode', '$areaCode')";

//     connection confirmation
    if (mysqli_query($connection, $sql2)){
//        echo "Successfully registered $email ";
//        echo sendEmail($email, $verificationcode);
    } else {
        echo mysqli_error($connection);
    }

}
?>
