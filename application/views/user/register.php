<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/dashboard/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/dashboard/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Register your account - Suprabit</title>
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

<body class="login-page">
    <!--  
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
                        <a class="nav-link" href="../index.html">Back to Kit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/creativetimofficial/now-ui-kit/issues">Have an issue?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                            <i class="fa fa-twitter"></i>
                            <p class="hidden-lg-up">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="hidden-lg-up">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="hidden-lg-up">Instagram</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->
 
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(<?php echo base_url()?>assets/dashboard/img/login.jpg)"></div>
        <div class="container">
            <div class="col-md-8 content-center">
                <div class="card card-login card-plain">
                    <form class="form" method="" action="create_account">
                        <div class="header header-primary text-center">
                            <div class="logo-container">
                                <img src="<?php echo base_url()?>assets/dashboard/img/now-logo.png" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons business_badge"></i>
                                </span>
                                <input type="text" name="sponsorCode" class="form-control" placeholder="Sponsor Code">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_single-02"></i>
                                </span>
                                <input type="text" name="usuarioNome" class="form-control" placeholder="First Name">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_single-02"></i>
                                </span>
                                <input type="text" name="usuarioSobrenome" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_email-85"></i>
                                </span>
                                <input type="email" name="usuarioEmail" class="form-control" placeholder="Your e-mail">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons tech_mobile"></i>
                                </span>
                                <input type="email" name="usuarioCelular" class="form-control" placeholder="Cell Phone">
                            </div>
                            <small class="mb-2"><span>If you do not have a wallet, create now at <a target="_blank" href="http://blockchain.info"> Blockchain.info</a></span></small>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons business_money-coins"></i>
                                </span>
                                <input type="text" name="carteiraEndereco" class="form-control" placeholder="Bitcoin Wallet">
                            </div>
                            <hr class="col-12">
                            <small class="mb-2"><span>Create a code with a maximum of 10 characters</span></small>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons business_badge"></i>
                                </span>
                                <input type="password" name="usuarioCodigo" placeholder="Your code network" class="form-control" />

                            </div>

                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                <input type="password" name="usuarioSenha" placeholder="A Password..." class="form-control" />
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                <input type="password" name="repeteUsuarioSenha" placeholder="Repeat the Password..." class="form-control" />
                            </div>
                        </div>
                        <div class="footer text-center">
                            <a href="#" id="form-save" class="btn btn-primary btn-round btn-lg btn-block"> Let's Go </a>
                        </div>
                        <div class="pull-left">
                            <h6>
                                <a href="/login" class="link">Make login</a>
                            </h6>
                        </div>
                        <div class="pull-right">
                            <h6>
                                <a href="#pablo" class="link">Need Help?</a>
                            </h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       <!--  <footer class="footer">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md">
                                MIT License
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed by
                    <a href="http://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                </div>
            </div>
        </footer> -->
    </div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url()?>assets/dashboard/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/dashboard/js/core/tether.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/dashboard/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url()?>assets/dashboard/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?php echo base_url()?>assets/dashboard/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="<?php echo base_url()?>assets/dashboard/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url()?>assets/dashboard/js/now-ui-kit.js" type="text/javascript"></script>

<script type="text/javascript">
    
var app = {


}


$(document).ready(function(){

    $('#form-save').on('click', function(e){
        e.preventDefault()
        $('form').each(function(){ 
            
            var action = $(this).attr('action')
                inputs = $(this).serialize()

            $.post('<?php echo base_url("ajax_functions/")?>'+action, inputs , function(data){
                
                if(data.result == 'success'){
                    window.location.href = '<?php echo base_url("dashboard/profile")?>'                    
                }

                if(data.result == 'error'){

                    alert(data.message)
                }
                

            },'json')
            .fail(function(data){
                console.log(data.responseText)

            })
        })


    })
})

</script>
</html>