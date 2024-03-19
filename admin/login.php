<?php
include '../includes/config.php';
?>

<!DOCTYPE html>
<html lang="zxx">
    

<head>        
        
        <!-- Meta -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
        
        <!-- Title -->
        <title>..:: LIBRARIA ::..</title>
        
        <!-- Favicon -->
        <link href="../assets/images/favicon.ico" rel="icon" type="image/x-icon" />
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Mobile Menu -->
        <link href="../assets/css/mmenu.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/mmenu.positioning.css" rel="stylesheet" type="text/css" />
        
        <!-- Stylesheet -->
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/image-uploader.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../assets/css/cropper.css" type="text/css" />
        <link href="../assets/css/td-msessage.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/toastify.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/jquery.timepicker.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>


    <body>
        
     

        <!-- Start: Cart Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="signin-main">
                        <div class="container">
                            <div class="woocommerce">
                                <div class="woocommerce-login">
                                    <div class="company-info signin-register">
                                        <div class="col-md-4">
                                            <div class="row">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-md-offset-1">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="company-detail bg-dark margin-left">
                                                        <div class="signin-head">
                                                            <h2 style="text-align: center;">Admin Login</h2>
                                                            <span class="underline left"></span>
                                                        </div>
                                                        <form class="login" id="login" method="post">
                                                            <input type="hidden" name="action" value="admin" class="input-text">

                                                            <p class="form-row form-row-first input-required">
                                                                <label>
                                                                    <span class="first-letter">Barcode or Username</span>  
                                                                    <span class="second-letter">*</span>
                                                                </label>
                                                                <input type="text"  id="username" name="username" class="input-text">
                                                             </p>
                                                            <p class="form-row form-row-last input-required">
                                                                <label>
                                                                    <span class="first-letter">Pin</span>  
                                                                    <span class="second-letter">*</span>
                                                                </label>
                                                                <input type="password" id="password" name="password" class="input-text">
                                                            </p>
                                                            <div class="clear"></div>
                                                            <input type="button" value="Login" id="bt_adminlogin" class="button btn btn-default">
                                                            <div class="clear"></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-5 border-dark new-user">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="company-detail new-account bg-light margin-right">
                                                        <div class="new-user-head">
                                                            <h2>Create New Account</h2>
                                                            <span class="underline left"></span>
                                                            <p>If no barcode has been assigned for your account, please contact the library.</p>
                                                        </div>
                                                        <form class="login" method="post">
                                                            <p class="form-row form-row-first input-required">
                                                                <label>
                                                                    <span class="first-letter">Barcode</span>  
                                                                    <span class="second-letter">*</span>
                                                                </label>
                                                                <input type="text" id="username1" name="username" class="input-text">
                                                            </p>
                                                            <p class="form-row input-required">
                                                                <label>
                                                                    <span class="first-letter">Password</span>  
                                                                    <span class="second-letter">*</span>
                                                                </label>
                                                                <input type="password" id="password1" name="password" class="input-text">
                                                            </p>                                                                                
                                                            <div class="clear"></div>
                                                            <input type="submit" value="Signup" name="signup" class="button btn btn-default">
                                                            <div class="clear"></div>
                                                        </form> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <!-- End: Cart Section -->
        
        
        <!-- jQuery Latest Version 1.x -->
        <script type="text/javascript" src="../assets/js/jquery-1.12.4.min.js"></script>
        
        <!-- jQuery UI -->
        <script type="text/javascript" src="../assets/js/jquery-ui.min.js"></script>
        
        <!-- jQuery Easing -->
        <script type="text/javascript" src="../assets/js/jquery.easing.1.3.js"></script>

        <!-- Bootstrap -->
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        
        <!-- Mobile Menu -->
        <script type="text/javascript" src="../assets/js/mmenu.min.js"></script>
        
        <!-- Harvey - State manager for media queries -->
        <script type="text/javascript" src="../assets/js/harvey.min.js"></script>
        
        <!-- Waypoints - Load Elements on View -->
        <script type="text/javascript" src="../assets/js/waypoints.min.js"></script>

        <!-- Facts Counter -->
        <script type="text/javascript" src="../assets/js/facts.counter.min.js"></script>

        <!-- MixItUp - Category Filter -->
        <script type="text/javascript" src="../assets/js/mixitup.min.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="../assets/js/owl.carousel.min.js"></script>
        
        <!-- Accordion -->
        <script type="text/javascript" src="../assets/js/accordion.min.js"></script>
        
        <!-- Responsive Tabs -->
        <script type="text/javascript" src="../assets/js/responsive.tabs.min.js"></script>
        
        <!-- Responsive Table -->
        <script type="text/javascript" src="../assets/js/responsive.table.min.js"></script>
        
        <!-- Masonry -->
        <script type="text/javascript" src="../assets/js/masonry.min.js"></script>
        
        <!-- Carousel Swipe -->
        <script type="text/javascript" src="../assets/js/carousel.swipe.min.js"></script>
        
        <!-- bxSlider -->
        <script type="text/javascript" src="../assets/js/bxslider.min.js"></script>
        
        <!-- Custom Scripts -->
        <script type="text/javascript" src="../assets/js/main.js"></script>
        <script type="text/javascript" src="../assets/js/image-uploader.min.js"></script>
        <script type="text/javascript" src="../assets/js/cropper.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../assets/js/td-message.js"></script>
        <script type="text/javascript" src="../assets/js/toastify.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.timepicker.js"></script>

        <script type="text/javascript" src="../assets/js/script.js"></script>

    </body>


</html>
