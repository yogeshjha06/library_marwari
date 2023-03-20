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
  <link href="assets/favio.png" rel="icon">

  <title>Book Haven</title>

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

<body>

  <div class="hero_area">
    <div class="hero_social">
      <a href="https://www.facebook.com/yogesh.Anjali.jha">
        <i class="fa fa-facebook" aria-hidden="true"></i>
      </a>
      <a href="https://twitter.com/i_Yogeshjha">
        <i class="fa fa-twitter" aria-hidden="true"></i>
      </a>
      <a href="https://www.linkedin.com/in/yogesh-jha-b731b4206/">
        <i class="fa fa-linkedin" aria-hidden="true"></i>
      </a>
      <a href="https://www.instagram.com/i_yogeshjha/">
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </a>
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="./home.php">
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
                <a class="nav-link" href="./home.php">Home <span class="sr-only">(current)</span></a>
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
                <a class="nav-link" href="home_contact.php">Contact Us</a>
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
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Brain Storming
                    </h1>
                    <p>
                    “Let me not pray to be sheltered from dangers, but to be fearless in facing them. Let me not beg for the stilling of my pain, but for the heart to conquer it.”
                    </p>
                    <div class="btn-box">
                      <a style="border-radius: 30px;" href="./home_contact.php" class="btn btn-outline-warning">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="./assets/images/s4.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                    Mangalsutra
                    </h1>
                    <p>
                      "The first condition of marriage between a man and a woman is that both must belong to each other totally."
                    </p>
                    <div class="btn-box">
                      <a style="border-radius: 30px;" href="./home_contact.php" class="btn btn-outline-warning">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                  <img src="./assets/images/s3.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                    Gitanjali
                    </h1>
                    <p>
                    You can't cross the sea merely by standing and staring at the water. Faith is the bird that feels the light and sings when the dawn is still dark.
                    </p>
                    <div class="btn-box">
                      <a style="border-radius: 30px;" href="./home_contact.php" class="btn btn-outline-warning">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                  <img src="./assets/images/s2.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- shop section -->

  <section class='shop_section layout_padding'>
    <div class='container'>
      <div class='heading_container heading_center'>
        <h2>
          Top Trending Books
        </h2>
      </div>
      <div class='row'>


<?php
   ///////book top 3///////////////////////////////////////////////// 
   $sqlx="SELECT * FROM book_db ORDER BY id DESC LIMIT 3";
   $queryx=mysqli_query($con,$sqlx);//query fire
   $n=1;
    while($rowx=mysqli_fetch_array($queryx))
    {
      if($n==1)
      {
        echo"
          <div class='col-md-6 '>
            <div class='box'>
              <a href=''>
                <div class='img-box'>
                  <img style='border-radius: 15px' src='./book/".$rowx['pic']."' alt=''>
                </div>
                <div class='detail-box'>
                  <h6>
                  ".$rowx['name']."
                  </h6>
                  <h6>
                  Quantity:
                  <span>
                  ".$rowx['qun']."
                    </span>
                  </h6>
                </div>
                <div class='new'>
                  <span>
                    Featured
                  </span>
                </div>
              </a>
            </div>
          </div>";
          $n++;
      }
      elseif($n==2)
      {
        echo"
                <div class='col-sm-6 col-xl-3'>
                  <div class='box'>
                    <a href=''>
                      <div class='img-box'>
                      <img style='border-radius: 15px' src='./book/".$rowx['pic']."' alt=''>
                      </div>
                      <div class='detail-box'>
                        <h6>
                          ".$rowx['name']."
                        </h6>
                        <h6>
                          Quantity:
                          <span>
                          ".$rowx['qun']."
                          </span>
                        </h6>
                      </div>
                      <div class='new'>
                        <span>
                          New
                        </span>
                      </div>
                    </a>
                  </div>
                </div>";
                $n++;
      }
else
 echo"
        <div class='col-sm-6 col-xl-3'>
          <div class='box'>
            <a href=''>
              <div class='img-box'>
              <img style='border-radius: 15px' src='./book/".$rowx['pic']."' alt=''>
              </div>
              <div class='detail-box'>
                <h6>
                ".$rowx['name']."
                </h6>
                <h6>
                Quantity:
                <span>
                ".$rowx['qun']."
                  </span>
                </h6>
              </div>
              <div class='new'>
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>";
    }      
        ?>
      </div>
        
        
      <div class='btn-box'>
        <a style=' border-radius: 30px;' href='book_view.php'>
          View All
        </a>
      </div>
    </div>
  </section>

  <!-- end shop section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 col-lg-5 ">
          <div class="img-box">
            <img src="./assets/images/about2.png" alt="">
          </div>
        </div>
        <div class="col-md-6 col-lg-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
            The Book Heven is where you can find all the information you need about our library, 
            its services, and its collections. Whether you're a student, a faculty member, or a member of the 
            community, we've got you covered.Our library provides a range of services to help you make 
            the most of your research and learning experience. 
            </p>
            <a style="border-radius: 30px;" href="./home_contact.php" class="btn btn-outline-warning">
              Contact Us
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- feature section -->

  <section class="feature_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Explore Our Features
        </h2>
        <p>
        The Library is located on the campus of Marwari College and is open 24 X 7 through our Book Heven Portal. 
        During this academic year, let's create a new record of reading books.
        </p>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="">
              <img style="height: 115px; width: 115px;" src="./assets/images/1.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Student Login
              </h5>
              <p>
                For student Login
              </p>
              <a href="./stu_login.php">
                <span>
                click here
                </span>
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img style="height: 100px; width: 100px;" src="./assets/images/2.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
              Admin Login
              </h5>
              <p>
              For teachers and staff 
              </p>
              <a href="./index.php">
                <span>
                click here
                </span>
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img style="height: 100px; width: 100px;" src="./assets/images/3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Explore 
              </h5>
              <p>
                To explore the library
              </p>
              <a href="book_view.php">
                <span>
                click here
                </span>
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img style="height: 100px; width: 100px;" src="./assets/images/4.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Contact Us
              </h5>
              <p>
                To share your feedback
              </p>
              <a href="./home_contact.php">
                <span>
                click here
                </span>
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">

      </div>
    </div>
  </section>

  <!-- end feature section -->

  <!-- contact section -->

  <section class="contact_section">
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
                <button type="submit" name="send" style="border-radius: 30px;" class="btn btn-outline-warning">
                  SEND
                </button>

                <?php
                    if(isset($_POST['send']))
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
                        unset($_POST['name'],$_POST['send'],$_POST['email'],$_POST['phone'],$_POST['message']);
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
                        unset($_POST['name'],$_POST['send'],$_POST['email'],$_POST['phone'],$_POST['message']);
                  }
                
                }
                ?>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img style="height: auto; width:auto"  src="./assets/images/21.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonial
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="./assets/images/c11.png" alt="">
              </div>
              <div class="detail-box">
                <div class="client_info">
                  <div class="client_name">
                    <h5>
                      Dr. Manoj Kumar
                    </h5>
                    <h6>
                      Principal
                    </h6>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                " A liberal education is at the heart of a civil society, 
                and at the heart of a liberal education is the act of teaching."
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="./assets/images/pre.png" alt="">
              </div>
              <div class="detail-box">
                <div class="client_info">
                  <div class="client_name">
                    <h5>
                      Hon'ble. Droupadi Murmu
                    </h5>
                    <h6>
                    President of India
                    </h6>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                "Johar! Namaskar! Youth are the symbol of the hopes, aspirations of our pround India."
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="./assets/images/modi.png" alt="">
              </div>
              <div class="detail-box">
                <div class="client_info">
                  <div class="client_name">
                    <h5>
                      Shri. Narendra Modi
                    </h5>
                    <h6>
                      Prime Minister of India
                    </h6>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                "The world is seeing India with a ray of hope and our diaspora can play a crucial role in further spreading it."
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

  <!-- footer section -->
  <footer class="footer_section">
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
                                  window.location = 'home.php';
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
                                    window.location = 'home.php';
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
                                    window.location = 'home.php';
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