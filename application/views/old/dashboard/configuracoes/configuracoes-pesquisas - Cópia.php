 
        
        <div class="col-12 col-md-7 col-lg-8 bg-grey-md1 relative height-100">
            <div class="row align-items-center head header-contain pd-20 hidden-sm-down ">
                <div class="col-12 ">
                    <h1 class="title title-2 text-center"> <?php echo $pg_nivel_2 ?> </h1>
                </div>
            </div>
            <div class="row py-4 mb-5">
                <div class="contain-container ">
                    <div class="col-12 ">
                        <form action="" method="post" >
                        <div class="contain-card p-4 block-md mb-4">
                            <fieldset class="clearfix">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="label">Status da pesquisa</div>
                                        <label >
                                            <input type="radio" value="0" class="option-input radio" name="pesquisaStatus"   /> Em edição
                                        </label>
                                        <label >
                                            <input type="radio" value="1" class="option-input radio" name="pesquisaStatus"   /> Em campo
                                        </label>
                                        <label >  
                                            <input type="radio" value="2" class="option-input radio" name="pesquisaStatus"  /> Finalizada
                                        </label>
                                    </div> 
                                </div>
                            </fieldset>
                        </div>
                        <div class="contain-card p-4 block-md mb-4">
                            <?php //var_dump($pesquisa); ?>
                            <fieldset class="form-group mb-0">
                                <div class="row">
                                    <div class="form-group col-12 mb-4">
                                        <div class="label">Tipo de pesquisa <br/><small><i>( Defina um nome de até 20 caracteres )</i></small></div>
                                        <input type="text" name="pesquisaTipo" value="" maxlength="20" class="form-control"  placeholder="Defina um nome" required  />
                                    </div>
                                     
                                    <div class="form-group col-12">
                                        <div class="label">Tipo de pesquisa</div>
                                        <label >
                                            <input type="radio" value="1" class="option-input radio" name="pesquisaTipo"  /> Eleitoral
                                        </label>
                                        <label >
                                            <input type="radio" value="2" class="option-input radio" name="pesquisaTipo" /> Mercado
                                        </label>
                                    </div>

                                    <input type="hidden" name="form" value="dados" required  />

                                    <div class="form-group col-12 mb-0">
                                        <div class="label">Status <br/><small><i>( Defina se está ativa ou inativa )</i></small></div>
                                        <label class="switch">
                                            <input type="checkbox" name="statusTipoPesquisa" value="1" >
                                            <div class="slider round"></div>
                                        </label>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <?php //if( $pesquisa->pesquisaStatus == 2 ):?>
                        <div class="contain-card p-4 block-md">
                            <fieldset class="clearfix">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="label">Autorizar e-mail para acesso</div>
                                        <input type="email" name="emailAutorizado" class="form-control"  placeholder="Digite um e-mail válido" />
                                    </div> 
                                </div>
                            </fieldset>
                        </div>
                        <?php //endif; ?>
                        
                        </form>
                    </div>

                </div>
            </div>

            <div class="footer-form bg-grey-md2 mt-5">
                <button type="button" class="btn btn-link "> Cancelar </button>
                <button type="button" id="btnsalvar" data-destino="<?php echo base_url() ?>dashboard/configuracoes/pesquisas" class="btn btn-theme "> Salvar </button>
            </div>

        </div>

