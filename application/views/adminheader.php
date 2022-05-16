<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - Local Bazar</title>
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
            <div class="col-lg-6 text-center text-lg-right">
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
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-dark w-100 pt-2" href="<?php echo site_url('Welcome/index'); ?>" style="height: 65px; padding: 0 30px;">
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
                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="<?php //echo site_url('Welcome/cart'); ?>" class="dropdown-item">Shopping Cart</a>
                                    <a href="<?php //echo site_url('Welcome/checkout'); ?>" class="dropdown-item">Checkout</a>
                                </div>
                            </div> -->
                            <a href="<?php echo site_url('Welcome/dash'); ?>" class="nav-item nav-link">Dashboard</a>
                            <a href="<?php echo site_url('Welcome/logout'); ?>" class="nav-item nav-link">Logout</a>
                        </div>
                        <!-- <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="<?php //echo site_url('Welcome/cart'); ?>" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div> -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action text-dark active" aria-current="true">Admin Dashboard</a>
                    <a href="<?php echo site_url('Welcome/profile'); ?>" class="list-group-item list-group-item-action">My Account</a>
                    <div class="btn-group dropright">
                        <a href="<?php echo site_url('Welcome/managevendors'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                            Manage Vendors
                        </a>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split list-group-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropright</span>
                        </button>
                        <div class="dropdown-menu" style="border: none; background-color: transparent;">
                            <a href="<?php echo site_url('Welcome/vvendors'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Verified Vendors
                            </a>
                            <a href="<?php echo site_url('Welcome/svendors'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Suspended Vendors
                            </a>
                            <a href="<?php echo site_url('Welcome/nvvendors'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Non - Verified Vendors
                            </a>
                        </div>
                    </div>
                    <div class="btn-group dropright">
                        <a href="<?php echo site_url('Welcome/managecustomers'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                            Manage Customers
                        </a>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split list-group-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropright</span>
                        </button>
                        <div class="dropdown-menu" style="border: none; background-color: transparent;">
                            <a href="<?php echo site_url('Welcome/vcustomers'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Verified Customers
                            </a>
                            <a href="<?php echo site_url('Welcome/scustomers'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Suspended Customers
                            </a>
                            <a href="<?php echo site_url('Welcome/nvcustomers'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Non - Verified Customers
                            </a>
                        </div>
                    </div>
                    <div class="btn-group dropright">
                        <!-- <a href="<?php //echo site_url('Welcome/managebutil'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                            Manage Business Utilities
                        </a> -->
                        <button type="button" class="btn btn-secondary list-group-item list-group-item-action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage Business Utilities
                        </button>
                        <div class="dropdown-menu" style="border: none; background-color: transparent;">
                            <a href="<?php echo site_url('Welcome/managebcities'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Manage Cities
                            </a>
                            <a href="<?php echo site_url('Welcome/manageblocations'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Manage Locations
                            </a>
                            <a href="<?php echo site_url('Welcome/managebcategories'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Manage Categories
                            </a>
                        </div>
                    </div>
                    <div class="btn-group dropright">
                        <a href="<?php echo site_url('Welcome/managebusinesses'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                            Manage Businesses
                        </a>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split list-group-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropright</span>
                        </button>
                        <div class="dropdown-menu" style="border: none; background-color: transparent;">
                            <a href="<?php echo site_url('Welcome/vbusinesses'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Verified Businesses
                            </a>
                            <a href="<?php echo site_url('Welcome/sbusinesses'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Suspended Businesses
                            </a>
                            <a href="<?php echo site_url('Welcome/nvbusinesses'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Non - Verified Businesses
                            </a>
                        </div>
                    </div>
                    <div class="btn-group dropright">
                        <a href="<?php echo site_url('Welcome/manageproducts'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                            Manage Products
                        </a>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split list-group-item" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropright</span>
                        </button>
                        <div class="dropdown-menu" style="border: none; background-color: transparent;">
                            <a href="<?php echo site_url('Welcome/vproducts'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Verified Products
                            </a>
                            <a href="<?php echo site_url('Welcome/sproducts'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Suspended Products
                            </a>
                            <a href="<?php echo site_url('Welcome/nvproducts'); ?>" class="btn btn-secondary list-group-item list-group-item-action">
                                Non - Verified Products
                            </a>
                        </div>
                    </div>
                    <a href="<?php echo site_url('Welcome/manageorders'); ?>" class="list-group-item list-group-item-action">Manage Orders</a>
                    <a href="<?php echo site_url('Welcome/reviews'); ?>" class="list-group-item list-group-item-action">Reviews</a>
                    <a href="<?php echo site_url('Welcome/notifications'); ?>" class="list-group-item list-group-item-action">Notifications</a>
                </div>
            </div>
