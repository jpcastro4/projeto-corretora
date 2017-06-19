        <div class="col-12 bg-grey-md1 h-100">
             
            <div class="row">
                <div class="container my-4">
                    <div class="row py-4">
                            <div class="col-12 col-md-9">
                                <h1 class="contain-title">Gerais</h1>
                            </div>
                            
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="contain-card p-4">

                                <?php var_dump($this->usuario_model->config_niveis() ) ?>
                                <div class="form-group col-12">
 
                                    <div class="label mt-3"> Taxa de saque </div>
                                    <input type="text" class="form-control col-12" name="taxaSaque" value="<?php if( $configs != false ):  echo $configs->taxaSaque;  endif; ?>" />
                                    
                                    <div class="label mt-3"> Limite de cotas por usuário </div>
                                    <input type="text" class="form-control col-12" name="limiteCotas" value="<?php if( $configs != false ):  echo $configs->limiteCotas;  endif; ?>" />

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row py-4">
                            <div class="col-12 col-md-9">
                                <h1 class="contain-title">Rede</h1>
                            </div>
                            
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="contain-card p-4">
                                <div class="form-group col-12">
                                    <div class="label"> Perfil Indicação Direta </div>
                                    <select class="form-control col-12" name="perfilDiretaAtivo" >
                                            <option <?php if( $configs != false ): if($configs->perfilDiretaAtivo == 0): echo 'selected'; endif; endif; ?> > 1 </option>
                                    </select>

                                    <div class="label mt-3"> Número de pernas na rede </div>
                                    <input type="text" class="form-control col-12" name="limiteCotas" value="<?php if( $configs != false ):  echo $configs->redeNumeroPernas;  endif; ?>" />

                                </div>
                            </div>
                        </div>
                    </div>
                                               
                </div>
            </div>

        </div>
