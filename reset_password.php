<?php
include ('db.php');
if(!isset($_SESSION['otp']))
{
    header('location: otp.php');
    die();
}
error_reporting(0);
session_start();
$emp=$_SESSION['emp'];
?>
<html>
    <head>
    <link href="login_style.css" type="text/css" rel="stylesheet"/>
  <script type="text/javascript" src="jquery.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="reset.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
	<title>Reset Password</title>
    <link rel="icon" type="image/x-icon" href="assets/favio.png">
    </head>
    <body>
    <div class="container">
	<div class="screen">
		<div class="screen__content">
            <!-- form reset password start -->
			<form class="login" method="post">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input id="p1" name="p1" type="password" class="login__input" placeholder="New Password" onkeyup='check();' required/>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input id="p2" name="p2" type="password" class="login__input" placeholder="Conform Password" onkeyup='check();' required/>
				</div>
                <span id='message'></span>
				<button name="reset" class="button login__submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>		

			</form>
            <!-- form reset password end -->
			<div class="social-login">
				<h3>Contact Us</h3>
				<div class="social-icons">
					<a href="https://www.instagram.com/i_yogeshjha/" class="social-login__icon fab fa-instagram"></a>
					<a href="https://www.facebook.com/yogesh.Anjali.jha" class="social-login__icon fab fa-facebook"></a>
					<a href="https://twitter.com/i_Yogeshjha" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>

<!-- textbox verification -->
<script>
var check = function() {
  if (document.getElementById('p1').value ==
    document.getElementById('p2').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>


    </body>
</html>
<?php
//if button pressed to resset password
if(isset($_POST['reset']))
{
    $p1=$_POST['p1'];//textbox 1 pass
    $p2=$_POST['p2'];//textbox 2 pass
    if($p1==$p2)//if password is true
    {
        ///reset password of the persion
        $res=mysqli_query($con,"UPDATE `admin_login` SET password = '$p1', otp = NULL WHERE emp_id='$emp'");		
		//message reset conform
		echo "<script>                
			swal({
				icon: 'success',
				title: 'Password reset',
				}).then(function() {
					window.location = 'login.php';
				});                        
			</script>";//got to login
			$_SESSION['otp']=false;
            unset($_SESSION['emp']);
            unset($_SESSION['otp']);
    }
    else
    {

		//message reset fail
		echo "<script>                
			swal({
				icon: 'error',
				title: 'Password Not Reset',
				}).then(function() {
					window.location = 'login.php';
				});                        
			</script>";//got to login
			$_SESSION['otp']=false;
            unset($_SESSION['emp']);
            unset($_SESSION['otp']);
    }
}
?>