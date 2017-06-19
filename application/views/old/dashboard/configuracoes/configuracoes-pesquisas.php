 
        
        <div class="col-12 col-md-7 col-lg-8 bg-grey-md1 relative height-100">
            <div class="row align-items-center head header-contain pd-20 hidden-sm-down ">
                <div class="col-12 ">
                    <h1 class="title title-2 text-center"> <?php echo $pg_nivel_2 ?> </h1>
                </div>
            </div>

            <div class="row py-4">
                 <div class="col-12 ">
                    <div class="contain-container">
                        <a data-toggle="modal" data-target="#novotipo" href="#" class="btn btn-theme pull-right "> Novo tipo </a>
                    </div>
                </div>
 
            </div>

            <div class="row ">
                <div class="contain-container ">
                    <div class="col-12  ">
                        <div class="contain-card p-4 block-md">
                        <?php echo $mensagem; ?>
                        <?php echo $mensagem_erro; ?>

                        <?php if( !empty($lista_tipoPesquisas) ):

                        //var_dump($coletores_vinculados);

                            foreach($lista_tipoPesquisas as $tipoPesquisa ): 

                                //var_dump( $this->dashboard_model->totalColetas($tipoPesquisa->vinculoID) );

                            ?>
                            <div class="lista clearfix">
                                <div class="row">
                                    <div class="col-12 col-md-9">
                                        <div class="title"> <?php echo $tipoPesquisa->pesquisaTipo ?> </div>
                                    </div>

                                    <div class="col-12 col-md-3 text-right"> 

                                    <!-- <a href="<?php echo base_url()?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID ?>/coletores/edita/<?php echo $tipoPesquisa->coletorID ?>" class="btn btn-theme pull-right">Editar</a>  -->
                                        <div class="btn-group" role="group">
                                            <a id="btnGroupDropSave" href="" class="btn btn-contain btn-theme dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Escolha </a>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDropSave">
                                                <a class="dropdown-item" href="<?php echo base_url()?>dashboard/configuracoes/pesquisas/editar/<?php echo $tipoPesquisa->tipoPesquisaID ?>">Editar</a>
                                                <a class="dropdown-item excluircoletor" href="<?php echo base_url()?>dashboard/configuracoes/pesquisas/editar/<?php echo $tipoPesquisa->tipoPesquisaID ?>/questoes"  ">Questões</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                        <?php else: ?>

                            <div class="alert alert-info text-sm-center"> Não tipos de pesquisas cadastrados </div>

                        <?php endif;?>
                        </div>
                        
                    </div>

                </div>
            </div>

        </div>

         <div class="modal fade"  id="novotipo" tabindex="-1" role="dialog" aria-labelledby="novoPequisa" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form action="" method="post" >
                    <div class="modal-header">
                        <h5 class="modal-title pull-left"> Novo tipo de pesquisa </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="modal-alert"> Este será o tipo de pesquisa. </p>

                            <fieldset class="form-group">
                                <div class="form-group col-xs-12">
                                    <input type="text" name="pesquisaTipo" class="form-control" placeholder="Dê um titulo para a pesquisa" required />
                                </div>
                                <input type="hidden" name="form" value="novo" >                            
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