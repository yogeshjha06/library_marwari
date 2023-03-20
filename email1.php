
<?php

include 'db.php';
$email=$_SESSION['email'];
$username=$_SESSION['uname'];
$name=$_SESSION['user_name'];

$otp=rand(100000,999999);

$sqlx="SELECT * FROM admin_login WHERE username = '$username'";
$queryx=mysqli_query($con,$sqlx);//query fire
$rs1x = mysqli_fetch_array($queryx);
  $id = $rs1x["id"];//id
  $emp_id = $rs1x["emp_id"];//employee id

$old_password=$_POST['password'];
$new_password=$_POST['newpassword'];
$confirm_password=$_POST['renewpassword'];

$_SESSION['new']=$new_password;
$res=mysqli_query($con,"SELECT * FROM `admin_login` WHERE emp_id='$emp_id' AND password='$old_password'");
	if (mysqli_num_rows ($res) >0) 
    {
        if($new_password==$confirm_password)
        {	
            $res=mysqli_query($con,"UPDATE `admin_login` SET otp = '$otp' WHERE email='$email'");//otp generation point
            //if employee is true
            $message='Hello Mr./Mrs. , '. $name. ' your OTP for the Verification is: '. $otp." Please do not share this OTP with anyone. Thank you for using our services. Regards, Marwari College Library.";

            //////////////////////////////////////////////////////////////

                        include('smtp/PHPMailerAutoload.php');
                        $mail = new PHPMailer(); 
                        $mail->SMTPDebug=3;
                        $mail->IsSMTP(); 
                        $mail->SMTPAuth = true; 
                        $mail->SMTPSecure = 'tls'; 
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = "587"; 
                        $mail->IsHTML(true);
                        $mail->CharSet = 'UTF-8';
                        $mail->Username = "marwaricollege.lib@gmail.com";
                        $mail->Password = 'uopwytzevguqjyiq';
                        $mail->SetFrom("marwaricollege.lib@gmail.com");
                        $mail->Subject = "OTP Verification for Marwari College Library";
                        $mail->Body =$message;
                        $mail->AddAddress($email);
                        $mail->SMTPOptions=array('ssl'=>array(
                            'verify_peer'=>false,
                            'verify_peer_name'=>false,
                            'allow_self_signed'=>false
                        ));
                        if(!$mail->Send())
                        {
                            echo $mail->ErrorInfo;
                        }
                        else
                        {
                            header("location: users-profile-otp.php");
                        }
            }
            else
            {
                echo "<h1>Sorry : </h1><hr><h3>New password and confirm password does not match</h3>";
            }
}
else
{
    echo "<h1>Sorry : </h1><hr><h3>Old password is incorrect</h3>";
            
}
?>