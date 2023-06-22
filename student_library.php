<?php
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
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Marwari College - Library</title>
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
  <a href="student_index.php" class="logo d-flex align-items-center">
    <img src="assets/img/marwari.jpeg" alt="">
    <span class="d-none d-lg-block">Student</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="./student_friend_search.php">
    <input type="text" name="query" placeholder="Search Friend.." title="Enter search keyword">
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
          <a href="student_notice.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
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
          <a href="student_notice.php">Show all notifications</a>
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
<a href="student_contact.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
</li>
<li>
<hr class="dropdown-divider">
</li>
<?php
///message table
$sql="SELECT * FROM student_msg WHERE reciver = '$username' ORDER BY id DESC LIMIT 3";
$query=mysqli_query($con,$sql);//query fire
$rs1 = mysqli_fetch_array($query);
$num_rows = mysqli_num_rows($query);
$sender = $rs1["sender"];//sender name
$msg = $rs1["message"];//message
$date11 = $rs1["date"];//date
?>

<li class="message-item">
<a href="student_contact.php">
    <?php
    if($num_rows>0)
        echo"<img src='./assets/images/profile.png' alt='' class='rounded-circle'>";
  ?>
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
<a href="student_contact.php">Show all messages</a>
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
          <h6> <a href="#"><?php echo $name;?></a></h6>
          <span>Marwari College</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="student_index.php">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="student_index.php">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="student_faq.php">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="stu_log_Backend.php?logout=1">
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
<a class="nav-link collapsed" href="student_index.php">
<i class="bi bi-mortarboard"></i>
<span>My Profile</span>
</a>
</li><!-- End Dashboard Nav -->

<li class="nav-item">
<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
<i class="bi bi-people"></i><span>Student Zone</span><i class="bi bi-chevron-down ms-auto"></i>
</a>
<ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

<li>
  <a href="./student_result.php">
    <i class="bi bi-circle"></i><span>Results</span>
  </a>
</li>
<li>
  <a href="./student_librecord.php">
    <i class="bi bi-circle"></i><span>Library Records</span>
  </a>
</li>
<li>
  <a href="./student_atd.php">
    <i class="bi bi-circle"></i><span>Ataindence</span>
  </a>
</li>
<li>
  <a href="./student_comunity.php">
    <i class="bi bi-circle"></i><span>Community</span>
  </a>
</li>
<li>
<a href="./dlocker.php">
  <i class="bi bi-circle"></i><span>D-Locker</span>
</a>
</li>
<li>
  <a href="./resume.php">
    <i class="bi bi-circle"></i><span>Resume</span>
  </a>
</li>
</ul>
</li><!-- End Components Nav -->
<li class="nav-item">
<a class="nav-link" href="student_library.php">
<i class="bi bi-journal-bookmark"></i>
<span class="text-primary">Athenaeum</span>
</a>
</li>

<li class="nav-heading">Pages</li>


<li class="nav-item">
<a class="nav-link collapsed" href="student_faq.php">
<i class="bi bi-question-circle"></i>
<span >F.A.Q</span>
</a>
</li><!-- End F.A.Q Page Nav -->

<li class="nav-item">
<a class="nav-link collapsed" href="./student_contact.php">
<i class="bi bi-envelope"></i>
<span>Contact</span>
</a>
</li><!-- End Contact Page Nav -->

<li class="nav-item">
<a class="nav-link collapsed" href="student_notice.php">
<i class="bi bi-card-list"></i>
<span>Notice</span>
</a>
</li><!-- End Register Page Nav -->

<li class="nav-item">
<a class="nav-link collapsed" href="stu_log_Backend.php?logout=1">
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
          <li class="breadcrumb-item"><a href="student_index.php">My Profile</a></li>
          <li class="breadcrumb-item">Athenaeum</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <!-- Search Box -->
    <div class="col-lg-12">

    <div class="card">
    <div class="card-body">
        <h5 class="card-title">Find Books</h5>

        <form method="post">   
            <!--  -->
            <div class="input-group">
                
                <div class="form-outline">
                <input style="border-top-right-radius: 0px;
                border-bottom-right-radius: 0px;
                border-top-left-radius: 20px;
                border-bottom-left-radius: 20px;" name="find" class="form-control" type="search" placeholder="Find Book" id="example-search-input4">                   
                </div>
                <button style="border-top-right-radius: 20px;
                border-bottom-right-radius: 20px;
                border-top-left-radius: 0px;
                border-bottom-left-radius: 0px;" name="ok" type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
                </div>
                <?php
                ///////////////////find//////////////
                if(isset($_POST['ok']))
                {
                    

                      //admin list table                    
                          $sql="SELECT * FROM  `book_db` WHERE name='$_POST[find]' OR sno='$_POST[find]'";
                          $result=$con->query($sql);
                          if($result->num_rows>0)
                          {
                            echo"
                                        <!-- Table with hoverable rows -->
                                        <table class='table table-hover'>
                                        <thead>
                                            <tr>
                                            <th scope='col'>SN</th>
                                            <th scope='col'>Book Name</th>
                                            <th scope='col'>Book Number</th>
                                            <th scope='col'>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>";
                                        $no=1;
                                        while($row=$result->fetch_assoc())
                                        {
                                            if($row['status']==1)
                                            {
                                                echo"
                                                <tr>
                                                    <th  scope='row'><a href='' ><i class='bi bi-arrow-right-circle-fill'></a></i></th>
                                                    <td  style='overflow: hidden; text-overflow: ellipsis;'>".$row["name"]."</td>
                                                    <td  style='word-wrap: break-word; overflow: hidden; text-overflow: ellipsis;'>".$row["sno"]."</td>
                                                    <td  ><span style='border-radius: 20px;background-color: #FF2400;' class='badge badge-primary'>Not Avil</span></td>
                                                </tr>
                                                ";
                                            }
                                            else
                                            {
                                                echo"
                                                    <tr>
                                                        <th  scope='row'><a href='' ><i class='bi bi-arrow-right-circle-fill'></a></i></th>
                                                        <td  style='overflow: hidden; text-overflow: ellipsis;'>".$row["name"]."</td>
                                                        <td  style='word-wrap: break-word; overflow: hidden; text-overflow: ellipsis;'>".$row["sno"]."</td>
                                                        <td  ><span style='border-radius: 20px;background-color: #0BDA51;' class='badge badge-success'>Avil ".$row['qun']."</span></td>
                                                    </tr>
                                                    ";
                                            }
                                        $no++;
                                        }
                                        
                                        
                                        echo"
                                    </tbody>
                                        </table>
                                    </center>";
                        }
                        else
                        {
                            echo"
                            <script>                
                                swal({
                                    icon: 'info',
                                    title:'Failed',
                                    text: 'Unable To Find Book!',
                                    }).then(function() {
                                    window.location = 'student_library.php';
                                    });                        
                                    </script>";
                        }

                }

                ///////////////////find//////////////
                ?>
            <!--  -->
            </form>
    </div>
    </div>

    <!-- Search Box -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <center>
              <h5 class="card-title">Book List</h5>

              <!-- Table with hoverable rows -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Book Number</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                //admin list table                    
                    $sql="SELECT * FROM  `book_db` ORDER BY id DESC";
                    $result=$con->query($sql);
                    $no=1;
                    while($row=$result->fetch_assoc())
                    {
                        if($row['status']==1)
                        {
                            echo"
                            <tr>
                                <th  scope='row'>".$no."</th>
                                <td  style='overflow: hidden; text-overflow: ellipsis;'>".$row["name"]."</td>
                                <td  style='word-wrap: break-word; overflow: hidden; text-overflow: ellipsis;'>".$row["sno"]."</td>
                                <td  ><span style='border-radius: 20px;background-color: #FF2400;' class='badge badge-primary'>Not Avil</span></td>
                            </tr>
                            ";
                        }
                        else
                        {
                            echo"
                                <tr>
                                    <th  scope='row'>".$no."</th>
                                    <td  style='overflow: hidden; text-overflow: ellipsis;'>".$row["name"]."</td>
                                    <td  style='word-wrap: break-word; overflow: hidden; text-overflow: ellipsis;'>".$row["sno"]."</td>
                                    <td  ><span style='border-radius: 20px;background-color: #0BDA51;' class='badge badge-success'>Avil ".$row['qun']."</span></td>
                                </tr>
                                ";
                        }
                    $no++;
                    }
                ?>      
                </tbody>
              </table>
                </center>
              <!-- End Table with hoverable rows -->

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