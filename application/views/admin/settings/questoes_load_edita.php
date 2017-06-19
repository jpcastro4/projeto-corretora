        <div class="modal fade" id="editaquestao" tabindex="-1" role="dialog" aria-labelledby="editaquestao" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <form action="" method="post" >
                    <div class="modal-header">
                        <h5 class="modal-title text-xs-center pull-left">Nova questão</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    <?php //var_dump($questao) ?>

                        <p class="modal-alert"> </p>
                            <fieldset class="form-group">
                            <div class="form-group col-xs-12">
                                <input type="text" name="questaoEnunciado" class="form-control clear" value="<?php echo $questao->questaoEnunciado; ?>" placeholder="Digite o enunciado da questão" required  />
                            </div>
                                
                            <div class="form-group col-xs-12">
                                <div class="label">Qual o tipo da questão?</div> 
                                <label >
                                    <input type="radio" <?php if( $questao->tipoResposta == 1 ){ echo 'checked'; } ?> value="1" id="unica" class="option-input radio clear" name="tipoResposta" /> Estimulada Única
                                    
                                </label>
                                <label >
                                    <input type="radio" <?php if( $questao->tipoResposta == 2 ){ echo 'checked'; } ?> value="2" id="multipla" class="option-input radio clear"  name="tipoResposta" /> Estimulada Mútipla
                                </label>
                                <label >
                                    <input type="radio" <?php if( $questao->tipoResposta == 3 ){ echo 'checked'; } ?> value="3" id="espontanea" class="option-input radio clear" name="tipoResposta" /> Espontânea
                                </label>
                            </div>

                             <?php  
                             switch ($questao->tipoResposta) {
                                case '1':
                                    $tipo = 'radio';
                                    break;
                                case '2':
                                    $tipo = 'checkbox';
                                    break;
                                
                                default:
                                    $tipo = '';
                                    break;
                            }  ?>

                            <div class="form-group col-xs-12" id="alternativas" <?php if( $tipo == ''){ echo 'style="display:none"'; } ?> >
                                <div class="rot-alternativas col-xs-12">
                                <div class="label">Adicione ou edite as alternativas da questão</div>
                                    <div class="col-xs-12 alternativas" id="insert-alt">
                                        <?php if(!empty($questao->alternativas) ):

                                            foreach ($questao->alternativas as $alternativa): ?>
                                                
                                                <label class="col-xs-12"><input type="<?php echo $tipo ?>" disabled class="option-input <?php echo $tipo ?> disabled clear"  /><input class="inside-create" name="alt[<?php echo $alternativa->respostaID ?>]" placeholder="Insira a alternativa" value="<?php echo $alternativa->resposta ?>" data-idresposta="<?php echo $alternativa->respostaID ?>" /> <i class="fa fa-trash lixo"></i> </label> 
                                            

                                            <?php endforeach;

                                        endif;?>  
                                    </div>
                                </div>
                                <div class="col-xs-12 py-2">
                                    <span class="button-add-alt" id="add-alt" data-tipo="<?php echo $tipo ?>">+</span>
                                </div>
                            </div>

                            <input type="hidden" name="pesquisaID" value="<?php echo $questao->pesquisaID; ?>" required  />
                            <input type="hidden" name="questaoID" id="questaoid" value="<?php echo $questao->questaoID; ?>" required  />
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

