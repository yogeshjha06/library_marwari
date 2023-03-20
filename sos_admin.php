<?php
error_reporting(0);
include ('db.php');
    $username=$_SESSION['uname'];
    $username1=$_GET['id'];//of friend

    $sqlx="INSERT INTO admin_friend (main_id,friend_id) VALUES ('$username','$username1')";
    $queryx=mysqli_query($con,$sqlx);//query fire
    if($queryx)
    {
        header("location:search_friend_admin.php?msg=1");
    }
    else
    {
        header("location:contact.php");
    }

?>