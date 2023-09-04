<?php require_once 'config.php';?>
<?php require_once 'libs/App.php'; ?>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  // instantiate class to use its functions
  $app = new App();

  //check if user is already logged in
  $app->startingSession();
  $app->validateSession("dashboard.php");

  // Sign up
  if(isset($_POST['signup'])){

    $fullName = $_POST['name'];
    $phonenumber = $_POST['phone'];
    $IDNo = "0";
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // create query to register user
    $query = "INSERT INTO tblUsers (fullName, emailAddress, IDNo, phoneNumber, password) 
    VALUES (:fullName, :emailAddress, :IDNo, :phoneNumber, :password)";

    $array = [
      ":fullName" => $fullName,
      ":emailAddress" => $IDNo,
      ":IDNo" => $IDNo,
      ":phoneNumber" => $phonenumber,
      ":password" => $password
    ];

    $path = "index.php";
    $app -> register($query, $array, $path);

  }

  // Log In
  if(isset($_POST['login'])){

    $phonenumber = $_POST['phone'];
    $password = $_POST['password'];

    // create query to login user
    $query = "SELECT * FROM tblUsers WHERE phonenumber = '$phonenumber'";

    $array = [
      "email" => $phonenumber,
      "password" => $password
    ];

    $path = "Dashboard/";
    $app -> login($query, $array, $path);

  }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta description -->
    <meta name="description"
          content="Automate Your WhatsApp Harambee">
    <meta name="author" content="ThemeTags">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content=""/> <!-- website name -->
    <meta property="og:site" content=""/> <!-- website link -->
    <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content=""/> <!-- description shown in the actual shared post -->
    <meta property="og:image" content=""/> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content=""/> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article"/>

    <!--title-->
    <title>W-Harambee</title>

    <!--favicon icon-->
    <link rel="icon" href="img/favicon.png" type="image/png" sizes="16x16">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans&amp;display=swap"
          rel="stylesheet">

    <!--Bootstrap css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Magnific popup css-->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!--Themify icon css-->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!--animated css-->
    <link rel="stylesheet" href="css/animate.min.css">
    <!--Owl carousel css-->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <!--responsive css-->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://unpkg.com/@icon/themify-icons/themify-icons.css" /> 

</head>
<body>


<!--header section start-->
<header class="header">
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="javascript:;">
                <img src="img/logo.png" width="50% alt="logo" class="img-fluid"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti ti-menu"></span>
            </button>
            <div class="collapse navbar-collapse h-auto" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto menu">
                  
                    <li><a href="#home" class="page-scroll">Home</a></li>
                    <li><a href="#how-it-work" class="page-scroll">How It Works</a></li>
                    <li><a href="#contact" class="page-scroll">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--header section end-->


<!--body content wrap start-->
<div class="main">

    <!--hero section start-->
    <section id="home" class="hero-equal-height home pt-100 gradient-overlay"
             style="background: url('img/bg.jpg')no-repeat center center / cover">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="hero-content-left text-white pb-100 mt-lg-0 mt-md-5 mt-sm-5 mt-5">
                        <h1 class="text-white">Automate Your WhatsApp Fundraiser</h1>
                       
                        <div class="video-promo-content mt-4 d-flex align-items-center">
                            <a href="#" class="popup-youtube video-play-icon"><span class="ti ti-control-play"></span> </a>
                            <span class="ml-4">How It Works</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="sign-up-form-wrap position-relative z-index shadow-lg rounded p-5 w-100 gray-light-bg">
                        <div class="sign-up-form-header text-center mb-4">
                            <h4 class="mb-0">Start Your Fundraising</h4>
                            <p></p>
                            <div class="tabs">
                            
      <button class="tab-btn" onclick="changeTab('login')">Login</button>
      <button class="tab-btn active" onclick="changeTab('signup')">Sign Up</button>
    </div>
                        </div>
                        <div class="message-box d-none">
                            <div class="alert alert-danger"></div>
                        </div>


<!-- Start Of Signup Tab -->

                        <div id="signup" class="tab-content">
                        <form action="#" method="POST" action="" class="login-signup-form sign-up-form">
                            <div class="form-group">
                                <label class="pb-1">Your Name</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti ti-user"></span>
                                    </div>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="pb-1">Your Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti ti-mobile"></span>
                                    </div>
                                    <input type="number" name="phone" class="form-control" placeholder="Enter your Phone Number" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="pb-1">Your Password</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti ti-lock"></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Enter your Password" required>
                                </div>
                            </div>
                            <!-- Terms and Conditions -->
                            <div class="form-check d-flex align-items-center text-center">
                                <input type="checkbox" class="form-check-input mt-0 mr-3" id="exampleCheck1" required>
                                <label class="form-check-label" for="exampleCheck1">I agree with the <a
                                        href="#">terms & conditions</a></label>
                            </div>
                           
                            <!-- Submit -->
                            <div class="form-group">
                                <input type="submit" id="signupBtn" name="signup" class="btn solid-btn btn-block" value="Signup">
                            </div>
                            
                         
                        </form>
</div>

<!-- End Of Signup Tab -->

<!-- Start Of Login Tab -->
<div id="login" class="tab-content">
                        <form method="POST" action="" class="login-signup-form ign-up-form">
                            <div class="form-group">
                                <label class="pb-1">Your Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti ti-mobile"></span>
                                    </div>
                                    <input type="number" name="phone" class="form-control" placeholder="Enter your Phone Number" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="pb-1">Your Password</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti ti-lock"></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Enter your Password" required>
                                </div>
                            </div>
                           
                            <!-- Submit -->
                            <div class="form-group">
                                <input type="submit" type="submit" id="signupBtn" name="login" class="btn solid-btn btn-block" value="Login">
                            </div>
                           <!-- Link -->
                            <div class="text-center">
                                <small class="text-muted text-center">
                                    Forgot your password? <a href="#">Reset Here</a>.
                                </small>
                            </div>
                           
                        </form>
</div>

<!-- End Of Login Tab -->
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-bottom overflow-hidden">
            <img src="img/hero-shape.svg" alt="shape" class="bottom-shape">
        </div>
    </section>
    <!--hero section end-->

    <!--how it work start-->
    <section id="how-it-work" class="work-process-new ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading">
                        <h2>How It Works</h2>
                        <p>Experience the future of fundraising automation and streamline your efforts like never before. Transform your WhatsApp group into a dynamic hub of engagement and impact with our intuitive platform.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="work-process-wrap">
                        <div class="single-work-process mt-lg-5 mt-md-5 mt-sm-5 mt-5">
                            <div class="work-process-icon-wrap secondary-bg rounded">
                                <i class="ti ti-pencil-alt icon-md text-white"></i>
                                <span class="process-step color-secondary white-bg shadow-sm">1</span>
                            </div>
                            <span class="work-process-divider"></span>
                            <div class="work-process-content mt-4">
                                <h5>Create Your Account</h5>
                                <p>Set up your account quickly and easily, providing the necessary details to get started. </p>
                            </div>
                        </div>
                        <div class="single-work-process mt-lg-5 mt-md-5 mt-sm-5 mt-5">
                            <div class="work-process-icon-wrap secondary-bg rounded">
                                <i class="ti ti-comments-smiley icon-md text-white"></i>
                                <span class="process-step color-secondary white-bg shadow-sm">2</span>
                            </div>
                            <span class="work-process-divider"></span>
                            <div class="work-process-content mt-4">
                                <h5>Link Your WhatsApp Group</h5>
                                <p>Our platform seamlessly integrates with your group, enabling automatic updates and communications. </p>
                            </div>
                        </div>
                        <div class="single-work-process mt-lg-5 mt-md-5 mt-sm-5 mt-5">
                            <div class="work-process-icon-wrap secondary-bg rounded">
                                <i class="ti ti-credit-card icon-md text-white"></i>
                                <span class="process-step color-secondary white-bg shadow-sm">3</span>
                            </div>
                            <span class="work-process-divider"></span>
                            <div class="work-process-content mt-4">
                                <h5>Accept Payments Seamlessly</h5>
                                <p>Accept Payment From all major payment options. </p>
                            </div>
                        </div>
                        <div class="single-work-process mt-lg-5 mt-md-5 mt-sm-5 mt-5">
                            <div class="work-process-icon-wrap secondary-bg rounded">
                                <i class="ti ti-comments-smiley icon-md text-white"></i>
                                <span class="process-step color-secondary white-bg shadow-sm">4</span>
                            </div>
                            <span class="work-process-divider"></span>
                            <div class="work-process-content mt-4">
                                <h5>Update WhatsApp Group Instantly</h5>
                                <p>As soon as a contribution is received, our platform sends a message to your WhatsApp group instantly </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--how it work end-->

    
  
</div>
<!--body content wrap end-->

<!--footer section start-->
<footer class="footer-section">
    <!--footer top start-->
    <div class="footer-top gradient-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="footer-nav-wrap text-white mb-0 mb-md-4 mb-lg-0">
                        <a class="d-block" href="#"><img src="img/logo.png" alt="footer logo" width="150" class="img-fluid mb-1"></a>
                        <p>Experience the future of fundraising automation and streamline your efforts like never before. .</p>
                        <ul class="list-unstyled social-list mb-0">
                            <li class="list-inline-item"><a href="#" class="rounded"><span class="ti-facebook white-bg color-2 shadow rounded-circle"></span></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><span class="ti-twitter white-bg color-2 shadow rounded-circle"></span></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><span class="ti-linkedin white-bg color-2 shadow rounded-circle"></span></a></li>
                            <li class="list-inline-item"><a href="#" class="rounded"><span class="ti-dribbble white-bg color-2 shadow rounded-circle"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-12">
                    <div class="footer-nav-wrap text-white">
                        <h5 class="text-white">Usefull Links</h5>
                        <ul class="list-unstyled footer-nav-list mt-3">
                            <li><a href="#how-it-work" class="text-foot"><span class="ti-angle-double-right"></span> How It Works</a></li>
                            <li><a href="#home" class="text-foot"><span class="ti-angle-double-right"></span> Login/Register</a></li>
                          </ul>
                    </div>
                </div>


                <div class="col-lg-6 col-md-6 col-12">
                    <div class="footer-nav-wrap text-white">
                        <h5 class="text-light footer-head">Newsletter</h5>
                        <p>Subscribe our newsletter to get our update. We don't send span email to you.</p>
                        <form action="#" class="newsletter-form mt-3">
                            <div class="input-group">
                                <input type="email" class="form-control" id="subscribe-email" placeholder="Enter your email" required="">
                                <div class="input-group-append">
                                    <button class="btn solid-btn subscribe-btn btn-hover" type="submit">
                                        Subscribe
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer top end-->

    <!--footer copyright start-->
    <div class="footer-bottom gray-light-bg py-3">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-6 col-lg-5"><p class="copyright-text pb-0 mb-0">Copyrights © <?php echo date("Y");?>. All
                    rights reserved by
                    <a href="#" target="_blank">W-Harambee</a></p>
                </div>
            </div>
        </div>
    </div>
    <!--footer copyright end-->
</footer>
<!--footer section end-->

<!--bottom to top button start-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="ti-angle-up"></span>
</button>
<!--bottom to top button end-->

<!--jQuery-->
<script src="js/jquery-3.4.1.min.js"></script>
<!--Popper js-->
<script src="js/popper.min.js"></script>
<!--Bootstrap js-->
<script src="js/bootstrap.min.js"></script>
<!--Magnific popup js-->
<script src="js/jquery.magnific-popup.min.js"></script>
<!--jquery easing js-->
<script src="js/jquery.easing.min.js"></script>
<!--wow js-->
<script src="js/wow.min.js"></script>
<!--owl carousel js-->
<script src="js/owl.carousel.min.js"></script>
<!--countdown js-->
<script src="js/jquery.countdown.min.js"></script>
<!--validator js-->
<script src="js/validator.min.js"></script>
<!--custom js-->
<script src="js/scripts.js"></script>
<script src="js/script.js"></script>
</body>
</html>