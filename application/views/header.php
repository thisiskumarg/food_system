<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Local - Bazar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?php echo base_url('img/favicon.ico'); ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url('lib/animate/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <!-- <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">EUR</button>
                            <button class="dropdown-item" type="button">GBP</button>
                            <button class="dropdown-item" type="button">CAD</button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">FR</button>
                            <button class="dropdown-item" type="button">AR</button>
                            <button class="dropdown-item" type="button">RU</button>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-dark w-100 pt-2" href="<?php echo site_url('Welcome/index'); ?>" style="height: 65px; padding: 0 30px;">
                    <!-- <h3 class="text-dark m-0 text-uppercase font-italic">Food Delivery</h3> -->
                    <span class="h1 text-uppercase text-dark bg-light px-2 ml-n3">Local</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Bazar</span>
                </a>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Local</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Bazar</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="<?php echo site_url('Welcome/index'); ?>" class="nav-item nav-link active">Home</a>
                            <a href="<?php echo site_url('Welcome/contact'); ?>" class="nav-item nav-link">Contact Us</a>
                            <?php 
                            if(isset($_SESSION['uid']) && !empty($_SESSION['roleid']))
                            {
                                if($_SESSION['roleid'] == '3')
                                {
                                    echo '<a href='.site_url('Welcome/profile').' class="nav-item nav-link">My Profile</a>';
                                }
                                else
                                {
                                    echo '<a href='.site_url('Welcome/dash').' class="nav-item nav-link">Dashboard</a>';
                                }
                                echo '<a href='.site_url('Welcome/logout').' class="nav-item nav-link">Logout</a>';
                            }
                            else
                            {
                                echo '<a href='.site_url('Welcome/login').' class="nav-item nav-link">Login</a>';
                                echo '<a href='.site_url('Welcome/register').' class="nav-item nav-link">Register</a>';
                            }
                            ?>
                        </div>
                        <?php 
                        if(isset($_SESSION['uid']) && !empty($_SESSION['roleid']))
                        {
                            if($_SESSION['roleid'] == '3')
                            {
                        ?>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="<?php echo site_url('Welcome/cart'); ?>" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>
                        <?php 
                            }
                        }
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
