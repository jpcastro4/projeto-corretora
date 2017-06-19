 
        
        <div class="col-md-8 bg-grey-md1 relative height-100">
            <div class="row align-items-center head header-contain pd-20">

                    <div class="col-xs-12 ">
                        <h1 class="title title-2 text-xs-center"> <?php echo $pg_nivel_2 ?> </h1>
                    </div>

            </div>

            <div class="row py-4 max-height80 ">

                <div class="contain-container ">
                    
                    <div class="row py-4">
                            <div class="col-12 col-md-9">
                                <h1 class="contain-title"> <?php echo $pesquisa->pesquisaNome ?></h1>
                            </div>
                            <div class="col-12 col-md-3">
                                <button class="btn btn-theme pull-right novaquestao"> Nova questão </button>
                            </div>
                    </div>
                
                    <div class="row" id="questoes"></div>

                </div>

            </div>


            <div class="footer-form bg-grey-md2 ">
                
                <a href="<?php echo base_url() ?>/dashboard/pesquisas/" class="btn btn-theme" >Sair</a>
                <a href="<?php echo base_url() ?>dashboard/pesquisas/p/<?php echo $pesquisa->pesquisaID; ?>/coletores"  class="btn btn-theme" >Continuar</a>

            </div>

        </div>

        <div class="" id="rot-editaquestoes"></div>
        <div class="" id="rot-novaquestao"></div>
