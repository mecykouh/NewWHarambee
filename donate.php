<?php require 'libs/App.php'; ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	if(isset($_GET['id'])){
		
		$id = $_GET['id'];
		//get contribution  details
		$query = "SELECT * FROM tblcontributions WHERE id = '$id'";
		$app = new App;

		$contribution = $app->selectOne($query);

		if(!$contribution){
			header("location: index.php");
		}

	}else{
		header("location: index.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        
        <!-- TITLE -->
        <title> W-Harambee Dashboard </title>

        <!-- FAVICON -->
        <link rel="icon" href="Dashboard/public/img/brand/favicon.ico">

        
		<!-- BOOTSTRAP CSS -->
		<link  id="style" href="Dashboard/public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- ICONS CSS -->
		<link href="Dashboard/public/plugins/web-fonts/icons.css" rel="stylesheet">
		<link href="Dashboard/public/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="Dashboard/public/plugins/web-fonts/plugin.css" rel="stylesheet">

		<!-- STYLE CSS -->
		<link href="Dashboard/public/css/style.css" rel="stylesheet">
		<link href="Dashboard/public/css/plugins.css" rel="stylesheet">

		

        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        

    </head>

	<body class="ltr main-body leftmenu error-1">

	<div class="page">
            <div class="page-main">

                <!-- HEADER -->
                
                <div class="main-header side-header">
                    <div class="main-container container-fluid">
                        <div class="main-header-left">
                            <a class="main-header-menu-icon" href="javascript:void(0);"
                                id="mainSidebarToggle"><span></span></a>
								<a href="index.php"><img src="img/logo2.png" style="width:25%;" class="mobile-logo"
                                        alt="logo"></a>
                            <div class="hor-logo">
                                <a class="main-logo" href="index.php">
                                    <img src="img/logo2.png" class="header-brand-img desktop-logo"
                                        alt="logo">
                                    <img src="img/logo2.png" class="header-brand-img desktop-logo-dark"
                                        alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="main-header-center">
                            <div class="responsive-logo">
                                <a href="index.php"><img src="img/logo2.png" style="width:75%;" class="mobile-logo"
                                        alt="logo"></a>
                                <a href="index.php"><img src="img/logo2.png" style="width:75%;" class="mobile-logo-dark"
                                        alt="logo"></a>
                            </div>
                        </div>
                        <div class="main-header-right">
                            <button class="navbar-toggler navresponsive-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
								
                            </button><!-- Navresponsive closed -->
                            <div
                                class="navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2 ms-auto">
                                        <!-- SEARCH -->
                                        <div class="header-nav-right p-3">
                                            
                                            <a href="index.php" class="btn ripple btn-min w-sm btn-primary me-2"
                                                target="_blank">Create New Harambee
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END HEADER -->

<div class="page main-signin-wrapper">


	


	<!-- Row -->
	<div class="row signpages text-center">
		<div class="col-md-12">
			<div class="card">
				<div class="row row-sm">
					<div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
						<div class="mt-5 pt-4 p-2 pos-absolute">
							<img src="Dashboard/public/img/logo.png" class="header-brand-img mb-4" style="width:75%" alt="logo">
							<div class="Dashboard/publicix"></div>
							<img src="Dashboard/public/img/users/1.jpg" class="ht-100 mb-0" alt="user">
							<h5 class="mt-4 text-white"><?php echo $contribution->contributionName;?></h5>
							<span class="tx-white-6 tx-13 mb-5 mt-xl-0">Total Contributed: Ksh. 45,000</span>
						</div>
					</div>
					
				

					<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form">
								<div class="card custom-card overflow-hidden crypto-buysell-card">
									<div class="card-body">
										<div class="card-header border-bottom-0 ps-0 pt-0">
											
											<h5 class="text-start mb-2"><?php echo $contribution->contributionName;?></h5>
											<label class="main-content-label my-auto">Donate Now</label>
										</div>
									<div class="clearfix"></div>
									
									<form method="POST" class="bg-white p-5 rounded donation-form" data-aos="fade-up" id="form" action="initiateMpesa.php">
										<div class="form-group fs-14">
											<input class="form-control input-lg" name="amount" type="text" placeholder="Amount">
										</div>
										<input type="hidden" name="tillNumber" value="<?php echo $contribution->contributionTillNo;?>"> 
                            <input type="hidden" name="contributionId" value="<?php echo $contribution->id;?>"> 
										<div class="form-group fs-14">
											<input class="form-control input-lg" type="text" placeholder="M-Pesa Number" name="phone_number">
										<label class="main-content-label mt-4 mb-4">Select payment method</label>
										
										<div class="payment-form form">
											<div class="payment-type d-flex">
											<input type="radio" name="radio3" id="mpesa" value="mpesa" checked><label class="mpesa-label payment-cards four col" for="mpesa"><img src="Dashboard/public/img/mpesa.png" alt="Mpesa"></label>
												<input type="radio" name="radio3" id="credit" value="credit" ><label class="credit-label payment-cards four ms-0 col" for="credit"><img src="Dashboard/public/img/visa.png" alt="visa"></label>
												<input type="radio" name="radio3" id="debit" value="debit"><label class="debit-label payment-cards four col" for="debit"><img src="Dashboard/public/img/mastercard.png" alt="Debitcard"></label>
												<input type="radio" name="radio3" id="paypal" value="paypal"><label class="paypal-label payment-cards four col" for="paypal"><img src="Dashboard/public/img/paypal.png" alt="paypal"></label>
											
											</div></div>
											<button class="btn btn-primary btn-lg btn-block mt-4" type="submit" name="contribute" id="contribute">Donate Now</button>
										</form>
									</div>
								</div>
							</div>
				
			</div>
		</div>
	</div>
	<!-- End Row -->


</div>
<!-- END PAGE -->

<!-- SCRIPTS -->
		
<!-- JQUERY JS -->
<script src="Dashboard/public/plugins/jquery/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="Dashboard/public/plugins/bootstrap/js/popper.min.js"></script>
<script src="Dashboard/public/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- PERFECT SCROLLBAR JS -->
<script src="Dashboard/public/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!-- SELECT2 JS -->
<script src="Dashboard/public/plugins/select2/js/select2.min.js"></script>
<script src="Dashboard/public/js/select2.js"></script>



<!-- COLOR THEME JS -->
<script src="Dashboard/public/js/themeColors.js"></script>

<!-- CUSTOM JS -->
<script src="Dashboard/public/js/custom.js"></script>

<!-- SWITCHER JS -->
<script src="Dashboard/public/switcher/js/switcher.js"></script>

<!-- END SCRIPTS -->

</body>

    </body>

<!--Ajax Script start here-->
    
</html>
