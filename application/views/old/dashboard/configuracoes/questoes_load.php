                <div class="contain-container py-4">
                    <div class="row">
                    <div class="col-12 ">
                        <div class="contain-card p-4 block-md">
                            
                            <?php if( !empty($lista_questoes ) ):
                                foreach( $lista_questoes as $questao ): ?>
                                <div class="lista clearfix">
                                    <div class="row">
                                        <div class="col-12 col-md-10"> <div class="title"> <?php echo $questao->questaoEnunciado ?> </div></div>
                                        <div class="col-12 col-md-2"> <button  data-idquestao=" <?php echo $questao->questaoID ?>" class="btn btn-theme editaquestao pull-right">Editar </button> </div>
                                    </div>
                                </div>

                            <?php endforeach;

                            else: ?>

                                <div class="alert alert-info text-sm-center"> Não questões padrão cadastradas </div>

                            <?php endif;?>
                        </div>
                            
                    </div>
                    </div>
                </div>