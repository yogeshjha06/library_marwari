<?php
include 'db.php';
$emp_id=$_SESSION['emp'];
$user=$_SESSION['user'];
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
                <label for="chk" aria-hidden="true">Verify OTP</label>
					<input type="password" name="otp" placeholder="OTP" required="" onkeypress="return onlyNumberKey(event)" />
					<button type="submit" name="verify">Submmit</button>
				</form>
			</div>

			<div class="login">
				<form method="post">
                <label for="chk" aria-hidden="true">Contact Us</label>
				<button type="button" onclick="window.location.href = 'login.php';">Back Home</button>
				</form>
			</div>
	</div>
    <script>
        function onlyNumberKey(evt) {
              
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>
</body>
</html>
<?php

//verify otp
if(isset($_POST['verify']))
{
	$verify_otp=$_POST['otp'];//otp verification point
	$res=mysqli_query($con,"SELECT * FROM `student_details` WHERE reg_id='$emp_id' AND otp='$verify_otp'");//verification of input otp to real otp
	//if otp is true
    if (mysqli_num_rows ($res) >0) 
    {
		//if employee & otp is true		
        session_start()	;
		$_SESSION['otp']=true;// session name

		/////////////////////////////////////////////   
		//message
		echo "<script>                
			swal({
				icon: 'success',
				title: 'OTP verified, set new password',
				}).then(function() {
					window.location = 'stu_reset_password.php';
				});                        
			</script>";

			//reset pasword page			
	}
	else
	{
		//if employee or otp is false
        $res=mysqli_query($con,"UPDATE `student_details` SET otp = NULL WHERE reg_id='$emp_id'");
		echo "<script>                
			swal({
				icon: 'error',
				title: 'Suspicious attempt',
				text: 'Invalide OTP, please try again',
				}).then(function() {
					window.location = 'stu_login.php';
				});                        
			</script>";

	}
}
?>