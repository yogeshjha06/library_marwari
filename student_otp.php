<?php
error_reporting(0);

include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="otp_style.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
	<title>Forget Password</title>
    <link rel="icon" type="image/x-icon" href="assets/favio.png">
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post">
					<label for="chk" aria-hidden="true">Credentials</label>
					<input type="text" name="emp_id" placeholder="Regestration ID" required=""/>
					<input type="text" name="username" placeholder="Username" required=""/>
                    
					<button type="submit" name="send">Send OTP</button>
				</form>
			</div>

			<div class="login">
				<form method="post">
					<label for="chk" aria-hidden="true">Contact Us</label>
					<button type="button" onclick="window.location.href = 'login.php';">Back Home</button>
				</form>
			</div>
	</div>

</body>
</html>
<?php

///////////////////////////////////////
$emp_id=$_POST['emp_id'];///employee id
$username=$_POST['username'];//username

$_SESSION['emp']=$emp_id;
$_SESSION['user']=$username;
$_SESSION['button']=1;
//otp send to email and database
if(isset($_POST['send']))
{
	$res=mysqli_query($con,"SELECT * FROM `student_details` WHERE reg_id='$emp_id' AND username='$username'");
	if (mysqli_num_rows ($res) >0) 
    {	
		//if employee is true	
		$otp= rand(1000000,9999999);//randam otp generated
		$_SESSION['otp']=$otp;
		$res1=mysqli_query($con,"UPDATE `student_details` SET otp = '$otp' WHERE reg_id = '$emp_id'");//otp send to database & email 
		
		
				echo "<script>                
				swal({
					icon: 'success',
					title: 'OTP Sent',
					}).then(function() {
						window.location = 'email_stu.php';
					});                        
				</script>";

	}
	else
	{
		//if employee is false
		echo "<script>                
			swal({
				icon: 'error',
				title: 'suspicious attempt to sign in',
				}).then(function() {
					window.location = 'stu_login.php';
				});                        
			</script>";

	}
}
?>
