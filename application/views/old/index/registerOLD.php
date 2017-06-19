<?php //check_manutencao() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NOW X - Rede de Ajuda Mútua - Doações Espontâneas</title>
    <meta name="description" content="Ajuda Mútua Espontânea de ciclos curtos e ganhos mensais. Projeção financeira para desesperados." />
    <meta name="keywords" content="ajuda mutua, financiero, doação espontanea" />
   
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/index/img/favicon/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/index/img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/index/img/favicon/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/index/img/favicon/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/index/img/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo base_url()?>assets/index/img/favicon/manifest.json">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/index/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#663fb5">
    <meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#663fb5">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/index/css/landio.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bo/assets/css/bootbox/sweet-alert.min.css" />

    <?php if( $_SERVER['HTTP_HOST'] != 'localhost'): ?>
       
    <?php endif;?>

   
  </head>

  <body>

    <!-- Navigation
    ================================================== -->

    <nav class="navbar navbar-dark bg-inverse bg-inverse-custom navbar-fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"> <img width="120" src="<?php echo base_url()?>assets/index/img/logo.png">
          <span class="sr-only">now x - ajuda mútua</span>
        </a>
        <a class="navbar-toggler hidden-md-up pull-xs-right" data-toggle="collapse" href="#collapsingNavbar" aria-expanded="false" aria-controls="collapsingNavbar">
        &#9776;
      </a>
        <!-- <a class="navbar-toggler navbar-toggler-custom hidden-md-up pull-xs-right" data-toggle="collapse" href="#collapsingMobileUser" aria-expanded="false" aria-controls="collapsingMobileUser">
          <span class="icon-user"></span>
        </a> -->
        <div id="collapsingNavbar" class="collapse navbar-toggleable-custom" role="tabpanel" aria-labelledby="collapsingNavbar">
          <ul class="nav navbar-nav pull-xs-right">
            <li class="nav-item nav-item-toggable">
              <a class="nav-link scroll" href="#cadastro">Cadastre-se</a>
            </li>
            <li class="nav-item nav-item-toggable">
              <a class="nav-link " href="<?php echo base_url()?>backoffice/login">Backoffice</a>
            </li>
           <!-- <li class="nav-item nav-item-toggable">
              <a class="nav-link" href="ui-elements.html">UI Kit</a>
            </li>
            <li class="nav-item nav-item-toggable">
              <a class="nav-link" href="https://github.com/tatygrassini/landio-html" target="_blank">GitHub</a>
            </li>
             <li class="nav-item nav-item-toggable hidden-md-up">
              <form class="navbar-form">
                <input class="form-control navbar-search-input" type="text" placeholder="Type your search &amp; hit Enter&hellip;">
              </form>
            </li>
            <li class="navbar-divider hidden-sm-down"></li>
            <li class="nav-item dropdown nav-dropdown-search hidden-sm-down">
              <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="icon-search"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-search" aria-labelledby="dropdownMenu1">
                <form class="navbar-form">
                  <input class="form-control navbar-search-input" type="text" placeholder="Type your search &amp; hit Enter&hellip;">
                </form>
              </div>
            </li>
            <li class="nav-item dropdown hidden-sm-down textselect-off">
              <a class="nav-link dropdown-toggle nav-dropdown-user" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo base_url()?>assets/index/img/face5.jpg" height="40" width="40" alt="Avatar" class="img-circle"> <span class="icon-caret-down"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-user dropdown-menu-animated" aria-labelledby="dropdownMenu2">
                <div class="media">
                  <div class="media-left">
                    <img src="<?php echo base_url()?>assets/index/img/face5.jpg" height="60" width="60" alt="Avatar" class="img-circle">
                  </div>
                  <div class="media-body media-middle">
                    <h5 class="media-heading">Joel Fisher</h5>
                    <h6>hey@joelfisher.com</h6>
                  </div>
                </div>
                <a href="#" class="dropdown-item text-uppercase">View posts</a>
                <a href="#" class="dropdown-item text-uppercase">Manage groups</a>
                <a href="#" class="dropdown-item text-uppercase">Subscription &amp; billing</a>
                <a href="#" class="dropdown-item text-uppercase text-muted">Log out</a>
                <a href="#" class="btn-circle has-gradient pull-xs-right">
                  <span class="sr-only">Edit</span>
                  <span class="icon-edit"></span>
                </a>
              </div>
            </li> -->
          </ul>
        </div>
    <!--     <div id="collapsingMobileUser" class="collapse navbar-toggleable-custom dropdown-menu-custom p-x-1 hidden-md-up" role="tabpanel" aria-labelledby="collapsingMobileUser">
          <div class="media m-t-1">
            <div class="media-left">
              <img src="<?php echo base_url()?>assets/index/img/face5.jpg" height="60" width="60" alt="Avatar" class="img-circle">
            </div>
            <div class="media-body media-middle">
              <h5 class="media-heading">Joel Fisher</h5>
              <h6>hey@joelfisher.com</h6>
            </div>
          </div>
          <a href="#" class="dropdown-item text-uppercase">View posts</a>
          <a href="#" class="dropdown-item text-uppercase">Manage groups</a>
          <a href="#" class="dropdown-item text-uppercase">Subscription &amp; billing</a>
          <a href="#" class="dropdown-item text-uppercase text-muted">Log out</a>
          <a href="#" class="btn-circle has-gradient pull-xs-right m-b-1">
            <span class="sr-only">Edit</span>
            <span class="icon-edit"></span>
          </a>
        </div> -->
      </div>
    </nav>

   
    

    

    <section class="section-signup bg-faded" id="cadastro">
      <div class="container" style="max-width:600px;">
        <h3 class="text-xs-center m-b-3">Cadastro aberto para NOW X 40</h3>
        <form id="precadastro" method="post" action="register" >
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-cpf">
                <label class="sr-only" for="nome">Seu nome</label>
                <input type="text" name="name" class="form-control form-control-lg" id="nome" placeholder="Seu nome">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-cpf">
                <label class="sr-only" for="sobrenome">Sobrenome</label>
                <input type="text" name="lastname" class="form-control form-control-lg" id="sobrenome" placeholder="Sobrenome">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-email">
                <label class="sr-only" for="email">Email</label>
                <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Email" autocomplete="off" >
              </div>
            </div>
           
            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-cpf">
                <label class="sr-only" for="telefone">Telefone</label>
                <input type="tel" name="phone" minlength="9" class="form-control form-control-lg" id="telefone" placeholder="Telefone com DDD" >
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-password">
                <label class="sr-only" for="senha">Crie uma senha</label>
                <input type="password" name="pswd" class="form-control form-control-lg" id="senha" placeholder="Crie uma senha" autocomplete="off">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group has-icon-left form-control-password">
                <label class="sr-only" for="senha_confirma">Confirme sua senha</label>
                <input type="password" name="confirm_pswd" class="form-control form-control-lg" id="senha_confirma" placeholder="Confirme a senha" autocomplete="off">
              </div>
            </div>
            <div class="col-sm-12">
              <label class="c-input c-checkbox">
                <input type="checkbox" required >
                <span class="c-indicator"></span> Aceito os termos e condições.
              </label>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Confirmar pré-cadastro</button>
              </div>
            </div>
          </div>
          
        </form>
      </div>
    </section>

    <!-- Footer
    ================================================== -->

    <footer class="section-footer bg-inverse" role="contentinfo">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-5">
            <div class="media">
              <div class="media-left"><img width="90" src="<?php echo base_url()?>assets/index/img/logo.png">
                <!-- <span class="media-object icon-logo display-1"></span> -->
              </div>
              <small class="media-body media-bottom">
                &copy; now x - Ajuda Mútua. <br>
                Doações espontâneas.
              </small>
            </div>
          </div>
         <!--  <div class="col-md-6 col-lg-7">
            <ul class="nav nav-inline">
              <li class="nav-item">
                <a class="nav-link" href="./index-carousel.html"><small>NEW</small> Slides<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item"><a class="nav-link" href="ui-elements.html">UI Kit</a></li>
              <li class="nav-item"><a class="nav-link" href="https://github.com/tatygrassini/landio-html" target="_blank">GitHub</a></li>
              <li class="nav-item"><a class="nav-link scroll-top" href="#totop">Back to top <span class="icon-caret-up"></span></a></li>
            </ul>
          </div> -->
        </div>
      </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/index/js/landio.min.js"></script>

    <script src="<?php echo base_url()?>assets/bo/assets/js/bootbox-page/sweet-alert.min.js"></script>

    <script type="text/javascript">

    var nowx = '<?php echo base_url() ?>ajax_functions/';
      
    $(document).ready(function(){

      $('a.scroll').on('click',function(e){
        e.preventDefault();
        $('html,body').animate({ scrollTop:$(this.hash).offset().top }, 800);
      })

        $('#precadastro').on('submit', function(event){
            event.preventDefault();

            $(this).find('[required]').each(function(e){
                if ( $(this).val() == '' )
                {
                    $(this).focus();

                    swal('Erro', 'Campo vazio', 'error');

                    return;
                } 
            });

            var form = $(this);

            $.post(nowx+$(this).attr('action'), $(this).serialize(), function(data){


                if(data.result == 'error'){
                    swal('Erro', data.message, 'error');
                }

                if(data.result == 'success'){
                    //swal('Sucesso', data.message, 'success');

                    $('#precadastro input').val('');
                    window.location.href = data.redirect;
                }

                if(data.clear == true ){

                  $('#precadastro input').val('');
                }

            }, 'json')
            .fail( function(data){

                console.log(data);
                swal('Erro', 'Volte mais tarde', 'error');

            });

        });

    });
    </script>
  </body>
</html>
