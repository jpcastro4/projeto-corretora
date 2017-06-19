        <div class="col-12 col-md-3 col-lg-2 bg-grey-md2 height-100 <?php if($this->agent->is_mobile() ): echo 'collapse'; endif;?>" id="menu-secundario">
            <div class="row align-items-center head header-sec-menu pd-20 hidden-sm-down">
                <div class="title title-2 col-12 "><i class="fa fa-line-chart fa-align-right"></i> <span class="pull-right"> <?php echo $pg_nivel_1 ?>  </span></div>
            </div>

            <div class="row" >

                <div class="pd-20 col-12">
                    <ul class="menu-vert menu-sec">
                        <li><a class="<?php if( !empty($pg_spesquisas) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas"><i class="fa fa-thumb-tack"></i> Configurações gerais </a></li>
                        <li><a class="<?php if( !empty($pg_pesquisas) ){ echo 'ativo '; } ?>"  href="<?php echo base_url() ?>dashboard/configuracoes/pesquisas" ><i class="fa fa-thumb-tack"></i> Pesquisas </a></li>
                    </ul>
                </div>

                <?php if(!empty($pg_pesquisas_editar)  ) :?>

                <hr class="separador-grey w-100 clearfix">

                <div class="pd-20  col-12">
                    <ul class="menu-vert menu-sec">
                        <li><a class="<?php if( !empty($pg_etapa_1) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/dados"><i class="fa fa-thumb-tack"></i> Dados da pesquisa </a></li>
                        <li><a class="<?php if( !empty($pg_etapa_2) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/questoes"><i class="fa fa-thumb-tack"></i> Questões </a></li>
                        <li><a class="<?php if( !empty($pg_coletores) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/coletores"><i class="fa fa-thumb-tack"></i> Coletores vinculados </a></li>
                    </ul>
                </div>

                <?php endif; ?>

                <?php if(!empty($pg_pesquisas_finalizar )) :?>

                <hr class="separador-grey w-100 clearfix">

                <div class="pd-20  col-12">
                    <ul class="menu-vert menu-sec">
                        <li><a class="<?php if( !empty($pg_sincronizar) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/coletores/sincronizar"><i class="fa fa-thumb-tack"></i> Sincronizar coletores </a></li>
                        <li><a class="<?php if( !empty($pg_etapa_2) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/questoes"><i class="fa fa-thumb-tack"></i> Fazer correções </a></li>
                        <li><a class="<?php if( !empty($pg_etapa_3) ){ echo 'ativo '; } ?>" href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/coletores"><i class="fa fa-thumb-tack"></i> Rélatórios </a></li>
                    </ul>
                </div>

                <?php endif; ?>
            </div>
        </div>