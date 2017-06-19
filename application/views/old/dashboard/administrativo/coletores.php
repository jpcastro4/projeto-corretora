 
        
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
            <!-- <div class="row ">
                <div class="contain-container ">
                    <div class="col-sm-12 ">
                        <a href="<?php echo base_url()?>dashboard/administrativo/coletores/novo" class="btn btn-theme pull-right "> Novo coletor </a>
                    </div>
                </div>
            </div> -->
            <div class="row pt-3">
                <div class="contain-container ">
                    <div class="col-sm-12 ">
                        <div class="contain-card px-3 py-3 block-md">
                        <?php echo $mensagem; ?>
                        <?php echo $mensagem_erro; ?>

                        <?php if( !empty($lista_coletores ) ):
                            foreach($lista_coletores as $coletor ): ?>
                            <div class="lista clearfix">
                                <div class="col-xs-12 col-md-4">
                                    <div class="title"> <?php echo $coletor->coletorDados ?>  </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <small><i> ID: <?php echo $coletor->deviceID ?></i></small>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <small><i><?php echo date('d/m/Y H:i:s', strtotime($coletor->dataHomol)) ?> </i></small>
                                </div>
                               <!--  <div class="col-xs-12 "> <a href="<?php echo base_url()?>dashboard/administrativo/coletores/editar-coletor/<?php echo $coletor->coletorID ?>" class="btn btn-theme">Editar</a> </div> -->

                                <div class="col-xs-12 col-md-2 text-xs-center text-md-right">
                                        
                                        <label class="switch homologa">
                                            <input name="pesquisaPublicada" data-deviceid="<?php echo $coletor->deviceID ?>" <?php echo ($coletor->coletorStatus == 1 )? 'checked data-coletorStatus="0" ' : 'data-coletorstatus="1"'?>  type="checkbox">
                                            <div class="slider round"></div>
                                        </label>
                                </div>
                            </div>

                        <?php endforeach;

                        else: ?>

                            <div class="alert alert-info text-sm-center"> Não há coletores homologados </div>

                        <?php endif;?>
                        </div>
                        
                    </div>

                </div>
            </div>

        </div>

