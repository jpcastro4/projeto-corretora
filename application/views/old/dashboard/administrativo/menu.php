        <div class="col-md-3 col-lg-2 bg-grey-md2 height-100">
            <div class="row head header-sec-menu pd-20 align-items-center hidden-sm-down">
                <div class="title title-2 "><i class="fa fa-building fa-align-right"></i> <span class="pull-right"> <?php echo $pg_nivel_1 ?>  </span></div>
            </div>

            <div class="row">
                <div class="pd-20">
                    <ul class="menu-vert menu-sec">
                        <li><a class="<?php if( !empty($pg_usuarios) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/administrativo/usuarios"><i class="fa fa-lock"></i> Usuários </a></li>
                        <li><a class="<?php if( !empty($pg_pesquisadores) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/administrativo/pesquisadores"><i class="fa fa-users"></i>Pesquisadores </a></li>
                        <li><a class="<?php if( !empty($pg_coletores) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/administrativo/coletores"><i class="fa fa-mobile-phone"></i> Coletores </a></li>
                        <li><a class="<?php if( !empty($pg_locais) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/administrativo/locais"><i class="fa fa-street-view"></i> Locais </a></li>
                    </ul>
                </div>
            </div>
        </div>