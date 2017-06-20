<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_functions extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('usuario_model');
    }

    public function index(){
        echo 'Not permission';
    }

   
    public function aberturaMailling($idMailling){

        $this->db->where('id',$idMailling);
        $mailling = $this->db->get('automacao')->row();

        $abertura = $mailling->aberturas;

        $this->db->where('id',$idMailling);
        $this->db->update('automacao', array( 'aberturas'=>$abertura+1 ));


    }


    public function valida_cpf( $cpf ) {
    
        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
            return FALSE;
        } else { // Calcula os números para verificar se o CPF é verdadeiro
        
            for ($t = 9; $t < 11; $t++) {
                
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return FALSE;
                }
            }
        return TRUE;
        }
    }

    public function create_account(){

        $fields = $this->input->post();

        if($fields){

            if(!in_array(NULL, $fields )){   

                if($this->input->post('usuarioSenha') != $this->input->post('repeteUsuarioSenha') ){

                    echo json_encode( array('result'=>'error','message'=>'Passwords error. Repeat' ) );
                    return;

                }

                $this->db->or_where('usuarioEmail', $fields['usuarioEmail']);
                $exists = $this->db->get('usuarios');

                if( $exists->num_rows() > 0 ){

                    echo json_encode( array('result'=>'error','message'=>'User exist','clear'=>true) );
                    return;

                }else{

                    $fieldsSave = array(
                                    'usuarioEmail'=>$fields['usuarioEmail'],
                                    'usuarioNome'=>$fields['usuarioNome'],
                                    'usuarioSobrenome'=>$fields['usuarioSobrenome'],
                                    'usuarioCelular'=>$fields['usuarioCelular'],
                                    'usuarioSenha'=> sha1($fields['usuarioSenha']),
                                    'usuarioDataCadastro'=> date('Y-m-d H:i:s'),
                                    'usuarioUltimoAcesso'=>date('Y-m-d H:i:s'),
                                    );

                    $indicador = $this->usuario_model->indicadorDireto($fields['sponsorCode']);

                    if( $indicador ){
 
                        $fieldsSave['indicadorID'] = $indicador;
                        
                    }else{

                         $fieldsSave['indicadorID'] = 1;
                    }

                    $insert = $this->db->insert('usuarios', $fieldsSave );

                    if($insert){

                        $walletSave = array(
                                    'usuarioID'=>$this->db->insert_id(),
                                    'carteiraEndereco'=>  $fields['carteiraEndereco'],
                                    );
                            
                            $this->db->insert('usuarios_carteira', $walletSave );


                                // $body = $this->load->view('email/senha',$data,TRUE);

                                // $this->email->to( $fields['email'] );
                                // $this->email->from('suporte@redeads50.com', 'Painel Rede ADS50');
                                // $this->email->set_mailtype('html');
                                // $this->email->subject('Nova senha do Painel - '.$fields['nome']);
                                // $this->email->message($body);

                                // $envia = $this->email->send();
                        $this->native_session->set('user_id', $this->db->insert_id() );

                        echo json_encode( array('result'=>'success','message'=>'Parabéns. Cadastro iniciado!' ) );
                        return;
                    }

                }

            }

        }

        echo json_encode( array('result'=>'error','message'=>'Ação não permitida') ); 
    }

    public function salvaPesquisa(){

        if( $this->input->post() ){

            $fields = $this->input->post();


            switch ( $fields['form'] ) {

                case 'novo':

                    unset($fields['form']);
                    
                    $insert = $this->db->insert('pesquisas', $fields);
                    
                    if($insert){
                        echo json_encode( array('result'=>'novo','message'=>'Pesquisa salva','redirect'=> base_url("dashboard/pesquisas/p/{$this->db->insert_id()}/dados")  ) );
                        return;
                    }else{
                        echo json_encode( array('result'=>'error','message'=>'Erro ao gravar no banco' ) );
                        return;
                    }

                    break;

                case 'dados':

                    $pesquisaID = $fields['pesquisaID'];
                    unset($fields['form']);
                    unset($fields['pesquisaID']);

                    if( !isset( $fields['pesquisaPublicada'] )  ){

                        $fields['pesquisaPublicada'] = 0;
                    }

                    
                    $this->db->where_in('pesquisaID', $pesquisaID);
                    $update = $this->db->update('pesquisas', $fields);
                    
                    if($update ){
                        echo json_encode( array('result'=>'success','message'=>'Pesquisa salva' ) );
                        return;
                    }else{
                        echo json_encode( array('result'=>'error','message'=>'Erro ao gravar no banco' ) );
                        return;
                    }

                    break;



                default:
                    echo json_encode( array('result'=>'error','message'=>'Formulário inválido') ); 
                    break;
            }
        }

        echo json_encode( array('result'=>'error','message'=>'Ação não permitida') ); 
    }

    public function salvaQuestao(){

        if( $this->input->post() ){

            $fields = $this->input->post();

            $salvaQuestao = $this->db->insert('pesquisa_questionario', 
                array( 
                    'pesquisaID'=> $fields['pesquisaID'],
                    'questaoEnunciado' => $fields['questaoEnunciado'],
                    'tipoResposta'=> $fields['tipoResposta']
                    )
                );

            if($salvaQuestao){
                $questaoID = $this->db->insert_id();

                if( $fields['tipoResposta'] ==  1 OR $fields['tipoResposta'] == 2){

                $libera = 0;

                $alternativas = $fields['add'];
                    
                    foreach ($alternativas as $key => $resposta ) {
                        $salvaResposta = $this->db->insert('pesquisa_alternativas', 
                            array(
                                'questaoID' => $questaoID,
                                'resposta' => $resposta 
                            )
                        );

                        if($salvaResposta){
                            $libera++;
                        }

                    }

                }else{

                    $libera = 1;
                }
                
                
                
                if($libera > 0 ){
                    echo json_encode( array('result'=>'success','message'=>'Questão inserida no banco') );
                    return;
                }
                
                echo json_encode( array('result'=>'error','message'=>'Não foi possível salvar') );  
                return;     
            }

            
        }

        echo json_encode( array('result'=>'error','message'=>'Ação não permitida') ); 
    }

    public function editaQuestao(){

        if( $this->input->post() ){

            $fields = $this->input->post();

            $this->db->where_in('questaoID', $fields['questaoID']);
            $editaQuestao = $this->db->update('pesquisa_questionario', 
                array( 
                    'questaoEnunciado' => $fields['questaoEnunciado'],
                    'tipoResposta'=> $fields['tipoResposta']
                    )
                );

            $questaoID = $fields['questaoID'];

            if($editaQuestao){

                if( $fields['tipoResposta'] ==  3  ){

                    $this->db->where('questaoID', $questaoID );
                    $this->db->delete('pesquisa_alternativas');
                }

                if( $fields['tipoResposta'] ==  1 OR $fields['tipoResposta'] == 2){

                $libera = 0;

                //com relacao as alternativas eu preciso de tres tratativas
                // 1 - alterar as ja existentes se houver alguma modificação de acordo com o id $fields['alt']
                // 2 - exlcuir as estão em estado de $fields['remove']
                // 3 - adicionar as que estão em estado de $fields['add']

                if(isset($fields['add']) ){

                    foreach ( $fields['add'] as $key => $resposta ) {
                        $salvaResposta = $this->db->insert('pesquisa_alternativas', 
                            array(
                                'questaoID' => $questaoID,
                                'resposta' => $resposta 
                            )
                        );

                        if( $salvaResposta ){
                            $libera++;
                        }

                    }

                }  

                if(isset($fields['alt']) ){

                    foreach ( $fields['alt'] as $key => $resposta ) {
                        $this->db->where( array('questaoID'=> $questaoID,'respostaID' => $key ) );
                        $salvaResposta = $this->db->update('pesquisa_alternativas', 
                            array(
                                'resposta' => $resposta
                            )
                        );

                        if( $salvaResposta ){
                            $libera++;
                        }

                    }
                }

                if(isset( $fields['remove'] ) ){

                    foreach ( $fields['remove'] as $key => $respostaID ) {
                        $this->db->where( array(
                                'questaoID' => $questaoID,
                                'respostaID' => $respostaID
                            ) );
                        $salvaResposta = $this->db->delete('pesquisa_alternativas');

                        if( $salvaResposta ){
                            $libera++;
                        }

                    }
                }

                }else{

                    $libera = 1;
                }
                
                
                
                if($libera > 0 ){
                    echo json_encode( array('result'=>'success','message'=>'Questão inserida no banco' ) );
                    return;
                }
                
                echo json_encode( array('result'=>'error','message'=>'Não foi possível salvar' ) );  
                return;     
            }

            
        }

        echo json_encode( array('result'=>'error','message'=>'Ação não permitida') ); 
    }

    public function autorizaColetor(){

        if( $this->input->post() ){

            $fields = $this->input->post();


            $this->db->where_in('deviceID', $fields['deviceID']);
            $autorizaColetor = $this->db->update('coletores', 
                array( 
                    'coletorStatus' => $fields['coletorStatus'],
                    )
                );

            if($autorizaColetor){
                echo json_encode( array('result'=>'success','message'=>'Coletor autorizado' ) );
                return;
            }
                
            echo json_encode( array('result'=>'error','message'=>'Não foi possível salvar' ) );  
            return;
            
        }

        echo json_encode( array('result'=>'error','message'=>'Ação não permitida') ); 
    }

    public function cidades_load(){ 

        $result = $this->dashboard_model->lista_cidades($this->input->post('estadoID') );

        echo json_encode( $result );
    }

    public function bairrosComu_load(){ 

        $result = $this->dashboard_model->lista_bairros_comunidades($this->input->post('cidadeID') );

        echo json_encode( $result );
    }

    public function novo_coletor(){

        $fields = json_decode( json_encode( $this->input->post() ) );

        // echo var_dump($fields);
        // return;

        $save = 0;

        //se o coletor ainda não foi vinculado a pesquisa, vinculamos
        $this->db->where(array('pesquisaID'=>$fields->pesquisaID ,'coletorID'=>$fields->coletorID  ));
        $vinculado = $this->db->get('pesquisa_coletores');
        if($vinculado->num_rows() > 0 ){

            $vinculoID = $vinculado->row()->vinculoID;

        }else{

            $this->db->insert('pesquisa_coletores', array('pesquisaID'=>$fields->pesquisaID ,'coletorID'=>$fields->coletorID ) );
            $vinculoID = $this->db->insert_id();
        }

        if( isset($fields->add_vinculo )){
            foreach( $fields->add_vinculo as $vinculo ){

                $this->db->insert('pesquisa_coletores_locais', array(
                    'vinculoID'=>$vinculoID,
                    'estadoID'=>$vinculo->estadoID,
                    'cidadeID'=>$vinculo->cidadeID,
                    'bairroComuID'=>$vinculo->bairroComuID,
                    'numMinColetas'=>$vinculo->numMinColetas
                    ));

                $save++;
            }
        }
        
        if(isset($fields->edit_vinculo )){

            foreach( $fields->edit_vinculo as $index=>$vinculo ){

                $this->db->where('coletorLocalID',$index);
                $this->db->update('pesquisa_coletores_locais', array(
                    'estadoID'=>$vinculo->estadoID,
                    'cidadeID'=>$vinculo->cidadeID,
                    'bairroComuID'=>$vinculo->bairroComuID,
                    'numMinColetas'=>$vinculo->numMinColetas
                    ));

                $save++;
            }

        }

        if(isset($fields->remove_vinculo )){

            foreach( $fields->remove_vinculo as $index=>$vinculo ){

                $this->db->where('coletorLocalID',$index);
                $this->db->delete('pesquisa_coletores_locais');

                $save++;
            }

        }


        if($save > 0){

            $this->native_session->set_flashdata('messagem', '<div class="alert alert-success text-center ">Cadastro realizado</div>');
            echo json_encode( array('result'=>'success','message'=>'Parabéns. Você está participando.', 'redirect'=>base_url("dashboard/pesquisas/p/{$fields->pesquisaID}/coletores/edita/{$fields->coletorID}") ) );
            return;
        }

        echo json_encode( array('result'=>'error','message'=>'Erro' ) );
        return;
    }

    public function excluirColetor(){

        $result = $this->dashboard_model->excluir_vinculo_coletor( $this->input->post('vinculoID') );

        echo $result;

    }



    //QUESTOES PADRÃO PARA O TIPO DE PESQUISA

    public function configSalvaQuestao(){

        if( $this->input->post() ){

            $fields = $this->input->post();

            $salvaQuestao = $this->db->insert('config_pesquisa_questionario', 
                array( 
                    'tipoPesquisaID'=> $fields['tipoPesquisaID'],
                    'questaoEnunciado' => $fields['questaoEnunciado'],
                    'tipoResposta'=> $fields['tipoResposta']
                    )
                );

            if($salvaQuestao){
                $questaoID = $this->db->insert_id();

                if( $fields['tipoResposta'] ==  1 OR $fields['tipoResposta'] == 2){

                $libera = 0;

                $alternativas = $fields['add'];
                    
                    foreach ($alternativas as $key => $resposta ) {
                        $salvaResposta = $this->db->insert('config_pesquisa_alternativas', 
                            array(
                                'questaoID' => $questaoID,
                                'resposta' => $resposta 
                            )
                        );

                        if($salvaResposta){
                            $libera++;
                        }

                    }

                }else{

                    $libera = 1;
                }
                
                
                
                if($libera > 0 ){
                    echo json_encode( array('result'=>'success','message'=>'Questão inserida no banco') );
                    return;
                }
                
                echo json_encode( array('result'=>'error','message'=>'Não foi possível salvar') );  
                return;     
            }

            
        }

        echo json_encode( array('result'=>'error','message'=>'Ação não permitida') ); 
    }

    public function configEditaQuestao(){

        if( $this->input->post() ){

            $fields = $this->input->post();

            $this->db->where_in('questaoID', $fields['questaoID']);
            $editaQuestao = $this->db->update('config_pesquisa_questionario', 
                array( 
                    'questaoEnunciado' => $fields['questaoEnunciado'],
                    'tipoResposta'=> $fields['tipoResposta']
                    )
                );

            $questaoID = $fields['questaoID'];

            if($editaQuestao){

                if( $fields['tipoResposta'] ==  3  ){

                    $this->db->where('questaoID', $questaoID );
                    $this->db->delete('config_pesquisa_alternativas');
                }

                if( $fields['tipoResposta'] ==  1 OR $fields['tipoResposta'] == 2){

                $libera = 0;

                //com relacao as alternativas eu preciso de tres tratativas
                // 1 - alterar as ja existentes se houver alguma modificação de acordo com o id $fields['alt']
                // 2 - exlcuir as estão em estado de $fields['remove']
                // 3 - adicionar as que estão em estado de $fields['add']

                if(isset($fields['add']) ){

                    foreach ( $fields['add'] as $key => $resposta ) {
                        $salvaResposta = $this->db->insert('config_pesquisa_alternativas', 
                            array(
                                'questaoID' => $questaoID,
                                'resposta' => $resposta 
                            )
                        );

                        if( $salvaResposta ){
                            $libera++;
                        }

                    }

                }  

                if(isset($fields['alt']) ){

                    foreach ( $fields['alt'] as $key => $resposta ) {
                        $this->db->where( array('questaoID'=> $questaoID,'respostaID' => $key ) );
                        $salvaResposta = $this->db->update('config_pesquisa_alternativas', 
                            array(
                                'resposta' => $resposta
                            )
                        );

                        if( $salvaResposta ){
                            $libera++;
                        }

                    }
                }

                if(isset( $fields['remove'] ) ){

                    foreach ( $fields['remove'] as $key => $respostaID ) {
                        $this->db->where( array(
                                'questaoID' => $questaoID,
                                'respostaID' => $respostaID
                            ) );
                        $salvaResposta = $this->db->delete('config_pesquisa_alternativas');

                        if( $salvaResposta ){
                            $libera++;
                        }

                    }
                }

                }else{

                    $libera = 1;
                }
                
                
                
                if($libera > 0 ){
                    echo json_encode( array('result'=>'success','message'=>'Questão inserida no banco' ) );
                    return;
                }
                
                echo json_encode( array('result'=>'error','message'=>'Não foi possível salvar' ) );  
                return;     
            }

            
        }

        echo json_encode( array('result'=>'error','message'=>'Ação não permitida') ); 
    }

    public function register(){

        //echo json_encode( array('result'=>'error','message'=>'Cadastro em manutenção.') );
        //return;

        if( $this->input->post() ){

            if(!in_array(NULL, $this->input->post() )){

                $fields = $this->input->post();

                if( $fields['pswd'] != $fields['confirm_pswd'] ){
                    echo json_encode( array('result'=>'error','message'=>'Senhas não conferem') );
                    return;
                }

                if(!is_numeric( $fields['phone'] ) ){
                    echo json_encode( array('result'=>'error','message'=>'Use somente números no telefone' ) );
                    return;
                }

                $this->db->or_where('emailUser', $fields['email']);
                $exists = $this->db->get('user_register');

                if( $exists->num_rows() > 0 ){
                    echo json_encode( array('result'=>'error','message'=>'Cadastro já existe','clear'=>true) );
                    return;
                }else{


                    $fieldsSave = array(
                            'emailUser'=>$fields['email'],
                            'nameUser'=>$fields['name'],
                            'lastnameUser'=>$fields['lastname'],
                            'phoneUser'=> $fields['phone'],
                            'dateUserRegister'=>date('Y-m-d H:i:s'),
                            );

                    $insert = $this->db->insert('user_register', $fieldsSave );

                    $fieldsSaveSecrets = array(
                            'idUser'=> $this->db->insert_id(),
                            'passwordUser'=> md5($fields['pswd']),
                            );

                    $this->db->insert('user_secrets', $fieldsSaveSecrets );

                    $fieldsSavePlan = array(
                            'idUser'=> $this->db->insert_id(),
                            'idUserPlan'=> 'E',
                            'dateUserAccession'=>date('Y-m-d H:i:s'),
                            );

                    $this->db->insert('user_plans', $fieldsSavePlan );

                    if($insert){

                        // $body = $this->load->view('email/senha',$data,TRUE);

                        // $this->email->to( $fields['email'] );
                        // $this->email->from('suporte@redeads50.com', 'Painel Rede ADS50');
                        // $this->email->set_mailtype('html');
                        // $this->email->subject('Nova senha do Painel - '.$fields['nome']);
                        // $this->email->message($body);

                        // $envia = $this->email->send();
                        $this->native_session->set_flashdata('message', '<div class="alert alert-success text-center ">Cadastro realizado</div>');
                        echo json_encode( array('result'=>'success','message'=>'Parabéns. Você está participando.','clear'=>true, 'redirect'=>base_url("login") ) );
                        return;
                    }

                }

            }

            echo json_encode( array('result'=>'error','message'=>'Os campos não podem ficar vazios') );
            return;
        }

        echo json_encode( array('result'=>'error','message'=>'Ação não permitida') );
        
    }

    public function alerta(){

        $this->load->library('pusher');

        $apiKey = "AIzaSyArl1l5yqaz76Sy0ZF1M3kn195IOrLjUzQ";
        $regId = "eJwpjXP24CU:APA91bGD9ZHOCckgZYRaufYFeby0BA3758WUX6N-9HBibkdzaLEJgCkMEvnjpTR8k1rJFEmVnoTs305mTD0Z9-R56Sum4weav_lnvk9b-cEXk9uQMSHeZ69sZ9heqg2N0PfUBOoI3PNd";

        $pusher = new Pusher($apiKey);
        $pusher->notify($regId, "Hola");

        print_r($pusher->getOutputAsArray());
    }

    public function getBanco($id){

        $this->db->where('id',$id);
        $getBanco = $this->db->get('usuarios_bancos');
        if($getBanco->num_rows() > 0){
            echo json_encode( unserialize( $getBanco->row()->banco ) );
            return;
        }
    }

    public function getDoacao($id){

        $this->db->where('id',$id);
        echo json_encode( $this->db->get('doacoes')->row() );
        return;
    }

    public function enter($id){

        $idConta = $this->backoffice_model->infoUser($id)->conta_id;

        $this->native_session->set('user_id', $id);
        $this->native_session->set('conta_id',$idConta);

        redirect('backoffice/usuario');
    }


    public function consultaEmail($email){

        $this->db->where('email',$email);
        $emailExiste = $this->db->get('usuarios_contas');

        if($emailExiste->num_rows() > 0){
            
            return true;
        }

    }





    public function geneses(){

        $this->backoffice_model->geneses();
    }

    public function geneses2(){

        $this->backoffice_model->geneses2();
    }

    public function geneses3(){

        $this->backoffice_model->geneses3();
    }



    public function implante($id){

        $this->backoffice_model->alimentaCiclo1($id);
    }

    public function implante2($id){

        $this->backoffice_model->alimentaCiclo2($id);
    }

    public function implante3($id){

        $this->backoffice_model->alimentaCiclo3($id);
    }

    

    public function linkUnicoCiclo1(){
        $this->backoffice_model->LinkUnicoCiclo1(1);
        echo '<pre>';
        var_dump( $this->backoffice_model->RastreadorLinkUnicoCiclo1() );
        echo '</pre>';
    }

    public function linkUnicoCiclo2(){
        $this->backoffice_model->LinkUnicoCiclo2(1147);
        echo '<pre>';
        var_dump( $this->backoffice_model->RastreadorLinkUnicoCiclo2() );
        echo '</pre>';
    }

    public function linkUnicoCiclo3(){
        $this->backoffice_model->LinkUnicoCiclo1(1535);
        echo '<pre>';
        var_dump( $this->backoffice_model->RastreadorLinkUnicoCiclo3() );
        echo '</pre>';
    }


    public function organizacao(){
        $this->backoffice_model->Organizacao($id = null);
        echo '<pre>';
        var_dump( $this->backoffice_model->OrganizacaoHorizontal() );
        echo '</pre>';
    }

    public function verificaGeral(){
        $this->backoffice_model->verificaGeral();
    }

    public function naoReceberam(){ 

        $this->db->where('superCicloUsuario',1);
        $usuarios = $this->db->get('usuarios')->result();

        $i = 0;

        foreach ($usuarios as $value) {
            
            $this->db->where('idIndicador',$value->idUsuario);
            $exist = $this->db->get('indicadores');

            if($exist->num_rows() == 0){


                $i++;

            }
        }

        echo $i;
    }


    public function Recebedor($id){

        var_dump( $this->backoffice_model->Recebedor($id,2 ) );
    }



    

    
    public function migracao(){

        if( $this->input->post('funcao') == 'passo1'){

            $senha = $this->input->post('senha');
            $email = $this->input->post('email');

            if( empty($senha) AND empty($email) ){
                echo json_encode( array('mensagem'=>'Os campos estão vazios. Preencha todos','success'=>'error') );
                return;
            }

            if(!$email){
                echo json_encode( array('success'=>'error','mensagem'=>'Campo de email vazio') );
                return;
            }

            if(!$senha){
                echo json_encode( array('success'=>'error','mensagem'=>'Campo de senha vazio') );
                return;
            }


            if( $this->consultaEmail($email) ){
                echo json_encode( array('success'=>'email','mensagem'=>'Existe com esse email.','redirect'=>base_url('painel/conta/login') ) );
                return;
            }

            $insert_conta = $this->db->insert('usuarios_contas', 
                array(
                    'email'=>$email,
                    'senha'=>md5($senha),
                    'tokenUser'=>md5($senha.$email),
                    'secretUser'=>md5($email.$senha),
                    'dataCadastro'=>date('Y-m-d H:i'),
                    'dataUltimoLogin'=>date('Y-m-d H:i')
                    )
                );
           
            if($insert_conta){
                $this->native_session->set('conta_id', $this->db->insert_id());
                echo json_encode( array('success'=>'true','title'=>'Perfeito','mensagem'=>'Master conta aberta.', 'redirect'=>base_url('ajax_functions/redirectPasso2') ) );
                return;
            }

            echo json_encode( array('mensagem'=>'Falha ao salvar. Tente novamente','success'=>'false') );
            return;
        }

        ///------------------------------------------------------------------------ PASSO 2 

        if($this->input->post('funcao') == 'passo2'){

            $conta = $this->native_session->get('conta_id');
            $senha = $this->input->post('senha');
            $login = $this->input->post('login');

            if( empty($senha) AND empty($login) ){
                echo json_encode( array('mensagem'=>'Os campos estão vazios. Preencha todos','success'=>'error') );
                return;
            }

            if(!$login){
                echo json_encode( array('success'=>'error','mensagem'=>'Campo "login" vazio') );
                return;
            }

            if(!$senha){
                echo json_encode( array('success'=>'error','mensagem'=>'Campo "senha" vazio') );
                return;
            }

            $this->db->where('login',$login);
            $loginUser = $this->db->get('usuarios');

            if($loginUser->num_rows() > 0 ){

                $user = $loginUser->row();

            }else{
                echo json_encode( array('success'=>'error','mensagem'=>'Login '. $login .' não existe') );
                return;
            }

            if( $user->senha != md5($senha) ){
                echo json_encode( array('success'=>'error','mensagem'=>'Senha incorreta.') );
                return;

            }

            $this->db->where('id',$user->id);
            $atribui_login = $this->db->update('usuarios',
                array(
                    'migrado'=>1,
                    'conta_id'=>$this->native_session->get('conta_id'),
                ) 
            );
           
            if($atribui_login){
                
                echo json_encode( array('success'=>'true','title'=>'Feito','mensagem'=>'Login atribuído a conta com sucesso') ) ;
                return;
            }

            echo json_encode( array('mensagem'=>'Falha ao atribuir. Tente novamente','success'=>'false') );
            return;

        }

        echo json_encode( array('mensagem'=>'Função não existe','success'=>'false') );
        return;



    }
   
    public function navegaConta(){

        $fields = array( 'idUsuario'=> $this->input->post('user_id'), 'conta_id'=>$this->native_session->get('conta_id') );
        
        $this->db->where( $fields );
        $usuario = $this->db->get('usuarios');

        if( $usuario->row()->block == 1 ){
            echo json_encode( array('mensagem'=>'Conta bloqueada. Entre em contato com o suporte', 'success'=>'false' )  );
            return;

        }elseif

        ($usuario){
            $this->native_session->set('user_id', $this->input->post('user_id') );
            echo json_encode( array('mensagem'=>'Redirecionando', 'redirect'=>base_url("backoffice/usuario"), 'success'=>'true' )  );
            return;
        }

        echo json_encode( array('success'=>'false','mensagem'=>'Você não tem autorização para essa conta') );
        return;
        

    }

    public function viewPhoto(){
 
        $this->db->where('id', $this->native_session->get('conta_id') );
        $usuario = $this->db->update('usuarios_contas', array('viewPhoto'=>$this->input->post('viewPhoto') ));

        if($usuario){
           
            echo json_encode( array('mensagem'=>'Feito', 'success'=>'true' )  );
            return;
        }

        echo json_encode( array('success'=>'false','mensagem'=>'Erro ao salvar') );
        return;
        

    }
}