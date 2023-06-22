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

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Marwari College - Contact</title>
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
  <link href="./chatt.css" rel="stylesheet">

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
        <input type="text" name="query" placeholder="Search Admin.." title="Enter search keyword" required/>
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
      <h1>Library</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
          <li class="breadcrumb-item">Athenaeum</li>
          <li class="breadcrumb-item active">Library</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->










    <!-- bo9dy start -->

    <section class="section">
      <div class="row">
        <div class="col-lg-4">

          

          <div class="card">
            <div class="card-body">
              <center>            
                <br>
             <!-- Multi search friend Form -->
             <form method="post">   
            <!--  -->
            <div class="input-group">
                
                <div class="form-outline">
                <input name="find" style="border-top-left-radius: 20px; 
                                          border-bottom-left-radius: 20px; 
                                          border-top-right-radius: 0px; 
                                          border-bottom-right-radius: 0px;" 
                                          class="form-control" type="search" 
                                          placeholder="Find People.." id="example-search-input4">                   
                </div>
                <button style="border-top-right-radius: 20px; 
                border-bottom-right-radius: 20px; 
                border-top-left-radius: 0px; 
                border-bottom-left-radius: 0px;" name="ok" type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
                </div>
<hr>
              </form><!-- End Multi Columns Form -->
              
              </center>
<?php

              if(isset($_POST['ok']))
              {
                //post data
                $find=$_POST['find'];                                
                $res1=mysqli_query($con,"SELECT * FROM `admin_login` WHERE name='$find' OR emp_id='$find' OR username='$find'");//query
                $ress = mysqli_fetch_array($res1);
                if($ress)
                {
                  echo"   
                  <div style='border-radius: 30px;background: #F0F8FF;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>
                      <img src='./assets/images/profile.png' class='img-fluid rounded-circle' style='width: 60px; height: 60px;'>
                         <a href=''> <b>".$ress['username']."</b> <i class='bi bi-patch-check-fill'></i></a>   
                         </div><br> 
                  ";
                } 
                else
                {
                  $res1=mysqli_query($con,"SELECT * FROM `admin_friend` WHERE main_id='$username'");//query
                  while($row=$res1->fetch_assoc())
                    {
                      echo"   
                      <div style='border-radius: 30px;background: #F0F8FF;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);'>
                      <img src='./assets/images/profile.png' class='img-fluid rounded-circle' style='width: 60px; height: 60px;'>
                         <a href=''> <b>".$ress['username']."</b> <i class='bi bi-patch-check-fill'></i></a>   
                         </div><br>              
                      ";
                    }
                }             
              }  
              $res1=mysqli_query($con,"SELECT * FROM `admin_friend` WHERE main_id='$username'");//query
                  while($row=$res1->fetch_assoc())
                    {
                      echo" 
                      <div style='border-radius: 30px;background: #F0F8FF;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.10);'>
                      <img src='./assets/images/profile.png' class='img-fluid rounded-circle' style='width: 60px; height: 60px;'>
                         <a href=''> <b>".$row['friend_id']."</b> <i class='bi bi-patch-check-fill'></i></a>   
                         </div><br> 

                      ";
                    }          
?>
            </div>
          </div>
        </div>


        <div class="col-md-8">

          <div class="card">
            <div class="card-body">
              <br>

              <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Mail</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Inbox</button>
                </li>    
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <!-- send message -->
                  <form method="POST">
                  <br>
                  <input style="width: 250px; border-radius: 25px;" type="text" name="username" class="form-control" placeholder="Username Of Recipient " required/>
                  <br>
                  <textarea style="height: 200px; border-radius: 25px;" rows="4" type='text' cols="50" name="message" class="form-control" placeholder="Type your message here.." required></textarea><br>
                  <button style="border-radius: 25px;" type="submit" name="send" class="btn btn-outline-primary"><i class="bi bi-send-check"></i>  Send Message</button>
                  </form>
                  <!--  -->
                  <?php
                  if(isset($_POST['send']))
                  {
                    $reciver=$_POST['username'];
                    $message=$_POST['message'];
                    date_default_timezone_set('Asia/Kolkata');
                    $date=date("Y-m-d");

                    $res1=mysqli_query($con,"INSERT INTO `admin_msg` (sender, reciver, message, date) VALUES ('$username','$reciver','$message','$date')");//query
                    if($res1)
                    {
                      echo"
                      <script>                
                          swal({
                              icon: 'success',
                              title: 'Message Sent!',
                              }).then(function() {
                                  window.location = 'contact.php';
                              });                        
                      </script>";
                    }
                    else
                    {
                      echo"
                      <script>                
                          swal({
                              icon: 'error',
                              title: 'Message Not Sent!',
                              }).then(function() {
                                  window.location = 'contact.php';
                              });                        
                      </script>";
                    }
                   }
                  ?>
                </div>
                <div style="min-height: 500px; overflow: hidden;" class='tab-pane fade' id='profile' role='tabpanel' aria-labelledby='profile-tab'>

                <!-- strat inbox -->

                <?php
                $sql="SELECT * FROM `admin_msg` WHERE reciver='$username' ORDER BY id DESC";
                $result=$con->query($sql);
                $n=1;
                while($row=$result->fetch_assoc())
                {
                echo"
                      <div class='chat-message-left pb-2'>
                        <div>
                          <img src='https://bootdey.com/img/Content/avatar/avatar3.png' class='rounded-circle mr-1' alt='MSG' width='40' height='40'>
                        <div class='text-muted small text-nowrap mt-2'><a href=''><b>".$row['sender']."</b><i class='bi bi-patch-check-fill'></i></a></div>
                      </div>
                      <div style='width: 400px; background-color:#FAF9F6;' class='flex-shrink-1 rounded py-2 px-3 ml-3'>
                        <div class='font-weight-bold mb-1'><code>".$row['date']."</code></div>
                            ".$row['message']."

                            <a href='contact1.php?id=$row[id]'>         <i data-toggle='tooltip' data-placement='right' title='Delete Message' class='bi bi-trash'></i></a>
                        </div>
                      </div>
                      ";                  
                }
?>

          <!-- end inbox-->
                </div>
              </div><!-- End Default Tabs -->

            </div>
          </div>
    </section>
<!--  -->
    <!-- body  end -->



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