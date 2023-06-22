<?php
session_start();
$emp_id=$_SESSION['emp'];
$otp=$_SESSION['otp'];
include 'db.php';
//find email and name
$sqlx="SELECT * FROM `student_details` WHERE reg_id = '$emp_id'";
$queryx=mysqli_query($con,$sqlx);//query fire
$rs1x = mysqli_fetch_array($queryx);
    $id = $rs1x["id"];//id
    $mail_to=$rs1x['email'];//email to
    $name_to=$rs1x['name'];//name of reciver

$message='Hello student, '. $name_to. ' your OTP for the Verification is: '. $otp.' Marwari College Library';

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
			$mail->Subject = "Student OTP Verification";
			$mail->Body =$message;
			$mail->AddAddress($mail_to);
			$mail->SMTPOptions=array('ssl'=>array(
				'verify_peer'=>false,
				'verify_peer_name'=>false,
				'allow_self_signed'=>false
			));
			if(!$mail->Send())
			{
				echo $mail->ErrorInfo;//failed to send mail
			}
			else
			{
                header("location: student_otp1.php");//otp send successfully
            }
?>