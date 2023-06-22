<html>
    <head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <style>
        body
        {
            background-color: #F8F8FF;
        }
    </style>
    <title>Admin</title>
    <link rel="icon" type="image/x-icon" href="assets/favio.png">
    </head>
  <body >
  </body>
  </html>
<?php 
include 'db.php';
//logout button action
$logout=$_GET['logout'];
if($logout==1)
{    
    unset($_SESSION['is_login']);
    header('location: login.php');
    die();
}
//login data validation
if(isset($_POST['login']))
{   
    if(isset($_SESSION['is_login']))
    {
        header('location: index.php');
    }

    $username=$_POST['uname'];
    $pass=$_POST['pass'];

    $res=mysqli_query($con,"SELECT * FROM `admin_login` WHERE username='$username' AND status='0'");
    if (mysqli_num_rows ($res) >0) 
    {
        $res1=mysqli_query($con,"SELECT * FROM `admin_login` WHERE username='$username' AND password='$pass'");
        if(mysqli_num_rows ($res1) >0)
        {
            while($row = mysqli_fetch_array($res))
            {            
                    //verified user
                    $_SESSION['is_login']=true;
                    $_SESSION['name']=$row['name'];
                    $_SESSION['uname']=$row['username'];
                    $_SESSION['email']=$row['email'];
                    header('location: index.php');      
            } 
        }  
        else
        {
        echo "<script>                
            swal({
                icon: 'error',
                title: 'OOPS! ',
                text: 'Please enter correct password',
                type: 'ERROR'
                }).then(function() {
                    window.location = 'login.php';
                });                        
            </script>";
        }              
    }
    else
    {
    echo "<script>                
        swal({
            icon: 'error',
            title: 'OOPS! ',
            text: 'Please enter correct username',
            type: 'ERROR'
            }).then(function() {
                window.location = 'login.php';
            });                        
        </script>";
    }
}   

//find my username
if(isset($_POST['signup']))
{
    if(isset($_SESSION['is_login']))
    {
        header('location:home.php');
        die();
    }
    $empid=$_POST['emp_id'];
    $email=$_POST['email'];
    //find employee
    if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM `admin_login` WHERE emp_id='$empid'"))>0)
    {
        //verify employee id with employee email
        $res1=mysqli_query($con,"SELECT * FROM `admin_login` WHERE emp_id='$empid' AND email='$email'");
        if(mysqli_num_rows ($res1) >0)
        { 
            //finding user name of client
            while($row = mysqli_fetch_array($res1))
            {            
                    $user=$row['username'];
                    $name=$row['name'];      
            } 
            //echo user name
            echo"<script>
                swal({
                icon: 'success',
                title: 'Found You!',
                text: 'HI, $name your username is $user',
                type: 'SUCCESS'
                }).then(function() {
                    window.location = 'login.php';
                });
                
                </script>";
            //empty array
            $_POST = array();
        }
        else
        {
            //employee id is true but email is false
            echo"<script>
                
                swal({
                icon: 'info',
                title: 'Sorry!',
                text: 'Your Email is not correct. please try again.',
                type: 'SUCCESS'
                }).then(function() {
                    window.location = 'login.php';
                });
                
                </script>";
        }
    }
    else
    {
        //employee id is false
        echo"<script>
            
            swal({
            icon: 'error',
            title: 'Invalid Employee Id',
            text: 'We, are unable to find you, please try again or contact us.',
            type: 'ERROR'
            }).then(function() {
                window.location = 'login.php';
            });
            
            </script>";
    }
}
?>