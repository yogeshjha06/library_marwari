<?php
include ('db.php');
session_start();
if(!isset($_SESSION['is_login']))
{
    header('location: login.php');
    die();
}
else
{
    $name=$_SESSION['name'];
    $username=$_SESSION['uname'];
    $email=$_SESSION['email'];  

    $id_student=$_GET['id'];
    //find email and name
    $sqlx="SELECT * FROM student_details WHERE id = '$id_student'";
    $queryx=mysqli_query($con,$sqlx);//query fire
    $rs1x = mysqli_fetch_array($queryx);

      $name_student=$rs1x['name'];//name of student
      $class_roll=$rs1x['class_roll'];//class roll of student
      $reg_id = $rs1x["reg_id"];//employee id
      $exam_id=$rs1x['exam_id'];//exam id
      $user_student=$rs1x['username'];//username of student
      $department = $rs1x["department"];//department
      $email_stu=$rs1x['email'];//email of student
      $about=$rs1x['about'];//about description
      $address=$rs1x['address'];//address of user
      $phone=$rs1x['phone'];//phone number varchar
      $twitter=$rs1x['twitter'];//twitter link
      $fb=$rs1x['fb'];//facebook link
      $linkedin=$rs1x['linkedin'];//linkedin link
      $insta=$rs1x['insta'];//instagram link
      $date=$rs1x['date'];//date of account creation
      $father=$rs1x['father'];//father name
    //find close



}
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Marwari College - Student Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/favio.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- css sweet alert  -->
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
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="search_friend_admin.php">
        <input type="text" name="query" placeholder="Search Admin.." title="Enter search keyword">
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
        <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Student Zone</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content" data-bs-parent="#sidebar-nav">
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
            <a href="./result_admin.php">
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
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="library.php">
              <i class="bi bi-circle"></i><span>Library</span>
            </a>
          </li>
          <li>
            <a href="add_book.php">
              <i class="bi bi-circle"></i><span>Add Book</span>
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
        <a class="nav-link collapsed" href="contact.php">
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
      <h1>Student Zone</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item">Student Zone</li>
          <li class="breadcrumb-item active">Student Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img  src="assets/images/stu.png" alt="Profile" class="rounded-circle">
              <h2><a href="#"><?php echo $name_student;?></a></h2>
              <h3>Marwari College - Ranchi</h3>
              <h6>Course : <?php echo $department;?></h6>
              <div class="social-links mt-2">
                <a href="<?php echo $twitter;?>" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="<?php echo $fb;?>" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo $insta;?>" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="<?php echo $linkedin;?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Update Pasword</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic"><?php echo $about;?></p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $name_student;?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Parents Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $father;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">College</div>
                    <div class="col-lg-9 col-md-8">Marwari College - Ranchi JH</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Regestration Number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $reg_id;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Examination Number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $exam_id;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Class Roll</div>
                    <div class="col-lg-9 col-md-8"><?php echo $class_roll;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8"><?php echo $user_student;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $address;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $phone;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $email_stu;?></div>
                  </div>  
                  <?php 
                      //find due/fine
                      $sqlx="SELECT * FROM due WHERE reg = '$reg_id'";
                      $queryx=mysqli_query($con,$sqlx);//query fire
                      $rs1x = mysqli_fetch_array($queryx);
                        $due=$rs1x['due'];//name of student
                        if($due>0)
                          echo  "
                          <div class='row'>
                            <div class='col-lg-3 col-md-4 label'>Due Amount</div>
                            <div class='col-lg-9 col-md-8'><code><b>".$due."</b></code></div>
                          </div>   ";
                  ?>
                  <div class="row">
                    <hr>
                      <center><div class="col-lg-9 col-md-8"><h5>Library Record</h5></div></center>
                    
                  </div> 
<?php
     //BOOK RECORD
     $sqlx="SELECT * FROM lib_record WHERE reg = '$reg_id' AND status = '0'";
     $query=mysqli_query($con,$sqlx);//query fire

        while ($row = $query->fetch_assoc()) 
        {
          echo"
          <div  class='row'>
          <div class='col-lg-3 col-md-4 label'>Book Name</div>
          <div class='col-lg-3 col-md-2'>"." ".$row['book_name']."</div>
          <div class='col-lg-3 col-md-2'>"."<b>Issue</b> ".$row['date_issue']."</div>
          <div class='col-lg-3 col-md-2'>"."<b>Return</b> ".$row['date_return']."</div>
          </div> 

          ";
        }
?> 

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post">
                    <!-- <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/profile-img.jpg" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div> -->

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $name_student;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="father" class="col-md-4 col-lg-3 col-form-label">Parent Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="father" type="text" class="form-control" id="father" value="<?php echo $father;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px"><?php echo $about;?></textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="course" class="col-md-4 col-lg-3 col-form-label">Course</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="course" type="text" class="form-control" id="course" value="<?php echo $department;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="reg" class="col-md-4 col-lg-3 col-form-label">Regestration Numner</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="reg" type="text" class="form-control" id="reg" value="<?php echo $reg_id;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="exam" class="col-md-4 col-lg-3 col-form-label">Examination Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="exam" type="text" class="form-control" id="exam" value="<?php echo $exam_id;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="class" class="col-md-4 col-lg-3 col-form-label">Class Roll Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="class" type="text" class="form-control" id="class" value="<?php echo $class_roll;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="user" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="user" type="text" class="form-control" id="user" value="<?php echo $user_student;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="address" value="<?php echo $address;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $phone;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="<?php echo $email_stu;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter" type="text" class="form-control" id="twitter" value="<?php echo $twitter;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook" type="text" class="form-control" id="facebook" value="<?php echo $fb;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram" type="text" class="form-control" id="instagram" value="<?php echo $insta;?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin" type="text" class="form-control" id="linkedin" value="<?php echo $linkedin;?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button style="border-radius: 20px;" name="update" type="submit" class="btn btn-outline-primary"> <i class="bi bi-pencil-square"></i>   Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
<?php
////////////////////////////
if(isset($_POST['update']))
{
  $res=mysqli_query($con,"UPDATE `student_details` SET name = '$_POST[fullName]', about='$_POST[about]', 
  department='$_POST[course]', address='$_POST[address]', phone='$_POST[phone]', email='$_POST[email]',
  reg_id='$_POST[reg]', exam_id='$_POST[exam]', class_roll='$_POST[class]', username='$_POST[user]',
  twitter='$_POST[twitter]',  insta='$_POST[instagram]' , fb='$_POST[facebook]', linkedin='$_POST[linkedin]',  
  father='$_POST[father]' WHERE id='$id_student'");

  if($res)
  {
		echo "<script>                
			swal({
				icon: 'success',
				title: 'Updated Successfully',
        text:'',
        }).then(function() {
        window.location= 'display_student.php?id=$id_student';
      });                        
    </script>";  
  }
  else
  {
    echo "<script>                
			swal({
				icon: 'error',
				title: 'Failed to Update',
        text:'',
				}).then(function() {
					window.location = 'display_student.php?id=$id_student';
				});                        
			</script>";
  }
}
////////////////////////////
?><form method="post">
                </div>
                <div class="tab-pane fade pt-3" id="profile-settings">                 
                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  

                    <div class="row mb-3">
                      <label for="reg" class="col-md-4 col-lg-3 col-form-label">Registration Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input id='reg' name="reg" type="text" class="form-control" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newpassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input id='newpassword' name="newpassword" type="password" class="form-control" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewpassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input id='renewpassword' name="renewpassword" type="password" class="form-control"  onkeyup='check();'>
                      </div>
                    </div>
                    <center><span id='message'></span></center> <br>
                    
                
                    <div class="text-center">
                    
                      <button style="border-radius: 20px;" id='change' name="change"  class="btn btn-outline-primary" type="submit"><i class="bi bi-key-fill"></i>  Change Password</button>
                    </div>
                  

                </div>

                </form><!-- End Change Password Form -->
<script>
var check = function() {
  if (document.getElementById('newpassword').value ==
    document.getElementById('renewpassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>

<?php
if(isset($_POST['change']))
{
  $reg=$_POST['reg'];
  $newpassword=$_POST['newpassword'];
  $renewpassword=$_POST['renewpassword'];

  if($reg_id==$reg)  
  {
    if($newpassword==$renewpassword)
    {
      $res=mysqli_query($con,"UPDATE `student_details` SET password = '$newpassword' WHERE id='$id_student'");

      if($res)
      {
        echo "<script>                
          swal({
            icon: 'success',
            title: 'Password Changed Successfully',
            text:'',
            }).then(function() {
            window.location= 'display_student.php?id=$id_student';
          });                        
        </script>";  
      }
      else
      {
        echo "<script>                
          swal({
            icon: 'error',
            title: 'Failed to Change Password',
            text:'',
            }).then(function() {
              window.location = 'display_student.php?id=$id_student';
            });                        
          </script>";
      }
    }
    else
    {
      echo "<script>                
        swal({
          icon: 'error',
          title: 'Password Not Matched',
          text:'',
          }).then(function() {
            window.location = 'display_student.php?id=$id_student';
          });                        
        </script>";
    }
  }
}
?>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Yogesh Kumar Jha</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Make In <a href="#">India</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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