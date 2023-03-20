<?php
include ('db.php');
    $username=$_SESSION['uname'];
    $username1=$_GET['id'];//of friend

    $sqlx="INSERT INTO `student_friend` (main_id,friend_id) VALUES ('$username','$username1')";
    $queryx=mysqli_query($con,$sqlx);//query fire
    if($queryx)
    {
        header("location: student_friend_search.php?msg=1");
    }
    else
    {
        header("location: student_friend_search.php?msg=2");
    }

?>