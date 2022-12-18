<?php
include "../include/config.php";
session_start();

$connection = OpenConnection();
$postImage =$_POST['userImage'];

//$postText=$_POST['post_txt'];
//    $postText=strip_tags(trim($_POST['post_txt']));
//$postText = htmlspecialchars($postText);

if (!empty($_FILES["userImage"]["name"])) {
    // get file info
    $fileName = basename($_FILES["userImage"]["name"]);
    $filetype = pathinfo($fileName, PATHINFO_EXTENSION);

    // allow file types
//    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
//    if(in_array($filetype, $allowTypes)){
        $image=$_FILES['userImage']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
  //  }
}
$sql = "INSERT INTO `tbl_notifications` (Notice_Text, Area_ID, Type, Image_Data) VALUES ('test', 1, 1, '$postImage') ";

if (mysqli_query($connection, $sql)) {
    echo "success";
    header("Location: alerts_page.php");
} else {
    echo mysqli_error($connection);
    return;
    header("Location: alerts_page.php");
}
mysqli_close($connection);
?>