 
        
        <div class="col-md-8  bg-grey-md1  height-100">
            <div class="row align-items-center">
                <div class="head header-contain pd-20">
                    <div class="col-sm-4">
                        <!-- <a href=""> </a> -->
                    </div>
                    <div class="col-sm-4 ">
                        <h1 class="title title-2 text-center"> <?php echo $pg_nivel_2 ?> </h1>
                    </div>
                    <div class="col-sm-4 text-right">
                        <!-- <div class="btn-group" role="group">
                            <a id="btnGroupDropSave" href="" class="btn btn-contain dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Agendar </a>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDropSave">
                                <a class="dropdown-item" href="#"> Salvar rascunho </a>
                                <a class="dropdown-item" href="#"> Publicar agora </a>
                            </div>
                        </div>
                        <a href="" class="btn btn-link"> Cancelar </a> -->
                    </div>
                </div>
            </div>
            <div class="row py-2">
                <div class="contain-container ">
                    <div class="col-sm-12 ">
                        <a href="<?php echo base_url()?>dashboard/administrativo/pesquisadores/novo" class="btn btn-theme pull-right "> Novo Pesquisador </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="contain-container ">
                    <div class="col-sm-12 ">
                        <div class="contain-card px-3 py-3 block-md">
                        <?php echo $mensagem; ?>
                        <?php echo $mensagem_erro; ?>

                        <?php if( !empty($lista_pesquisadores ) ):
                            foreach($lista_pesquisadores as $pesquisador ): ?>
                            <div class="lista clearfix">
                                <div class="col-xs-12 col-md-10"> <div class="title"> <?php echo $pesquisador->pesquisadorNome ?> </div></div>
                                <div class="col-xs-12 col-md-2"> <a href="<?php echo base_url()?>dashboard/administrativo/pesquisadores/editar-pesquisador/<?php echo $pesquisador->pesquisadorID ?>" class="btn btn-theme pull-right">Editar</a> </div>
                            </div>

                        <?php endforeach;

                        else: ?>

                            <div class="alert alert-info text-sm-center"> Ainda não há pesquisadores </div>

                        <?php endif;?>
                        </div>
                        
                    </div>

                </div>
            </div>

        </div>

