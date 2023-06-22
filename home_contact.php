<?php
error_reporting(0);
include ('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="Yogesh_Jha" />
  <link href="assets/img/favio.png" rel="icon">

  <title>Book Haven | Contact</title>


 <!-- sweet alert -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
            Book Haven
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="./home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./book_view.php"> Library </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./book_inventory.php"> Find </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="home_contact.php">Contact Us<span class="sr-only">(current)</span></a>
              </li>
            </ul>
            <div class="user_option-box">
              <a href="login.php">
                <i class="bi bi-person-fill" aria-hidden="true"></i>
              </a>
              <a href="stu_login.php">
                <i class="bi bi-mortarboard-fill" aria-hidden="true"></i>
              </a>
              <a href="./book_inventory.php">
                <i class="bi bi-search" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
              <h2>
                Contact Us
              </h2>
            </div>
            <form action="" method="post">
            <div>
                <input name="name" type="text" placeholder="Full Name " />
              </div>
              <div>
                <input name="email" type="email" placeholder="Email" />
              </div>
              <div>
                <input name="phone" type="text" placeholder="Phone number" />
              </div>
              <div>
                <input name="message" type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="d-flex ">
                <button type="submit" name="ok" style="border-radius: 30px;" class="btn btn-outline-warning">
                  SEND
                </button>

                <?php
                    if(isset($_POST['ok']))
                    {
                      $name1 = $_POST['name'];
                      $email1 = $_POST['email'];
                      $phone1 = $_POST['phone'];
                      $message1 = $_POST['message'];

                  $sqlx="INSERT INTO `feedback` (name, email, phone, message) VALUES ('$name1','$email1','$phone1','$message1')";
                  $fire=mysqli_query($con,$sqlx);//query fire
                  if($fire)
                  {
                    echo"
                        <script>                
                            swal({
                                icon: 'success',
                                title: 'Message sent!',
                                }).then(function() {
                                    window.location = 'home.php';
                                });                        
                        </script>";
                        unset($_POST['name'],$_POST['ok'],$_POST['email'],$_POST['phone'],$_POST['message']);
                  }
                  else
                  {
                    echo"
                        <script>                
                            swal({
                                icon: 'error',
                                title: 'Please Try again!',
                                }).then(function() {
                                    window.location = 'home.php';
                                });                        
                        </script>";
                        unset($_POST['name'],$_POST['ok'],$_POST['email'],$_POST['phone'],$_POST['message']);
                  }
                
                }
                ?>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img style="border-radius: 35px;" src="./assets/images/s4.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <!-- footer section -->
<footer class='footer_section'>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_detail">
            <h4>
              About
            </h4>
            <p>
            If you have any questions or comments, please feel free to contact us. Our contact information is available on our website.
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_contact">
            <h4>
              Reach at..
            </h4>
            <div class="contact_link_box">
              <a href="https://goo.gl/maps/WQRdMHZmqmu46Jnz9">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +91 74639-59117
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  yogeshjha@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_contact">
            <h4>
              Subscribe
            </h4>
            <form action="#" method="post">
              <input name="subscribe" type="text" placeholder="Enter email" />
              <button name="ok" type="submit">
                Subscribe
              </button>
            </form>
            <?php

            if(isset($_POST['ok']))
            {
              $em=$_POST['subscribe'];

              $sqlx="SELECT * FROM `feedback` WHERE email='$em'";
              $queryx=mysqli_query($con,$sqlx);//finde email

                if(mysqli_num_rows($queryx)>0)
                {
                  echo"
                      <script>                
                          swal({
                              icon: 'error',
                              title: 'Already Subscribed!',
                              }).then(function() {
                                  window.location = 'book_view.php';
                              });                        
                      </script>";
                }
                else
                {
                  $sqlx="INSERT INTO `feedback` (email) VALUES ('$em')";
                  $fire=mysqli_query($con,$sqlx);//query fire
                  if($fire)
                  {
                    echo"
                        <script>                
                            swal({
                                icon: 'success',
                                title: 'Subscribed To Book Heven!',
                                }).then(function() {
                                    window.location = 'book_view.php';
                                });                        
                        </script>";
                        unset($_POST['subscribe'],$_POST['ok']);
                  }
                  else
                  {
                    echo"
                        <script>                
                            swal({
                                icon: 'error',
                                title: 'Please Try again!',
                                }).then(function() {
                                    window.location = 'book_view.php';
                                });                        
                        </script>";
                  }
                }
              }
              
            ?>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://www.yogeshjha.com/">Yogesh Jha</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>