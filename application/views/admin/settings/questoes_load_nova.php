<div class="modal fade" id="novaquestao" tabindex="-1" role="dialog" aria-labelledby="novoEstado" aria-hidden="true">
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
                        <p class="modal-alert"> </p>
                            <fieldset class="form-group">
                            <div class="form-group col-xs-12">
                                <input type="text" name="questaoEnunciado" class="form-control clear"  placeholder="Digite o enunciado da questão" required  />
                            </div>
                                
                            <div class="form-group col-xs-12">
                                <div class="label">Qual o tipo da questão?</div> 
                                <label >
                                    <input type="radio" value="1" id="unica" class="option-input radio clear" name="tipoResposta" /> Estimulada Única
                                    
                                </label>
                                <label >
                                    <input type="radio" value="2" id="multipla" class="option-input radio clear"  name="tipoResposta" /> Estimulada Mútipla
                                </label>
                                <label >
                                    <input type="radio" value="3" id="espontanea" class="option-input radio clear" name="tipoResposta" /> Espontânea
                                </label>
                            </div>
                            <div class="form-group col-xs-12" id="alternativas" style="display: none">
                                <div class="rot-alternativas col-xs-12">
                                <div class="label">Adicione as alternativas da questão</div>
                                    <div class="col-xs-12 alternativas" id="insert-alt">
                                    </div>
                                </div>
                                <div class="col-xs-12 py-2">
                                    <span class="button-add-alt" id="add-alt">+</span>
                                </div>
                            </div>

                            <input type="hidden" name="pesquisaID" value="<?php echo $pesquisaID ?>" required  />
                            <input type="hidden" name="form" value="dados" required  />
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