
        <!-- MODAL DESMEMBRADO SALVA PESQUISA -->
        <div class="modal fade"  id="nova" tabindex="-1" role="dialog" aria-labelledby="novoPequisa" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form action="" method="post" >
                    <div class="modal-header">
                        <h5 class="modal-title pull-left"> Nova pesquisa </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="modal-alert"> O título será inserido na capa e cabeçalho dos relatórios. </p>

                            <fieldset class="form-group">
                                <div class="form-group col-xs-12">
                                    <input type="text" name="pesquisaNome" class="form-control" placeholder="Dê um titulo para a pesquisa" required />
                                </div>
                                <input type="hidden" name="form" value="novo" >                            
                            </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="novapesquisa" class="btn btn-theme">Salvar</button>
                        <button type="button" class="btn btn-link" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>



    </div>
</div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dashboard/lib/noty.css" />
    <script src="<?php echo base_url()?>assets/dashboard/lib/noty.js"></script>


    <!-- <script src="<?php echo base_url();?>assets/bo/assets/js/jquery.countdown.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/ajuda/jquery.ui.touch-punch.min.js"></script> -->

    <script type="text/javascript">

    var app = {


        news: function(message,typeNews){

            new Noty({                        
                        text: message,
                        layout: 'topRight',
                        type: typeNews,
                        timeout : '2000',
                        theme: 'metroui',
                        modal: true,
                        progressBar: false,
                    }).show();
        }
    }
      
      $(document).ready(function(){

            <?php if(isset($mensagem) ):  ?>
            app.news('<?php echo $mensagem;?>','success')
            <?php endif;?>

            <?php if(isset($mensagem_erro)):  ?>
            app.news('<?php echo $mensagem;?>','error')
            <?php endif;?>

        setTimeout(function() {
            $(".alert-fadeout").fadeOut();
        }, 3000);


        <?php if(!empty($pg_coletores)):?>

        $('.homologa').on('click', function(event){

            $('.preloader').fadeIn(400).show();

            var deviceID = $(this).find('input').attr('data-deviceid'),
                coletorStatus = $(this).find('input').attr('data-coletorstatus')

                $.post('<?php echo base_url("ajax_functions/autorizaColetor")?>', {deviceID:deviceID,coletorStatus:coletorStatus } , function(data){
                    
                    console.log(  );

                    if(data.result == 'success'){
                        window.location.reload()
                    }

                    if(data.result == 'error'){

                        app.news(data.message,'error')
                    }
                    
                },'json')
               .fail(function(data){
                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
                    console.log(data.responseText);

               });


            $('.preloader').fadeOut();
            console.log('FIM');
                
        });

        <?php endif;?>
        <?php if(!empty($form_save)): ?>

            $('#btnsalvar').on('click' ,function(event){

                $('.preloader').fadeIn(400).show();
                var valid = true;

                var form = $('form');               

                form.find('[required]').each(function(e){
                    if ( $(this).val() == '' )
                    {
                        //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                        $(this).css('border-color','red');
                        valid = false;
                        return;
                    } 
                });


                if(valid == false){
                    $('.preloader').fadeOut();
                    console.log('FAIL');
                    app.news('Confira os campos','error')
                    event.preventDefault();
                    return;
                };

                form.submit();

                $('.preloader').fadeOut();
                console.log('SUCCESS');
                
            });

            $('#local').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var rotulo = button.data('rotulo') // Extract info from data-* attributes
              var tipo   = button.data('tipo')
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this)

                modal.find('.modal-title').text(rotulo.title)
                modal.find('.modal-alert').text(rotulo.aviso)

                if(tipo == 'editar'){
                    modal.find('.modal-content form').append('<input type="hidden" name="editarID" id="editar-id" />')
                    modal.find('.modal-content form input#editar-id').val(rotulo.ideditar)
                }

                if(tipo == 'novo'){
                    modal.find('.modal-content form').append('<input type="hidden" id="novo" name="novo" value="novo-estado" required />')
                }
            })

            $('#local').on('hidden.bs.modal', function (e) {
                 
                 $('#novo').remove()
                 $('#editar').remove()
            })

        <?php endif; ?>

            $('#nova').on('click','#novapesquisa' ,function(event){

                $('.preloader').fadeIn(400).show();
                var valid = true;

                var form = $('#nova form'),
                    button = $(this)              

                form.find('[required]').each(function(e){
                    if ( $(this).val() == '' )
                    {
                        //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                        $(this).css('border-color','red')
                        valid = false
                        return
                    } 
                });

                // console.log( form.serialize() )
                // return

                if(valid == false){
                    $('.preloader').fadeOut()
                    console.log('FAIL')
                    app.news('Confira os campos','error')
                    event.preventDefault()
                    return
                }

                $.post('<?php echo base_url("ajax_functions/salvaPesquisa")?>', form.serialize(), function(data){
                    
                    console.log(  );

                    if(data.result == 'novo'){

                        window.location.href = data.redirect
                    }


                    if(data.result == 'success'){

                        window.location.href = button.data('destino')
                    }

                    if(data.result == 'error'){
                        console.log(data);
                        app.news(data.message,'error')
                    }
                    
                },'json')
                .fail(function(data){
                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
                    console.log(data.responseText);

                });

                $('.preloader').fadeOut();
                console.log('SUCCESS');
                
            });

        <?php if(!empty($form_save_pesquisa)): ?>

            /////////////////////////////////////////////////// PESQUISAS

            $('#btnsalvar').on('click' ,function(event){

                $('.preloader').fadeIn(400).show();
                var valid = true;

                var form = $('form'),
                    button = $(this)              

                form.find('[required]').each(function(e){
                    if ( $(this).val() == '' )
                    {
                        //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                        $(this).css('border-color','red')
                        valid = false
                        return
                    } 
                });

                // console.log( form.serialize() )
                // return

                if(valid == false){
                    $('.preloader').fadeOut()
                    console.log('FAIL')
                    app.news('Confira os campos','error')
                    event.preventDefault()
                    return
                }

                $.post('<?php echo base_url("ajax_functions/salvaPesquisa")?>', form.serialize(), function(data){
                    
                    console.log(  );

                    if(data.result == 'novo'){

                        window.location.href = data.redirect
                    }


                    if(data.result == 'success'){

                        window.location.href = button.data('destino')
                    }

                    if(data.result == 'error'){
                        console.log(data);
                        app.news(data.message,'error')
                    }
                    
                },'json')
                .fail(function(data){
                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
                    console.log(data.responseText);

                });

                $('.preloader').fadeOut();
                console.log('SUCCESS');
                
            });


            $('#btnsalvarecontinuar').on('click',function(event){

                $('.preloader').fadeIn(400).show()
                var valid = true

                var form = $('form'),
                    button = $(this)               

                form.find('input[required]').each(function(e){
                    
                    if ( $(this).val() == '' )
                    {
                        //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                        $(this).css('border-color','red')
                        valid = false
                        return
                    }

                   

                });

                // form.find('input:radio').each(function(e){

                //     //alert( $(this).is(':checked') )

                //     if(  $(this).val() != '' && $(this).is(':checked') == true ){ 
                        
                //         return false;

                //     }else{

                //         valid = false;
                //         return;
                //     }
                // });

                // form.find('input:checkbox').each(function(e){

                //     alert( $(this).prop('checked') )

                //     if( $(this).prop('checked') != 'checked' ){ 

                //         valid = false;
                //         return;
                //     }
                // });


                if(valid == false){
                    $('.preloader').fadeOut();
                    alert('Campos vazios ');
                    event.preventDefault();
                    return;
                };

                //AO INVES DE SUBMITAR O FORM VAMOS FAZER UM AJAX

                $.post('<?php echo base_url("ajax_functions/salvaPesquisa")?>', form.serialize(), function(data){
                    
                    console.log(  );

                    if(data.result == 'success'){
                        //
                        //alert(data.message);
                        window.location.href = button.data('destino')
                    }

                    if(data.result == 'error'){
                        console.log(data);
                        app.news(data.message,'error')
                    }
                    
                },'json')
               .fail(function(data){
                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
                    console.log(data.responseText);

               });


                $('.preloader').fadeOut();
                console.log('FIM');
                
            });

        <?php endif; ?>

        <?php if(!empty( $form_questoes ) ): ?>

            /////////////////////////////////////////////////// QUESTOES
            function novaalternativa(tipo){

            	var liberado = 0

            	if( contaelementos() > 0 ){

            		$('#alternativas').find('.inside-create').each(function(){

	            		if( $(this).val() == '' ){

	            			liberado++
	            			$(this).focus()
	            		}
	            	})
            	}

            	if( liberado == 0 ){

            		var html = '<label class="col-xs-12"><input type="'+tipo+'" disabled class="option-input disabled '+tipo+' clear"  /><input class="inside-create" name="add[]" placeholder="Insira a alternativa"/> <i class="fa fa-trash lixo"></i> </label> '

	                $('#insert-alt').append(html)

	                procuravazios()
            	}

            }

            function procuravazios(){
            	$('#alternativas').find('.inside-create').each(function(){

	            	if( $(this).val() == '' ){

	            		$(this).focus()
	            	}
	            })
            }

            function unicaescolha(){

                $('#alternativas').show()
                $('#add-alt').attr('data-tipo','radio')

                novaalternativa('radio')

            }

            function multiplaescolha(){

                $('#alternativas').show()
                $('#add-alt').attr('data-tipo','checkbox')

                novaalternativa('checkbox')

            }

            function mudatipo(tipo,classe){
            	$('#add-alt').attr('data-tipo',tipo)
                $('#alternativas .option-input').attr('type',tipo).removeClass(classe).addClass(tipo)
            }

            function contaelementos(){

                var count = $('#alternativas .option-input').length
                return count
            }



            //NOVAS QUESTOES 

            $('.novaquestao').on('click', function(){ //

            	$('#rot-editaquestoes').html('')

            	$('#rot-novaquestao').load('<?php echo base_url("dashboard/pesquisas_load_questao_nova/{$pesquisa->pesquisaID}")?>', function( response, status, xhr){

            		$('#novaquestao').modal('show')
            	})
            })

            $('#rot-novaquestao').on('click', 'input#unica', function(){

                if( contaelementos() > 0 ){
                    mudatipo('radio','checkbox')
                }else{
                    unicaescolha()
                }
                
            })

            $('#rot-novaquestao').on('click','input#multipla', function(){
                
                if( contaelementos() > 0 ){
                    mudatipo('checkbox','radio')

                }else{
                    multiplaescolha()
                }
            })

            $('#rot-novaquestao').on('click','input#espontanea', function(){
                                
                $('#alternativas').fadeOut()
                $('#insert-alt').html('')
            })

            $('#rot-novaquestao').on('click','#add-alt', function(){

                if($(this).attr('data-tipo') == 'radio'){

                    unicaescolha()
                }

                if($(this).attr('data-tipo') == 'checkbox'){
                    multiplaescolha()
                }
            })

            $('#rot-novaquestao').on('click', '#alternativas .lixo', function(){
	            
	            $(this).parent('label').remove()
	        })


            $('#questoes').load('<?php echo base_url("dashboard/pesquisas_questoes_load/{$pesquisa->pesquisaID}")?>');

            

            $('#rot-novaquestao').on('click', '#btnsalvar', function(event){

                $('.preloader').fadeIn(400).show();
                var form = $('form')
                var campos = $('.modal form').serialize()
                var valid = true;
     

                form.find('input[required]').each(function(e){
                    
                    if ( $(this).val() == '' )
                    {
                        //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                        $(this).css('border-color','red');
                        valid = false;
                        return;
                    }

                });

               
                if(valid == false){
                    $('.preloader').fadeOut();
                    app.news('Campos vazios','error')
                    event.preventDefault();
                    return;
                };

                //AO INVES DE SUBMITAR O FORM VAMOS FAZER UM AJAX

                $.post('<?php echo base_url("ajax_functions/salvaQuestao")?>', campos , function(data){
                    
                    console.log(data)

                    if(data.result == 'success'){
                    	$('#novaquestao').modal('hide')
                    	$('#novaquestao').on('hidden.bs.modal', function (e) {
						  	// $('#alternativas').fadeOut()
         					// $('#insert-alt').html('')
                			$('#questoes').load('<?php echo base_url("dashboard/pesquisas_questoes_load/{$pesquisa->pesquisaID}")?>');
						})
                        app.news(data.message,'success')
                    }

                    if(data.result == 'error'){

                        app.news(data.message,'error')
                    }
                    
                },'json')
               .fail(function(data){
                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
                    console.log(data.responseText);
               });

                $('.preloader').fadeOut();                
            });


            //////////////////////////// /////////// /////////
            /////////////////  EDITA QUESTOES  ///////////////
            //////////////////////////////////////////////////



            $('#questoes').on('click','.editaquestao', function(){ //

            	$('#rot-novaquestao').html('')

            	var idquestao = $(this).data('idquestao')

            	$('#rot-editaquestoes').load('<?php echo base_url("dashboard/pesquisas_load_questao_edita")?>/', {questaoid : idquestao}, function( response, status, xhr){

            		$('#editaquestao').modal('show')
            	})
            })

    //         $('#editaquestao').on('show.bs.modal', function (event) {

    //         	var button = $(event.relatedTarget) 
				// var questaoid = button.data('idquestao')
				  
				// var modal = $(this)
			
				// modal.find('#questaoid').val(questaoid)

				// $.post('<?php echo base_url("ajax_functions/getQuestao")?>/', {questaoid : questaoid } , function(data){
                    
    //                 if(data.result == 'success'){
                        
    //                     console.log(data)
    //                 }

    //                 if(data.result == 'error'){

    //                     console.log(data);

    //                     app.news(data.mensagem,'error')
    //                 }
                    
    //             },'json')
    //            .fail(function(data){

    //                 app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
    //                 console.log(data.responseText);

    //            });

    //         })


            $('#rot-editaquestoes').on('click', 'input#unica', function(){

                if( contaelementos() > 0 ){
                    mudatipo('radio','checkbox')
                }else{
                    unicaescolha()
                }
                
            })

            $('#rot-editaquestoes').on('click','input#multipla', function(){
                
                if( contaelementos() > 0 ){
                    mudatipo('checkbox','radio')
                }else{
                    multiplaescolha()
                }
            })

            $('#rot-editaquestoes').on('click','input#espontanea', function(){
                                
                $('#alternativas').fadeOut()
                //ao inves de remover vamos atribuir delete as alternativas
                //$('#insert-alt').html('')
            })

            $('#rot-editaquestoes').on('click','#add-alt', function(){

            	var tipo = $(this).attr('data-tipo')

                if( tipo == 'radio'){
                    unicaescolha()
                }

                if( tipo  == 'checkbox'){
                    multiplaescolha()
                }
            })

            $('#rot-editaquestoes').on('click', '#alternativas .lixo', function(){

            	var t = $(this)
            	
            	var idresposta = t.parent('label').find('input.inside-create').attr('data-idresposta')
	            //ao inves de remover vamos atribuir delete a alternativa e ocular fadeout()
	            if( t.parent().find('input.inside-create').val()== '' ){

	            	t.parent('label').remove()

	            }else{

	            	t.parent('label').hide().find('input.inside-create').attr({'name':'remove[]','value':idresposta})
	            }

	        })

            $('#rot-editaquestoes').on('click', '#btnsalvar', function(event){

                $('.preloader').fadeIn(400).show()

                var form = $('form')
                var campos = $('.modal form').serialize()
                var valid = true;

                form.find('input[required]').each(function(e){
                    
                    if ( $(this).val() == '' )
                    {
                        //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                        $(this).css('border-color','red')
                        valid = false
                        return
                    }
                });

                if(valid == false){
                    $('.preloader').fadeOut()
                    app.news('Campos vazios','error')
                    event.preventDefault()
                    return
                };

                //AO INVES DE SUBMITAR O FORM VAMOS FAZER UM AJAX

                $.post('<?php echo base_url("ajax_functions/editaQuestao")?>', campos , function(data){
                    
                    //console.log(data)

                    if(data.result == 'success'){
                    	$('#editaquestao').modal('hide')
                    	$('#editaquestao').on('hidden.bs.modal', function (e) {
                			$('#questoes').load('<?php echo base_url("dashboard/pesquisas_questoes_load/{$pesquisa->pesquisaID}")?>');
						})
                        app.news(data.message,'success')
                    }

                    if(data.result == 'error'){
                        app.news(data.message,'error')
                    }
                    
                },'json')
               .fail(function(data){
                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
                    console.log(data.responseText)

               })

                $('.preloader').fadeOut()              
            })

        <?php endif; ?>

        <?php if(!empty( $pg_coletores ) ): ?>


            $('.excluircoletor').on('click', function(e){

                e.preventDefault()

                var vinculoID = $(this).attr('data-excluir')

                $.post('<?php echo base_url("ajax_functions/excluirColetor")?>', {vinculoID:vinculoID}, function(data){
                    
                    //console.log(data)

                    if(data.result == 'success'){

                        app.news(data.message,'success')
                    }

                    if(data.result == 'error'){
                        app.news(data.message,'error')
                    }
                    
                },'json')
               .fail(function(data){
                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
                    console.log(data.responseText)

               })
            })

        <?php endif; ?>

        <?php if(!empty( $pg_novocoletor ) ): ?>
            //VINCULO DE COLETORES

            function contaVinculos(){

                var count = $('.vinculo').length
                return count

            }

            $('#novolocal').on('click', function(e){

                e.preventDefault();

                var original = $('.vinculo').last(),
                    $cloned = original.clone(),
                    newRowNum = contaVinculos()+1,
                    originalSelects = original.find('select')
                
               
                $cloned.find('select').each(function(index, item) {
                    //set new select to value of old select
                    $(item).val( originalSelects.eq(index).val() ) 
                });

                var originalInputs = original.find('input');
 
                $cloned.find('input').each(function(index, item) {
                    //set new textareas to value of old textareas
                    $(item).val( originalInputs.eq(index).val() );
                });


                original.after($cloned)

                $('form').find('.vinculo').last().each( function(){
                    $(this).attr('data-local',newRowNum)
                    $(this).find('.estadoid').attr('name','add_vinculo['+newRowNum+'][estadoID]')
                    $(this).find('.cidadeid').attr('name','add_vinculo['+newRowNum+'][cidadeID]')
                    $(this).find('.bairrocomuid').attr('name','add_vinculo['+newRowNum+'][bairroComuID]').focus()
                    $(this).find('.nummincoletas').attr('name','add_vinculo['+newRowNum+'][numMinColetas]')
                    $(this).find('.rot-close').html('<i class="fa fa-close remover"></i>')
                })

                $('.max-height90').animate({
                    scrollTop: $('.max-height90').height()
                }, 1000)

            })

            $('form').on('change', '.estadoid', function(){

                var cidadeSelect = $(this).parents('.vinculo').find(' .cidadeid')

                cidadeSelect.html('<option disabled selected value="" > - Cidade - </option>')

                $.post('<?php echo base_url("ajax_functions/cidades_load/") ?>', {estadoID:$(this).val() }, function(data){

                    if(data != false){

                        //console.log( JSON.stringify(data) )

                        $.each(data,function(index,item){

                            console.log(item)

                            cidadeSelect.append('<option value="'+item.cidadeID+'" > '+item.cidadeNome+' </option>')

                        })
                        
                    }else{

                        cidadeSelect.append('<option value="" disabled > Cadastre a cidade </option>') 
                    }
                    

                },'json')
                .fail(function(data){
                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
                    console.log(data.responseText)
                })
            })

            $('form').on('change', '.cidadeid', function(){

                var bairroComuSelect = $(this).parents('.vinculo').find('.bairrocomuid')

                bairroComuSelect.html('<option disabled selected value="" > - Bairro/Comu/Região - </option>      ')

                $.post('<?php echo base_url("ajax_functions/bairrosComu_load/") ?>', {cidadeID:$(this).val() }, function(data){

                    if(data != false){

                        $.each(data,function(index,item){

                            console.log(item)

                            bairroComuSelect.append('<option value="'+item.bairroComuID+'" > '+item.bairroComuNome+' </option>')

                        })
                        
                    }else{

                        bairroComuSelect.append('<option value="" disabled > Cadastre o bairro </option>') 
                    }
                    

                },'json')
                .fail(function(data){
                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
                    console.log(data.responseText)
                })
            })

            $('form').on('change', '.bairrocomuid', function(){

                $(this).css('background','none')

                var form = $('form'),
                    thisbairro = $(this),
                    conta = ''

                form.find('.bairrocomuid').each(function(){

                    if( $(this).val() == thisbairro.val() ){

                        conta++
                    }
                })

                if(conta > 1){
                    $(this).css('background','#facfce')
                    app.news('Não repita o bairro.','error')
                    
                }
            })


            $('form').on('click', '.remover', function(){
                $(this).parents('.vinculo').remove()
            })

            $('form').on('click', '.excluir', function(){

                var coletorLocalID = $(this).attr('data-coletorlocalid')
                
                $(this).parents('.vinculo').find('.estadoid').attr('name','remove_vinculo['+coletorLocalID+'][estadoID]')
                $(this).parents('.vinculo').find('.cidadeid').attr('name','remove_vinculo['+coletorLocalID+'][cidadeID]')
                $(this).parents('.vinculo').find('.bairrocomuid').attr('name','remove_vinculo['+coletorLocalID+'][bairroComuID]')
                $(this).parents('.vinculo').find('.nummincoletas').attr('name','remove_vinculo['+coletorLocalID+'][numMinColetas]')

                $(this).parents('.vinculo').fadeOut().removeClass('vinculo')
            })


            $('#btnsalvar').on('click', function(event){
                event.preventDefault()

                $('.preloader').fadeIn(400).show()

                var form = $('form'),
                    valid = true,
                    bairros = false

                form.find('input[required]').each(function(e){
                    
                    if ( $(this).val() == '' )
                    {
                        //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                        $(this).addClass('message-error')
                        app.news('Campos vazios','error')
                        valid = false
                        return
                    }
                });

                form.find('.vinculo .bairrocomuid').each(function(e){

                    $(this).removeClass('message-error')

                    var form = $('form'),
                        thisbairro = $(this).val(),
                        conta = 0
                        

                    form.find('.vinculo .bairrocomuid').each(function(){

                        if( $(this).val() === thisbairro ){
                            conta++
                        }
                    })

                    if(conta > 1){
                        $(this).addClass('message-error')
                        valid = false
                        bairros = true
                    }
                    
                })

                if(bairros){
                    app.news('Não duplique bairros','error')
                }

                if(valid == false){
                    $('.preloader').fadeOut()
                    app.news('Verifique os campos','error')
                    return
                };

                $.post('<?php echo base_url("ajax_functions/novo_coletor") ?>', form.serialize() , function(data){

                    if( data.result == 'success'){

                        window.location.href = data.redirect
                    }

                },'json')
                .fail(function(data){
                    console.log(data.responseText)

                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
                })

                // $(form).submit()

                $('.preloader').fadeOut()              
            })


        <?php endif; ?>

        <?php if(!empty( $form_questoes_config ) ): ?>

            /////////////////////////////////////////////////// QUESTOES
            function novaalternativa(tipo){

                var liberado = 0

                if( contaelementos() > 0 ){

                    $('#alternativas').find('.inside-create').each(function(){

                        if( $(this).val() == '' ){

                            liberado++
                            $(this).focus()
                        }
                    })
                }

                if( liberado == 0 ){

                    var html = '<label class="col-xs-12"><input type="'+tipo+'" disabled class="option-input disabled '+tipo+' clear"  /><input class="inside-create" name="add[]" placeholder="Insira a alternativa"/> <i class="fa fa-trash lixo"></i> </label>'

                    $('#insert-alt').append(html)

                    procuravazios()
                }

            }

            function procuravazios(){
                $('#alternativas').find('.inside-create').each(function(){

                    if( $(this).val() == '' ){

                        $(this).focus()
                    }
                })
            }

            function unicaescolha(){

                $('#alternativas').show()
                $('#add-alt').attr('data-tipo','radio')

                novaalternativa('radio')

            }

            function multiplaescolha(){

                $('#alternativas').show()
                $('#add-alt').attr('data-tipo','checkbox')

                novaalternativa('checkbox')

            }

            function mudatipo(tipo,classe){
                $('#add-alt').attr('data-tipo',tipo)
                $('#alternativas .option-input').attr('type',tipo).removeClass(classe).addClass(tipo)
            }

            function contaelementos(){

                var count = $('#alternativas .option-input').length
                return count
            }



            //NOVAS QUESTOES 

            $('.novaquestao').on('click', function(){ //

                $('#rot-editaquestoes').html('')

                $('#rot-novaquestao').load('<?php echo base_url("dashboard/config_pesquisas_load_questao_nova/{$get_tipoPesquisa->tipoPesquisaID}")?>', function( response, status, xhr){

                    $('#novaquestao').modal('show')
                })
            })

            $('#rot-novaquestao').on('click', 'input#unica', function(){

                if( contaelementos() > 0 ){
                    mudatipo('radio','checkbox')
                }else{
                    unicaescolha()
                }
                
            })

            $('#rot-novaquestao').on('click','input#multipla', function(){
                
                if( contaelementos() > 0 ){
                    mudatipo('checkbox','radio')

                }else{
                    multiplaescolha()
                }
            })

            $('#rot-novaquestao').on('click','input#espontanea', function(){
                                
                $('#alternativas').fadeOut()
                $('#insert-alt').html('')
            })

            $('#rot-novaquestao').on('click','#add-alt', function(){

                if($(this).attr('data-tipo') == 'radio'){

                    unicaescolha()
                }

                if($(this).attr('data-tipo') == 'checkbox'){
                    multiplaescolha()
                }
            })

            $('#rot-novaquestao').on('click', '#alternativas .lixo', function(){
                
                $(this).parent('label').remove()
            })


            $('#questoes').load('<?php echo base_url("dashboard/config_pesquisas_questoes_load/{$get_tipoPesquisa->tipoPesquisaID}")?>');

            

            $('#rot-novaquestao').on('click', '#btnsalvar', function(event){

                $('.preloader').fadeIn(400).show();
                var form = $('form')
                var campos = $('.modal form').serialize()
                var valid = true;
     

                form.find('input[required]').each(function(e){
                    
                    if ( $(this).val() == '' )
                    {
                        //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                        $(this).css('border-color','red');
                        valid = false;
                        return;
                    }

                });

               
                if(valid == false){
                    $('.preloader').fadeOut();
                    app.news('Campos vazios','error')
                    event.preventDefault();
                    return;
                };

                //AO INVES DE SUBMITAR O FORM VAMOS FAZER UM AJAX

                $.post('<?php echo base_url("ajax_functions/configSalvaQuestao")?>', campos , function(data){
                    
                    console.log(data)

                    if(data.result == 'success'){
                        $('#novaquestao').modal('hide')
                        $('#novaquestao').on('hidden.bs.modal', function (e) {
                            // $('#alternativas').fadeOut()
                            // $('#insert-alt').html('')
                            $('#questoes').load('<?php echo base_url("dashboard/config_pesquisas_questoes_load/{$get_tipoPesquisa->tipoPesquisaID}")?>');
                        })
                        app.news(data.message,'success')
                    }

                    if(data.result == 'error'){

                        app.news(data.message,'error')
                    }
                    
                },'json')
               .fail(function(data){
                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
                    console.log(data.responseText);
               });

                $('.preloader').fadeOut();                
            });


            //////////////////////////// /////////// /////////
            /////////////////  EDITA QUESTOES  ///////////////
            //////////////////////////////////////////////////



            $('#questoes').on('click','.editaquestao', function(){ //

                $('#rot-novaquestao').html('')

                var idquestao = $(this).data('idquestao')

                $('#rot-editaquestoes').load('<?php echo base_url("dashboard/config_pesquisas_load_questao_edita")?>/', {questaoid : idquestao}, function( response, status, xhr){

                    $('#editaquestao').modal('show')
                })
            })

    //         $('#editaquestao').on('show.bs.modal', function (event) {

    //          var button = $(event.relatedTarget) 
                // var questaoid = button.data('idquestao')
                  
                // var modal = $(this)
            
                // modal.find('#questaoid').val(questaoid)

                // $.post('<?php echo base_url("ajax_functions/getQuestao")?>/', {questaoid : questaoid } , function(data){
                    
    //                 if(data.result == 'success'){
                        
    //                     console.log(data)
    //                 }

    //                 if(data.result == 'error'){

    //                     console.log(data);

    //                     app.news(data.mensagem,'error')
    //                 }
                    
    //             },'json')
    //            .fail(function(data){

    //                 app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
    //                 console.log(data.responseText);

    //            });

    //         })


            $('#rot-editaquestoes').on('click', 'input#unica', function(){

                if( contaelementos() > 0 ){
                    mudatipo('radio','checkbox')
                }else{
                    unicaescolha()
                }
                
            })

            $('#rot-editaquestoes').on('click','input#multipla', function(){
                
                if( contaelementos() > 0 ){
                    mudatipo('checkbox','radio')
                }else{
                    multiplaescolha()
                }
            })

            $('#rot-editaquestoes').on('click','input#espontanea', function(){
                                
                $('#alternativas').fadeOut()
                //ao inves de remover vamos atribuir delete as alternativas
                //$('#insert-alt').html('')
            })

            $('#rot-editaquestoes').on('click','#add-alt', function(){

                var tipo = $(this).attr('data-tipo')

                if( tipo == 'radio'){
                    unicaescolha()
                }

                if( tipo  == 'checkbox'){
                    multiplaescolha()
                }
            })

            $('#rot-editaquestoes').on('click', '#alternativas .lixo', function(){

                var t = $(this)
                
                var idresposta = t.parent('label').find('input.inside-create').attr('data-idresposta')
                //ao inves de remover vamos atribuir delete a alternativa e ocular fadeout()
                if( t.parent().find('input.inside-create').val()== '' ){

                    t.parent('label').remove()

                }else{

                    t.parent('label').hide().find('input.inside-create').attr({'name':'remove[]','value':idresposta})
                }

            })

            $('#rot-editaquestoes').on('click', '#btnsalvar', function(event){

                $('.preloader').fadeIn(400).show()

                var form = $('form')
                var campos = $('.modal form').serialize()
                var valid = true;

                form.find('input[required]').each(function(e){
                    
                    if ( $(this).val() == '' )
                    {
                        //Materialize.toast('Field '+$(this).attr('title')+' can not be empty' , 5000);
                        $(this).css('border-color','red')
                        valid = false
                        return
                    }
                });

                if(valid == false){
                    $('.preloader').fadeOut()
                    app.news('Campos vazios','error')
                    event.preventDefault()
                    return
                };

                //AO INVES DE SUBMITAR O FORM VAMOS FAZER UM AJAX

                $.post('<?php echo base_url("ajax_functions/configEditaQuestao")?>', campos , function(data){
                    
                    //console.log(data)

                    if(data.result == 'success'){
                        $('#editaquestao').modal('hide')
                        $('#editaquestao').on('hidden.bs.modal', function (e) {
                            $('#questoes').load('<?php echo base_url("dashboard/config_pesquisas_questoes_load/{$get_tipoPesquisa->tipoPesquisaID}")?>');
                        })
                        app.news(data.message,'success')
                    }

                    if(data.result == 'error'){
                        app.news(data.message,'error')
                    }
                    
                },'json')
               .fail(function(data){
                    app.news('Não foi possível salvar os dados. Entre em contato com o desenvolvedor.','error')
                    console.log(data.responseText)

               })

                $('.preloader').fadeOut()              
            })

        <?php endif; ?>


      });
    </script>

  </body>
</html>