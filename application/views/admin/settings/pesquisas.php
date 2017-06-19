 
        
        <div class="col-12 col-md-8 bg-grey-md1 height-100">
            <div class="row align-items-center head header-contain pd-20">
                    <div class="col-12 col-sm-4">
                        <!-- <a href=""> </a> -->
                    </div>
                    <div class="col-12 col-sm-4 ">
                        <h1 class="title title-2 text-center"> <?php echo $pg_nivel_2 ?> </h1>
                    </div>
                    <div class="col-sm-4 text-right">
                         
                    </div>

            </div>
            <div class="row max-height90">
                <div class="contain-container py-4">
                   
                        <div class="col-12 ">
                            <a data-toggle="modal" data-target="#nova" href="#" class="btn btn-theme pull-right "> Nova pesquisa </a>
                        </div>
                    
                </div>
     
                <div class="contain-container ">
                    
                    <div class="col-12 ">
                        <div class="contain-card p-4 block-md">
                        <?php echo $mensagem; ?>
                        <?php echo $mensagem_erro; ?>

                        <?php if( !empty($lista_pesquisas ) ):
                            foreach($lista_pesquisas as $pesquisa ): ?>
                            <div class="lista clearfix">
                                <div class="row">
                                    <div class="col-12 col-md-10"> <div class="title"> <?php echo $pesquisa->pesquisaNome ?> </div></div>
                                    <div class="col-12 col-md-2"> <a href="<?php echo base_url()?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID ?>/dados" class="btn btn-theme pull-right">Editar</a> </div>
                                </div>
                            </div>

                        <?php endforeach;

                        else: ?>

                            <div class="alert alert-info text-sm-center"> Não há pesquisas em andamento </div>

                        <?php endif;?>
                        </div>
                        
                    </div>

                </div>
            </div>

        </div>

        <!-- MODAL NOVA PESQUISA NO FOOTER -->