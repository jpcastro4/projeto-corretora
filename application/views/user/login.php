<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/dashboard/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/dashboard/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login - Suprabit </title>
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
                                    <i class="now-ui-icons ui-1_email-85"></i>
                                </span>
                                <input type="email" name="usuarioEmail" class="form-control" placeholder="Your e-mail">
                            </div>
                             
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                </span>
                                <input type="password" name="usuarioSenha" placeholder="Your Password..." class="form-control" />
                            </div>
                             
                        </div>
                        <div class="footer text-center">
                            <a href="#" id="form-save" class="btn btn-primary btn-round btn-lg btn-block"> Let's Go </a>
                        </div>
                        <div class="pull-left">
                            <h6>
                                <!-- <a href="/login" class="link">Make login</a> -->
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
                
                window.location.href = '<?php echo base_url("dashboard/profile")?>'

            },'json')
            .fail(function(data){
                console.log(data.responseText)

            })
        })


    })
})

</script>
</html>