 
        
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
                        <button  data-toggle="modal" data-target="#local" data-tipo="novo" data-rotulo='{"title": "Novo estado","aviso": "Você está adicionando um novo estado","ideditar": ""}' class="btn btn-theme pull-right"> Novo estado </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="contain-container ">
                    <div class="col-sm-12 ">
                        <div class="contain-card px-3 py-3 block-md">
                        <?php echo $mensagem; ?>
                        <?php echo $mensagem_erro; ?>

                        <?php if( !empty($lista_estados ) ):
                            foreach($lista_estados as $estado ): ?>
                            <div class="lista clearfix">
                                <div class="col-xs-12 col-md-6"> <div class="title"> <?php echo $estado->estadoNome ?> </div></div>
                                <div class="col-xs-12 col-md-3"> <button data-tipo="editar" data-toggle="modal" data-target="#local" data-rotulo='{"title":"Editar estado","aviso":"Você está editando o estado","ideditar":"<?php echo $estado->estadoID ?>"}' class="btn btn-theme pull-right">Editar nome </button> </div>
                                <div class="col-xs-12 col-md-3"> <a href="<?php echo base_url()?>dashboard/administrativo/locais/estado/<?php echo $estado->estadoID ?>" class="btn btn-theme pull-right">Ir para cidades</a> </div>
                            </div>

                        <?php endforeach;

                        else: ?>

                            <div class="alert alert-info text-sm-center"> Não há estados cadastrados </div>

                        <?php endif;?>
                        </div>
                        
                    </div>

                </div>
            </div>

        </div>


        <div class="modal fade"  id="local" tabindex="-1" role="dialog" aria-labelledby="novoEstado" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                <form action="" method="post" >
                    <div class="modal-header">
                        <h5 class="modal-title pull-left"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="modal-alert"> </p>

                            <fieldset class="form-group">
                                <div class="form-group col-xs-12">
                                    <input type="text" name="estadoNome" class="form-control" placeholder="Nome do estado" required />
                                </div>
                                <div class="form-group col-xs-12">
                                    <input type="text" name="codIbge" class="form-control" placeholder="Cód IBGE" />
                                </div>
                                
                            </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnsalvar" class="btn btn-theme">Salvar</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

        