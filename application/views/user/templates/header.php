<?php 

  //check_session();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/dashboard/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/dashboard/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Profile Page - Now Ui Kit by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="<?php echo base_url()?>assets/dashboard/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/dashboard/css/now-ui-kit.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url()?>assets/dashboard/css/demo.css" rel="stylesheet" />
</head>

<body class="profile-page">
    <!-- Navbar -->
    <nav class="navbar navbar-toggleable-md bg-primary fixed-top navbar-transparent " color-on-scroll="500">
        <div class="container">
            <div class="dropdown button-dropdown">
                <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-header">Dropdown header</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">One more separated link</a>
                </div>
            </div>
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="http://demos.creative-tim.com/now-ui-kit/index.html" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">
                    Now Ui Kit
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="<?php echo base_url()?>assets/dashboard/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('quotas')?>"><i class="fa fa-exchange"></i> Quotas
                            
                            <!-- <p class="hidden-lg-up">Quotas</p> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('network')?>"><i class="fa fa-share-alt"></i> Network
                            
                            <!-- <p class="hidden-lg-up">Network</p> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('network')?>" ><i class="fa fa-bank"></i> Income
                            
                            <!-- <p class="hidden-lg-up">Income</p> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('settings/profile')?>"><i class="fa fa-cog"></i> Settings
                            
                            <!-- <p class="hidden-lg-up">Settings</p> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('store')?>"><i class="fa fa-shopping-cart"></i> Store
                            
                            <!-- <p class="hidden-lg-up">Store</p> -->
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="page-header page-header-small" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('<?php echo base_url()?>assets/dashboard/img/bg5.jpg');">
            </div>
            <div class="container">
                <div class="content-center">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="photo-container">
                                <img src="<?php echo base_url()?>assets/dashboard/img/ryan.jpg" alt="">
                            </div>
                            <h3 class="title">Ryan Scheinder</h3>
                            <p class="category">Photographer</p>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="content">
                                <div class="social-description">
                                    <h2>26</h2>
                                    <p>Comments</p>
                                </div>
                                <div class="social-description">
                                    <h2>26</h2>
                                    <p>Comments</p>
                                </div>
                                <div class="social-description">
                                    <h2>48</h2>
                                    <p>Bookmarks</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>