<?php check_manutencao() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Afiliado</title>
    <meta name="description" content="A free HTML template and UI Kit built on Bootstrap" />
    <meta name="keywords" content="free html template, bootstrap, ui kit, sass" />
    <meta name="author" content="Peter Finlan and Taty Grassini Codrops" />
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
    <meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/index/img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="<?php echo base_url()?>assets/index/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#663fb5">
    <!-- Only needed Bootstrap bits + custom CSS in one file -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/index/css/landio.css">
  </head>

  <body class="bg-faded p-t-2">
    <div class="container">
      <h3 class="p-y-1 text-xs-center"></h3>
    </div>

    

    <div class="container" style="max-width:500px">
      <div class="row">
        <div class="" >
        <form action="" method="post" >
          <!-- Forms
          ================================================== -->
          <?php if(isset($mensagem)) echo $mensagem; ?>
          <div class="form-group has-icon-left form-control-email">
            <label class="sr-only" for="inputEmail">Email address</label>
            <input type="email" name="email" class="form-control form-control-lg" id="inputEmail" placeholder="Email address" autocomplete="off">
          </div>
          <div class="form-group has-icon-left form-control-password">
            <label class="sr-only" for="inputPassword">Enter a password</label>
            <input type="password" name="senha" class="form-control form-control-lg" id="inputPassword" placeholder="Enter a password" autocomplete="off">
          </div>

          <button type="submit" value="submit" name="submit" class="btn btn-primary btn-block">Acessar</button>
          </form>

          <hr class="invisible">
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/index/js/landio.min.js"></script>
  </body>
</html>
