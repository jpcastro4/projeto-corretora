 
        
        <div class="col-md-8  bg-grey-md1 relative height-100">
            <div class="row align-items-center">
                <div class="head header-contain pd-20">
                     
                    <div class="col-xs-12 ">
                        <h1 class="title title-2 text-xs-center"> <?php echo $pg_nivel_2 ?> </h1>
                    </div>
                     
                </div>
            </div>
            <div class="row">
                
                <div class="contain-container-short mt-3">
                    <div class="col-sm-12 ">
                        <div class="contain-card px-2 py-3 block-md">
                        
                            <form action="" method="post" >
                                <fieldset class="form-group">
                                    <div class="form-group col-xs-12">
                                    <input type="text" name="usuarioNome" class="form-control " placeholder="Nome" required />
                                    </div>
                                    <div class="form-group col-xs-12">
                                    <input type="text" name="usuarioEmail" class="form-control " placeholder="E-mail" required />
                                    </div>
                                    <div class="form-group col-xs-12">
                                    <input type="text" name="usuarioSenha" class="form-control " placeholder="Senha" required />
                                    </div>
                                </fieldset>
                                <input type="hidden" name="form" value="novo-usuario" required />
                            </form>

                        </div>
                        
                    </div>

                </div>
            </div>

            <div class="footer-form bg-grey-md2 ">
                <button type="button" id="btnsalvar" class="btn btn-theme pull-right"> Salvar </button>
                <button type="button" class="btn btn-link pull-right"> Cancelar </button>
                 
            </div>

        </div>

