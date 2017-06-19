 
        
        <div class="col-12 col-md-7 col-lg-8 bg-grey-md1 relative height-100">
            <div class="row align-items-center head header-contain pd-20 hidden-sm-down ">
                <div class="col-12 ">
                    <h1 class="title title-2 text-center"> <?php echo $pg_nivel_2 ?> </h1>
                </div>
            </div>

            <div class="row max-height90">
               
                    <div class="contain-container py-4">
                        <div class="col-12 ">
                            <?php echo $mensagem; ?>
                            <?php echo $mensagem_erro; ?>

                            <form action="" method="post" >
                                <div class="contain-card p-4 block-md ">
                                    <?php //var_dump($pesquisa); ?>
                                    <fieldset class="form-group mb-0">
                                        <div class="row">
                                            <div class="form-group col-12 mb-4">
                                                <div class="label">Tipo de pesquisa <br/><small><i>( Defina um nome de até 20 caracteres )</i></small></div>
                                                <input type="text" name="pesquisaTipo" value="<?php echo $get_tipoPesquisa->pesquisaTipo ?>" maxlength="20" class="form-control"  placeholder="Defina um nome" required  />
                                            </div>

                                            <div class="form-group col-12 mb-4">
                                                <div class="label">Mensagem publicada <br/><small><i>( Defina um mensagem de até 100 caracteres )</i></small></div>
                                                <input type="text" name="mensagemPublicada" value="<?php echo $get_tipoPesquisa->mensagemPublicada ?>" maxlength="100" class="form-control"  placeholder="Defina uma mensagem" required  />
                                            </div>

                                            <div class="form-group col-12 mb-0">
                                                <div class="label">Status <br/><small><i>( Defina se está ativa ou inativa )</i></small></div>
                                                <label class="switch">
                                                    <input type="checkbox" name="statusTipoPesquisa" value="1"  <?php if($get_tipoPesquisa->statusTipoPesquisa == 1){ echo 'checked'; } ?>>
                                                    <div class="slider round"></div>
                                                </label>
                                            </div>
                                            <input type="hidden" name="form" value="dados" required  />
                                        </div>
                                    </fieldset>
                                </div>                      
                            </form>
                        </div>
                    </div>
               
                    <div class="contain-container col-12 py-4">
                        <div class="row">
                            <div class="col-12 col-md-9">
                                <div class="label  "> Questões padrão para o tipo de pesquisa </div> 
                            </div>
                            <div class="col-12 col-md-3 text-right">
                                <button class="btn btn-theme novaquestao  " > Nova questão </button>
                            </div>
                        </div>
                    </div>

             
                    <div class="col-12 clearfix" id="questoes"> </div>

            </div>   
             
             

            <!--   -->
            <div class="footer-form bg-grey-md2 "> 
                <a href="<?php echo base_url() ?>/dashboard/configuracoes/" class="btn" >Sair</a>
                <button type="button" id="btnsalvar" class="btn btn-theme" >Salvar</button>
            </div>

        </div>

        <div class="" id="rot-editaquestoes"></div>
        <div class="" id="rot-novaquestao"></div>