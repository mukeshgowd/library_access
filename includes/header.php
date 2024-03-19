<?php
include 'config.php';
$GLOBALS['UserID']  = "";

if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){ 
    $GLOBALS['UserID'] = $_SESSION["uid"];
}

?>

<!DOCTYPE html>
<html>
    

    <head>

        <!-- Meta -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

        <!-- Title -->
        <title>Library Access</title>

        <!-- Favicon -->
        <link href="assets/images/favicon.ico" rel="icon" type="image/x-icon" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Mobile Menu -->
        <link href="assets/css/mmenu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/mmenu.positioning.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/td-msessage.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/toastify.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/jquery.timepicker.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/slide-out-panel.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/notification.css" rel="stylesheet" type="text/css" />


        <!-- Stylesheet -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>

    <body class="layout-v2">
        <!-- Start: Header Section -->
        <header id="header" class="navbar-wrapper toast-top">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="col-sm-12">
                            <!-- Header Topbar -->
                            <div class="header-topbar hidden-sm hidden-xs custom-header-top-bar">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="topbar-info">
                                            <a href="tel:+61-3-8376-6284"><i class="fa fa-phone"></i>+61-3-8376-6284</a>
                                            <span>/</span>
                                            <a href="mailto:support@libraria.com"><i class="fa fa-envelope"></i>support@libraryaccess.com</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="topbar-links">
                                            <?php
                                            if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){ 
                                                echo '<a data-toggle="dropdown" onclick="showNotification()" class="dropdown-toggle" href="#">
                                                <i class="fa fa-bell"></i>
                                                <small id="notification_count">0</small>
                                            </a><span>|</span> <a href="#">Welcome, '.$_SESSION["username"].'</a>
                                                <span>|</span>
                                                <a href="#" onclick="logout()">Logout</a>';
                                            }else{
                                                echo '<a href="signin.php"><i class="fa fa-lock"></i>Login / Register</a>';
                                            } 
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-light">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="navbar-header">
                                            <div class="navbar-brand">
                                                <h1>
                                                    <a href="index-2.html">
                                                        <img src="assets/images/libraria-logo-v2.png" alt="LIBRARIA" />
                                                    </a>
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="navbar-collapse hidden-sm hidden-xs">
                                            <ul class="nav navbar-nav">
                                                <!-- <li class="dropdown active">
                                                    <a data-toggle="dropdown" class="dropdown-toggle disabled" href="index-2.html">Home</a>
                                                    <li><a href="services.html">Services</a></li>

                                                </li> -->
                                                <li><a href="index.php">Home</a></li>                                               
                                                <li><a href="search.php">Search</a></li>
                                                <li><a href="history.php">History</a></li>
                                                <li><a href="due.php">Due</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md">
                        <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                            <div id="mobile-menu">
                                <ul>
                                    <li class="mobile-title">
                                        <h4>Navigation</h4>
                                        <a href="#" class="close"></a>
                                    </li>
                                    <li>
                                        <a href="index-2.html">Home</a>
                                        <ul>
                                            <li><a href="index-2.html">Home V1</a></li>
                                            <li><a href="home-v2.html">Home V2</a></li>
                                            <li><a href="home-v3.html">Home V3</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="books-media-list-view.html">Books &amp; Media</a>
                                        <ul>
                                            <li><a href="books-media-list-view.html">Books &amp; Media List View</a></li>
                                            <li><a href="books-media-gird-view-v1.html">Books &amp; Media Grid View V1</a></li>
                                            <li><a href="books-media-gird-view-v2.html">Books &amp; Media Grid View V2</a></li>
                                            <li><a href="books-media-detail-v1.html">Books &amp; Media Detail V1</a></li>
                                            <li><a href="books-media-detail-v2.html">Books &amp; Media Detail V2</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="news-events-list-view.html">News &amp; Events</a>
                                        <ul>
                                            <li><a href="news-events-list-view.html">News &amp; Events List View</a></li>
                                            <li><a href="news-events-detail.html">News &amp; Events Detail</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Pages</a>
                                        <ul>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="signin.html">Signin/Register</a></li>
                                            <li><a href="404.html">404/Error</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blog.html">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Blog Grid View</a></li>
                                            <li><a href="blog-detail.html">Blog Detail</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- End: Header Section -->
