<?php
include("db.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql="DELETE FROM `student_msg` WHERE id='$id'";
$result=mysqli_query($con,$sql);
unset($_GET['id']);
header("location:student_contact.php");
}
?>