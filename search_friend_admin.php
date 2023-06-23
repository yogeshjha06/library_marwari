<?php
error_reporting(0);
include ('db.php');
if(!isset($_SESSION['is_login']))
{
    header('location: login.php');
    die();
}
else
{
   ///session variable//////////////////////////////////////////////////////
    $name=$_SESSION['name'];
    $username=$_SESSION['uname'];
    $email=$_SESSION['email'];  
   ///////admin_login table///////////////////////////////////////////////// 
    $sqlx="SELECT * FROM admin_login WHERE email='$email'";
    $queryx=mysqli_query($con,$sqlx);//query fire
    $rs1x = mysqli_fetch_array($queryx);
      $id = $rs1x["id"];//id of admin
      $phone = $rs1x["phone"];//mobile of admin
      $emp_id = $rs1x["emp_id"];//emp_id
    
    $search_q=$_POST['query'];//find the search query

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Marwari College - Search Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favio.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="./search_admin.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="./index.php" class="logo d-flex align-items-center">
        <img src="assets/img/marwari.jpeg" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="search_friend_admin.php">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
    <i class="bi bi-bell"></i>
    <span class="badge bg-primary badge-number">*</span>
  </a><!-- End Notification Icon -->

  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
    <li class="dropdown-header">
      You have new notifications
      <a href="notice_all.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>
<?php

//admin list table                    
$sql="SELECT * FROM  `db_notice` ORDER BY id DESC LIMIT 4";
$result=$con->query($sql);
$no=1;
while($row=$result->fetch_assoc())
{
echo"
    <li class='notification-item'>
      <i class='bi bi-exclamation-circle text-warning'></i>
      <div>
        <h4>".$row['subject']."</h4>
        <p>".$row['date']."</p>
      </div>
    </li>

    <li>
      <hr class='dropdown-divider'>
    </li>";
}
?>
    <li class="dropdown-footer">
      <a href="notice_all.php">Show all notifications</a>
    </li>
          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">*</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have new messages
              <a href="contact.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
<?php
///message table
$sql="SELECT * FROM admin_msg WHERE reciver = '$username' ORDER BY id DESC LIMIT 1";
$query=mysqli_query($con,$sql);//query fire
$rs1 = mysqli_fetch_array($query);
  $sender = $rs1["sender"];//sender name
  $msg = $rs1["message"];//message
  $date11 = $rs1["date"];//date
?>

            <li class="message-item">
              <a href="contact.php">
                <img src="./assets/images/profile.png" alt="" class="rounded-circle">
                <div>
                  <h4><?php echo$sender;?></h4>
                  <p><?php echo$msg;?></p>
                  <p><?php echo$date11;?></p>
                </div>
              </a>
            </li>



            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="contact.php">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/images/profile.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $name;?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><a href="#"><?php echo $name;?> <i class="bi bi-patch-check-fill"></i></a></h6>
              <span>Marwari College</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="faq.php">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="login_Backend.php?logout=1">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Student Zone</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_student.php">
              <i class="bi bi-circle"></i><span>Add Student</span>
            </a>
          </li>

          <li>
            <a href="remove_student.php">
              <i class="bi bi-circle"></i><span>Remove Student</span>
            </a>
          </li>


          <li>
            <a href="list_student.php">
              <i class="bi bi-circle"></i><span>List Student</span>
            </a>
          </li>
          <li>
            <a href="result_admin.php">
              <i class="bi bi-circle"></i><span>Results</span>
            </a>
          </li>
          <li>
            <a href="stu_lib.php">
              <i class="bi bi-circle"></i><span>Library Records</span>
            </a>
          </li>
          <li>
            <a href="attaindence.php">
              <i class="bi bi-circle"></i><span>Ataindence</span>
            </a>
          </li>
          <li>
            <a href="community.php">
              <i class="bi bi-circle"></i><span>Community</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Athenaeum</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse "  data-bs-parent="#sidebar-nav">
          <li>
            <a href="library.php">
              <i class="bi bi-circle"></i><span>Library</span>
            </a>
          </li>
          <li>
            <a href="add_book.php">
              <i class="bi bi-circle"></i><span >Add Book</span>
            </a>
          </li>
          <li>
            <a href="book_issue.php">
              <i class="bi bi-circle"></i><span>Issue Book</span>
            </a>
          </li>
          <li>
            <a href="return_book.php">
              <i class="bi bi-circle"></i><span>Return Book</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      

      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Member Panel</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add_admin.php">
              <i class="bi bi-circle"></i><span>Add New Admin</span>
            </a>
          </li>
          <li>
            <a href="remove-admin.php">
              <i class="bi bi-circle"></i><span>Remove Admin</span>
            </a>
          </li>
          <li>
            <a href="list_admin.php">
              <i class="bi bi-circle"></i><span>List Admin</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="faq.php">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link" href="contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="notice.php">
          <i class="bi bi-card-list"></i>
          <span>Notice</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="login_Backend.php?logout=1">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Log Out</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Search Admin Friend</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item">Search Admin Friend</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->










    <!-- bo9dy start -->

    <div class='container'>
    <div class='row'>
        <div class='col-md-8'>
            <div class='people-nearby'>
              
<?php

if(isset($_POST['query']))
{
    $sql="SELECT * FROM  `admin_login` WHERE `name` ='$search_q' or `username` ='$search_q' or `department` ='$search_q'";
    $row = mysqli_fetch_array($queryx);
    if($row['username'] != $username)
    {
    $sql="SELECT * FROM  `admin_login` WHERE `name` ='$search_q' or `username` ='$search_q' or `department` ='$search_q'";
    $queryx=mysqli_query($con,$sql);//query fire
    $row = mysqli_fetch_array($queryx);
    if($row['name'] == $search_q||$row['username'] == $search_q||$row['department'] == $search_q)
    {

        echo"
  
                    <div class='nearby-user' style='border-radius: 50px 50px 50px 50px;'>
                        <div class='row'>
                        <div class='col-md-2 col-sm-2'>
                            <img src='./assets/images/profile.png' style='border-width: 3px;border-style: solid; border-color: #0000ff;' alt='user' class='profile-photo-lg'>
                        </div>
                        <div class='col-md-6 col-sm-7'>
                            <h5><a href='#' class='profile-link'>".$row['name']." &nbsp <i class='bi bi-patch-check-fill'></i></a></h5>
                            <p><b>Username &nbsp</b>".$row['username']."</p>
                            <p class='text-muted'><code>Department &nbsp</code>".$row['department']."</p>
                        </div>
                        <div class='col-md-3 col-sm-3'>
                            <button type='submit' style='border-radius: 19px;' class='btn btn-outline-primary'><i class='bi bi-person-add'></i><a href='sos_admin.php?id=$row[username]'>  Add </a></button>
                        </div>
                        </div>
                    </div>
             ";     
    } 
    else
    {
        echo"
                    <div class='nearby-user' style='border-radius: 50px 50px 50px 50px;'>
                        <div class='row'>
                        <div class='col-md-2 col-sm-2'>
                            <img src='./assets/images/error.jpg' alt='user' class='profile-photo-lg'>
                        </div>
                        <div class='col-md-6 col-sm-7'>
                            <h5>No Result Found</h5>
                            <p>Please try again...</p>
                            <p class='text-muted'></p>
                        </div>
                        <div class='col-md-3 col-sm-3'>
                            
                        </div>
                        </div>
                    </div>";   
    } 
}     

} 
if($_GET['msg']==1)
{
    echo"
                        <script>                
                            swal({
                                icon: 'success',
                                title: 'Added!',
                                text: 'Now You Both Are Friends!',
                                }).then(function() {
                                    window.location = 'contact.php';
                                });                        
                        </script>";
}     
if($_GET['msg']==2)
{
    echo"
                        <script>                
                            swal({
                                icon: 'info',
                                title: 'Sorry!',
                                text: 'can't add friend!',
                                }).then(function() {
                                    window.location = 'contact.php';
                                });                        
                        </script>";
}       
?>

            </div>
    	</div>
	</div>
</div>
<!--  -->
    <!-- body  end -->










    </section>

  </main><!-- End #main -->

 <!-- ======= Footer ======= -->
 <footer id='footer' class='footer'>
    <div class='copyright'>
      &copy; Copyright <strong><span>Yogesh Kumar Jha</span></strong>. All Rights Reserved
    </div>
    <div class='credits'>
      Make In <a href='#'>India</a>
    </div>
  </footer><!-- End Footer -->

  <a href='#' class='back-to-top d-flex align-items-center justify-content-center'><i class='bi bi-arrow-up-short'></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>