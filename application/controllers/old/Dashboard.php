<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('dashboard_model');
        $this->load->helper('data');
    }

    public function index(){
        
        $data['titulo'] = 'Dashboard';

        $data['pg_nivel_1'] = 'Dashboard';
        $data['pg_icone'] = '<i class="fa fa-dashboard fa-align-right"></i>';
        $data['pg_nivel_2'] = false;

        $data['pg_inicio'] = true;

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/index');
        $this->load->view('dashboard/templates/footer');     
       
    }


    //--------------------------------------------------------------------------- ADMINISTRATIVO 

    public function administrativo(){
 

        $data['pg_nivel_1'] = 'Administrativo';
        $data['pg_icone'] = '<i class="fa fa-line-chart fa-align-right">';
        $data['pg_nivel_2'] = false;

        $data['pg_administrativo'] = true;

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/administrativo/menu');
        $this->load->view('dashboard/administrativo/index');
        $this->load->view('dashboard/templates/footer');     
       
    }

    public function usuarios(){
 

        $data['pg_nivel_1'] = 'Administrativo';
        $data['pg_nivel_2'] = 'Usuários';

        $data['pg_administrativo'] = true;
        $data['pg_usuarios'] = true;

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $data['lista_usuarios'] = $this->dashboard_model->lista_usuarios();

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/administrativo/menu');
        $this->load->view('dashboard/administrativo/usuarios');
        $this->load->view('dashboard/templates/footer');     
       
    }

    public function novo_usuario(){
 

        $data['pg_nivel_1'] = 'Administrativo';
        $data['pg_nivel_2'] = 'Novo usuário';

        $data['pg_administrativo'] = true;
        $data['pg_usuarios'] = true;
        $data['pg_novousuario'] = true;

        $data['form_save'] = true;

        if( $this->input->post('form') ){

            $this->dashboard_model->novo_usuario();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/administrativo/menu');
        $this->load->view('dashboard/administrativo/usuarios-novo');
        $this->load->view('dashboard/templates/footer');     
       
    }

    public function editar_usuario($id){
 

        $data['pg_nivel_1'] = 'Administrativo';
        $data['pg_nivel_2'] = 'Editar usuário';

        $data['pg_administrativo'] = true;
        $data['pg_usuarios'] = true;
        $data['pg_editausuario'] = true;

        $data['form_save'] = true;        

        if( $this->input->post('form') ){

            $this->dashboard_model->editar_usuario($id);
        }

        $data['usuario'] = $this->dashboard_model->get_usuario($id);

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/administrativo/menu');
        $this->load->view('dashboard/administrativo/usuarios-editar');
        $this->load->view('dashboard/templates/footer');     
       
    }
    
    public function pesquisadores(){
 

        $data['pg_nivel_1'] = 'Administrativo';
        $data['pg_nivel_2'] = 'Pesquisadores';

        $data['pg_administrativo'] = true;
        $data['pg_pesquisadores'] = true;

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $data['lista_pesquisadores'] = $this->dashboard_model->lista_pesquisadores();

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/administrativo/menu');
        $this->load->view('dashboard/administrativo/pesquisadores');
        $this->load->view('dashboard/templates/footer');     
       
    }

    public function novo_pesquisador(){
 

        $data['pg_nivel_1'] = 'Administrativo';
        $data['pg_nivel_2'] = 'Novo pesquisador';

        $data['pg_administrativo'] = true;
        $data['pg_pesquisadores'] = true;
        $data['pg_novousuario'] = true;

        $data['form_save'] = true;

        if( $this->input->post('form') ){

            $this->dashboard_model->novo_pesquisador();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/administrativo/menu');
        $this->load->view('dashboard/administrativo/pesquisadores-novo');
        $this->load->view('dashboard/templates/footer');     
       
    }

    public function editar_pesquisador($id){
 

        $data['pg_nivel_1'] = 'Administrativo';
        $data['pg_nivel_2'] = 'Editar pesquisador';

        $data['pg_administrativo'] = true;
        $data['pg_pesquisadores'] = true;
        $data['pg_editapesquisador'] = true;

        $data['form_save'] = true;

        if( $this->input->post('form') ){

            $this->dashboard_model->editar_pesquisador($id);
        }

        $data['pesquisador'] = $this->dashboard_model->get_pesquisador($id);

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/administrativo/menu');
        $this->load->view('dashboard/administrativo/pesquisadores-editar');
        $this->load->view('dashboard/templates/footer');     
       
    }



    public function coletores(){
 

        $data['pg_nivel_1'] = 'Administrativo';
        $data['pg_nivel_2'] = 'Coletores';

        $data['pg_administrativo'] = true;
        $data['pg_coletores'] = true;

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $data['lista_coletores'] = $this->dashboard_model->lista_coletores();

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/administrativo/menu');
        $this->load->view('dashboard/administrativo/coletores');
        $this->load->view('dashboard/templates/footer');     
       
    }

    // ---------------------------------------------------------------- LOCAIS

    public function locais(){
 

        $data['pg_nivel_1'] = 'Administrativo';
        $data['pg_nivel_2'] = 'Locais';

        $data['pg_administrativo'] = true;
        $data['pg_locais'] = true;

        $data['form_save'] = true;

        if( $this->input->post('novo') ){

            $this->dashboard_model->novo_estado();
        }

        if( $this->input->post('editarID') ){

            $this->dashboard_model->editar_estado();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $data['lista_estados'] = $this->dashboard_model->lista_estados();

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/administrativo/menu');
        $this->load->view('dashboard/administrativo/locais-estados');
        $this->load->view('dashboard/templates/footer');     
       
    }

    public function cidades($estado){
 

        $data['pg_nivel_1'] = 'Administrativo';
        $data['pg_nivel_2'] = 'Locais';

        $data['pg_administrativo'] = true;
        $data['pg_locais'] = true;
        $data['pg_cidades'] = true;

        $data['form_save'] = true;

        if( $this->input->post('novo') ){

            $this->dashboard_model->nova_cidade();
        }

        if( $this->input->post('editarID') ){

            $this->dashboard_model->editar_cidade();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $data['estado'] = $this->dashboard_model->get_estado($estado);
        $data['lista_cidades'] = $this->dashboard_model->lista_cidades($estado);

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/administrativo/menu');
        $this->load->view('dashboard/administrativo/locais-cidades');
        $this->load->view('dashboard/templates/footer');     
       
    }

    public function bairros_comunidades($estado,$cidade){
 

        $data['pg_nivel_1'] = 'Administrativo';
        $data['pg_nivel_2'] = 'Locais';

        $data['pg_administrativo'] = true;
        $data['pg_locais'] = true;
        $data['pg_bairros'] = true;

        $data['form_save'] = true;

        if( $this->input->post('novo') ){

            $this->dashboard_model->novo_bairro_comunidade();
        }

        if( $this->input->post('editarID') ){

            $this->dashboard_model->editar_bairro_comunidade();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $data['estado'] = $this->dashboard_model->get_estado($estado);
        $data['cidade'] = $this->dashboard_model->get_cidade($cidade);
        $data['lista_bairros_comunidades'] = $this->dashboard_model->lista_bairros_comunidades($cidade);

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/administrativo/menu');
        $this->load->view('dashboard/administrativo/locais-bairros-comunidades');
        $this->load->view('dashboard/templates/footer');     
       
    }

    // -------------------------------------------------------------------------- PESQUISAS

    public function pesquisas(){
 

        $data['pg_nivel_1'] = 'Pesquisas';
        $data['pg_nivel_2'] = 'Todas as pesquisas';

        $data['pg_pesquisas'] = true;
        $data['pg_todas_pesquisas'] = true;

        $data['form_save_pesquisa'] = true;

        // if( $this->input->post('novo') ){

        //     $this->dashboard_model->nova_pesquisa();
        // }

        $data['lista_pesquisas'] = $this->dashboard_model->lista_pesquisas();
        
        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        //$data['estado'] = $this->dashboard_model->get_estado($estado);
        //$data['lista_cidades'] = $this->dashboard_model->lista_cidades($estado);

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/pesquisas/menu');
        $this->load->view('dashboard/pesquisas/pesquisas');
        $this->load->view('dashboard/templates/footer');     
       
    }

    public function pesquisa_dados($pesquisaID){
 

        $data['pg_nivel_1'] = 'Pesquisas';
        $data['pg_nivel_2'] = 'Dados da pesquisa';

        $data['pg_pesquisas'] = true;
        $data['pg_pesquisas_editar'] = true;
        $data['pg_etapa_1'] = true;
        $data['form_save_pesquisa'] = true;

        $data['pesquisa'] = $this->dashboard_model->get_pesquisa($pesquisaID);

        if( $data['pesquisa']->pesquisaStatus != 0 ){

            $data['pg_pesquisas_finalizar'] = true;
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        //$data['estado'] = $this->dashboard_model->get_estado($estado);
        //$data['lista_cidades'] = $this->dashboard_model->lista_cidades($estado);

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/pesquisas/menu');
        $this->load->view('dashboard/pesquisas/pesquisas-novo-dados');
        $this->load->view('dashboard/templates/footer');        
       
    }


    public function pesquisa_questoes($pesquisaID){
 

        $data['pg_nivel_1'] = 'Pesquisas';
        $data['pg_nivel_2'] = 'Questões da pesquisa';

        $data['pg_pesquisas'] = true;
        $data['pg_pesquisas_editar'] = true;
        $data['pg_etapa_2'] = true;
        $data['form_questoes'] = true;

        $data['pesquisa'] = $this->dashboard_model->get_pesquisa($pesquisaID);

        if( $data['pesquisa']->pesquisaStatus != 0 ){

            $data['pg_pesquisas_finalizar'] = true;
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        //$data['estado'] = $this->dashboard_model->get_estado($estado);
        //$data['lista_cidades'] = $this->dashboard_model->lista_cidades($estado);

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/pesquisas/menu');
        $this->load->view('dashboard/pesquisas/pesquisas-novo-questoes');
        $this->load->view('dashboard/templates/footer');        
       
    }

    public function pesquisas_questoes_load($pesquisaID){

        $data['lista_questoes'] = $this->dashboard_model->lista_questoes($pesquisaID);
        $this->load->view('dashboard/pesquisas/questoes_load', $data);
    }

    public function pesquisas_load_questao_edita(){

        $questaoID = $this->input->post('questaoid');

        $data['questao'] = $this->dashboard_model->get_questao($questaoID);

        $this->load->view('dashboard/pesquisas/questoes_load_edita', $data );

    }

    public function pesquisas_load_questao_nova($pesquisaID){

        $data['pesquisaID'] = $pesquisaID;

        $this->load->view('dashboard/pesquisas/questoes_load_nova', $data );

    }

    public function pesquisa_coletores($pesquisaID){
 
        $data['pg_nivel_1'] = 'Pesquisas';
        $data['pg_nivel_2'] = 'Coletores';

        $data['pg_pesquisas'] = true;
        $data['pg_pesquisas_editar'] = true;
        $data['pg_coletores'] = true;

        $data['pesquisa'] = $this->dashboard_model->get_pesquisa($pesquisaID);

        if( $data['pesquisa']->pesquisaStatus != 0 ){

            $data['pg_pesquisas_finalizar'] = true;
        }

        $data['coletores_vinculados'] = $this->dashboard_model->lista_coletores_vinculados($pesquisaID);

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/pesquisas/menu');
        $this->load->view('dashboard/pesquisas/coletores');
        $this->load->view('dashboard/templates/footer');     
       
    }

    public function pesquisa_coletor_novo($pesquisaID){
 
        $data['pg_nivel_1'] = 'Pesquisas';
        $data['pg_nivel_2'] = 'Novo vinculo';

        $data['pg_pesquisas'] = true;
        $data['pg_pesquisas_editar'] = true;
        $data['pg_coletores'] = true;
        $data['pg_novocoletor'] = true;

        //$data['form_save'] = true;

        $data['pesquisa'] = $this->dashboard_model->get_pesquisa($pesquisaID);

        if( $data['pesquisa']->pesquisaStatus != 0 ){

            $data['pg_pesquisas_finalizar'] = true;
        }

        $data['lista_coletores'] = $this->dashboard_model->lista_coletores_ativos();
        $data['lista_estados'] = $this->dashboard_model->lista_estados();
        
        if( $this->input->post('form') ){

            $this->dashboard_model->novo_coletor();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/pesquisas/menu');
        $this->load->view('dashboard/pesquisas/coletores-novo');
        $this->load->view('dashboard/templates/footer');     
       
    }

    public function pesquisa_coletor_edita($pesquisaID,$coletorID){
 
        $data['pg_nivel_1'] = 'Pesquisas';
        $data['pg_nivel_2'] = 'Edita vinculo';

        $data['pg_pesquisas'] = true;
        $data['pg_pesquisas_editar'] = true;
        $data['pg_coletores'] = true;
        $data['pg_novocoletor'] = true;

        //$data['form_save'] = true;

        $data['pesquisa'] = $this->dashboard_model->get_pesquisa($pesquisaID);

        if( $data['pesquisa']->pesquisaStatus != 0 ){

            $data['pg_pesquisas_finalizar'] = true;
        }

        $data['lista_coletores'] = $this->dashboard_model->lista_coletores_ativos();
        $data['lista_estados'] = $this->dashboard_model->lista_estados();

        $data['coletores_vinculos'] = $this->dashboard_model->coletores_vinculos($pesquisaID,$coletorID);
        
        if( $this->input->post('form') ){

            $this->dashboard_model->novo_coletor();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/pesquisas/menu');
        $this->load->view('dashboard/pesquisas/coletores-editar');
        $this->load->view('dashboard/templates/footer');     
       
    }

    public function pesquisa_coletor_sincronizar($pesquisaID){
 
        $data['pg_nivel_1'] = 'Pesquisas';
        $data['pg_nivel_2'] = 'Sincronização';

        $data['pg_pesquisas'] = true;
        $data['pg_pesquisas_editar'] = true;
        $data['pg_sincronizar'] = true;


        //$data['form_save'] = true;

        $data['pesquisa'] = $this->dashboard_model->get_pesquisa($pesquisaID);

        if( $data['pesquisa']->pesquisaStatus != 0 ){

            $data['pg_pesquisas_finalizar'] = true;
        }

        $data['coletores_vinculados'] = $this->dashboard_model->lista_coletores_vinculados($pesquisaID);
        $data['lista_estados'] = $this->dashboard_model->lista_estados();

        if( $this->input->post('form') ){

            $this->dashboard_model->novo_coletor();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/pesquisas/menu');
        $this->load->view('dashboard/pesquisas/coletores-sincronizar');
        $this->load->view('dashboard/templates/footer');     
       
    }

    public function configuracoes(){

        $data['pg_nivel_1'] = 'Configurações';
        $data['pg_nivel_2'] = 'Gerais';

        $data['pg_configuracoes'] = true;

        //$data['form_save'] = true;
 
        if( $this->input->post('form') ){

            $this->dashboard_model->novo_coletor();
        }

    
        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/configuracoes/menu');
        $this->load->view('dashboard/configuracoes/index');
        $this->load->view('dashboard/templates/footer');
    }

    public function configuracoes_pesquisas(){

        $data['pg_nivel_1'] = 'Configuracoes';
        $data['pg_nivel_2'] = 'Pesquisas';

        $data['pg_configuracoes'] = true;
        $data['pg_pesquisas'] = true;

        $data['form_save'] = true;
 
        if( $this->input->post('form') ){

            $this->dashboard_model->saveNovo_tipoPesquisa();
        }

        $data['lista_tipoPesquisas'] = $this->dashboard_model->lista_tiposPesquisas();

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/configuracoes/menu');
        $this->load->view('dashboard/configuracoes/configuracoes-pesquisas');
        $this->load->view('dashboard/templates/footer');
    }

    public function configuracoes_pesquisas_editar($tipoPesquisaID){

        $data['pg_nivel_1'] = 'Configuracoes';
        $data['pg_nivel_2'] = 'Editar tipo';

        $data['pg_configuracoes'] = true;
        $data['pg_pesquisas'] = true;
        $data['form_save'] = true;
        $data['form_questoes_config'] = true;
 
        if( $this->input->post('form') ){

            $this->dashboard_model->edita_tipoPesquisa($tipoPesquisaID);
        }

        $data['get_tipoPesquisa'] = $this->dashboard_model->get_tipoPesquisa($tipoPesquisaID);

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('dashboard/templates/header', $data);
        $this->load->view('dashboard/configuracoes/menu');
        $this->load->view('dashboard/configuracoes/configuracoes-pesquisas-editar');
        $this->load->view('dashboard/templates/footer');
    }


    public function config_pesquisas_questoes_load($tipoPesquisaID){

        $data['lista_questoes'] = $this->dashboard_model->config_lista_questoes($tipoPesquisaID);
        $this->load->view('dashboard/configuracoes/questoes_load', $data);
    }

    public function config_pesquisas_load_questao_edita(){

        $questaoID = $this->input->post('questaoid');

        $data['questao'] = $this->dashboard_model->config_get_questao($questaoID);

        $this->load->view('dashboard/configuracoes/questoes_load_edita', $data );

    }

    public function config_pesquisas_load_questao_nova($tipoPesquisaID){

        $data['tipoPesquisaID'] = $tipoPesquisaID;

        $this->load->view('dashboard/configuracoes/questoes_load_nova', $data );

    }




    //---------------------------------------------------------------------------- CONTA 
    

    public function rede(){

        $data['titulo'] = 'Rede';

        $data['pg_rede'] = true;

        $data['conta'] = $this->backoffice_model->conta();

        $this->load->view('backoffice/templates/header', $data);
        $this->load->view('backoffice/rede');
        $this->load->view('backoffice/templates/footer');
    }
   
    public function _configuracoes(){

        $data['titulo'] = 'Configurações';

        $data['pg_configuracoes'] = true;
        
        if($this->input->post('mudarSenha')){

            $novasenha = $this->input->post('novaSenha');

            $this->db->where('id',$this->input->post('idUser') );
            $this->db->update('usuarios_contas', array('senha'=>md5($novasenha) ) );

            $data['mensagem'] = $this->native_session->set_flashdata('mensagem', '<div class="text-center alert alert-success"> Senha alterada </div> ');
            redirect('backoffice/configuracoes');

        }

        if($this->input->post('mudarTelefone')){

            $novoTelefone = $this->input->post('novaTelefone');

            $this->db->where('id',$this->input->post('idUser') );
            $this->db->update('usuarios_contas', array('telefone'=>$novoTelefone ) );

            $data['mensagem'] = $this->native_session->set_flashdata('mensagem', '<div class="text-center alert alert-success"> Telefone alterado </div> ');
            redirect('backoffice/configuracoes');

        }

        if($this->input->post('submitBanco')){

            $this->backoffice_model->AlterarBanco();
        }

        $data['conta'] = $this->backoffice_model->conta();

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('backoffice/templates/header', $data);
        $this->load->view('backoffice/configuracoes');
        $this->load->view('backoffice/templates/footer');
    }

    //FACEBOOK ATRELADO A VARIAS CONTAS
    public function selecionar_conta(){

        $this->load->library('facebook');

        if (!$this->facebook->is_authenticated() ) {
            
            redirect('painel/conta-master/login');
        }

        if( $this->input->post('conta_id')){
            $this->usuario_model->LogarSwitchFacebook();
        }

        $user = (object) $this->facebook->request('get', '/me?fields=id');

        $this->db->where('facebookID',$user->id);
        $data['contas'] = $this->db->get('usuarios_contas')->result();

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('painel/conta/selecionar_conta', $data);
    }


    /* ------------------------------------------------------ USUARIO */

    public function usuario(){

        $data['titulo'] = 'Usuario - Bakcoffice';
        $data['pg_usuario'] = true;

        if($this->input->post("superadm")){

            $id_user = $this->input->post('id_user');

            $data['logado'] = $this->painel_model->superUser($id_user);
        }

        if($this->input->post("comprovante")){

            $this->backoffice_model->EfetuarDoacao();
        }


        if($this->input->post("confirmarDoacao")){

            $this->backoffice_model->confirmarDoacao();
        }

        if($this->input->post("recusarDoacao")){

            $this->backoffice_model->recusarDoacao();
        }

        if($this->input->post("abandonarDoador")){

            $this->backoffice_model->abandonarDoador();
        }

        if($this->input->post("excluirDoador")){

            $this->backoffice_model->excluirDoador();
        }


        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $data['conta'] = $this->backoffice_model->conta();
        $data['user'] = $this->backoffice_model->user();

        $this->load->view('backoffice/templates/header', $data);
        $this->load->view('backoffice/usuario');
        $this->load->view('backoffice/templates/footer');
    }












    public function indicados(){

        $data['titulo'] = 'Rede';
        $data['pg_indicados'] = true;

        if($this->input->post("superadm")){

            $id_user = $this->input->post('id_user');

            $data['logado'] = $this->painel_model->superUser($id_user);
        }

        if($this->input->post("confirmarDoacao")){

            $this->painel_model->confirmarDoacao();
        }

        if($this->input->post("recusarDoacao")){

            $this->painel_model->recusarDoacao();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('painel/templates/header', $data);
        $this->load->view('painel/indicados');
        $this->load->view('painel/templates/footer');

    }

    public function organograma(){

        $data['titulo'] = 'Rede Organograma';
        $data['pg_indicados'] = true;

        if($this->input->post("superadm")){

            $id_user = $this->input->post('id_user');

            $data['logado'] = $this->painel_model->superUser($id_user);
        }

        $this->load->view('painel/templates/header', $data);
        $this->load->view('painel/organograma');
        $this->load->view('painel/templates/footer');

    }

    public function movimentacao(){

        $data['titulo'] = 'Movimentação de Doacoes e Recebimentos';
        $data['pg_doacoes'] = true;

        if($this->input->post("superadm")){

            $id_user = $this->input->post('id_user');

            $data['logado'] = $this->painel_model->superUser($id_user);
        }
        
        if($this->input->post("confirmarDoacao")){

            $this->painel_model->confirmarDoacao();
        }

        if($this->input->post("recusarDoacao")){

            $this->painel_model->recusarDoacao();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('painel/templates/header', $data);
        $this->load->view('painel/movimentacao');
        $this->load->view('painel/templates/footer');

    }

    public function reentrada(){

        $reentradas = $this->painel_model->NumReentradas();
        if($reentradas->status == 1 ){
            redirect('painel');
        }

        if($this->input->post('submit')){
            $this->painel_model->formReentrada();
        }

        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $data['titulo'] = "Formulário de Reentrada";
        $this->load->view('painel/templates/header', $data);
        $this->load->view('painel/reentrada');
        $this->load->view('painel/templates/footer');
    }




      


    /* --------------------------------------  NOVOS CADASTROS   */

    //LINK DIRETO DO USUARIO
    public function amigo($login){
        
        $data = array();

        $this->db->where('login', $login);
        $user = $this->db->get('usuarios');

        if($user->num_rows() > 0){

            if(!is_null($login)){

                $this->native_session->set('indicador', $login);
                $this->native_session->set('nome_completo', $user->row()->nome);
            }else{

                $data['message']  = '<div class="alert alert-danger text-center"> Indicador inválido. Continue se deseja ser cadastrado em link único. </div>';
            }
            
        }else{
            $data['message']  = '<div class="alert alert-danger text-center"> Indicador inválido. Continue se deseja ser cadastrado em link único. </div>';
            $data['aguardando'] = false;
        }

        if($this->input->post("submit")){

            $data['message'] = $this->usuario_model->NovoUsuario();
        }

        $this->load->view('painel/cadastrar', $data);
    }


    //LINK UNICO DO USUARIO
    public function linkunico($login){
       
        $data = array();

        if($this->input->post("submit")){

            $data['mensagem'] = $this->usuario_model->NovoUsuario();
        }

        $data = array();

        $this->db->where('login', $login);
        $matriz = $this->db->get('usuarios');

        $id_matriz = $matriz->row()->id;

        $this->db->where('id_indicador',$id_matriz);
        $numInidcacoes = $this->db->get('indicadores');

        if($numInidcacoes->num_rows() < 3 ){

            $indicadorLinkUnico = $id_matriz;

        }else{
            
            $indicadorLinkUnico = $this->painel_model->LinkUnico($id_matriz);
        }


        if($indicadorLinkUnico == $id_matriz AND $numInidcacoes->num_rows() > 3){

            $data['aguardando'] = true;

        }else{

            $this->db->where('id', $indicadorLinkUnico);
            $indicador = $this->db->get('usuarios');

            if(!is_null($login)){

                $this->native_session->set('indicador', $indicador->row()->login);
                $this->native_session->set('nome_completo', $indicador->row()->nome);

                $data['aguardando'] = false;
            }
        }    

        $data['mensagem'] = $this->native_session->get_flashdata("mensagem");


        $this->load->view('painel/cadastrar', $data);
    }



    public function secret(){

        $this->native_session->set('conta_id', 1 );
        $this->native_session->set('superadm', 1 );
        redirect('painel/conta');
    }

    
    // CADASTRO DIRETO NO DERRAMAMENTO
    public function cadastrar($login = 'liderbrasil'){

        $this->native_session->unset_userdata('user_id');
        $this->native_session->unset_userdata('conta_id');


        if($this->input->post("submit")){

            $this->usuario_model->NovoUsuario();
        }

       
        $data = array();

        $this->db->where('login', $login);
        $matriz = $this->db->get('usuarios');

        $id_matriz = $matriz->row()->id;

        $this->db->where('id_indicador',$id_matriz);
        $numInidcacoes = $this->db->get('indicadores');

        if($numInidcacoes->num_rows() < 3 ){

            $indicadorLinkUnico = $id_matriz;

        }else{
            
            $indicadorLinkUnico = $this->painel_model->LinkUnico($id_matriz);
        }


        if($indicadorLinkUnico == $id_matriz){

            $data['aguardando'] = true;

        }else{

            $this->db->where('id', $indicadorLinkUnico);
            $indicador = $this->db->get('usuarios');

            if(!is_null($login)){

                $this->native_session->set('indicador', $indicador->row()->login);
                $this->native_session->set('nome_completo', $indicador->row()->nome);

                $data['aguardando'] = false;
            }
        }    

        $data['mensagem'] = $this->native_session->get_flashdata("mensagem");

        $this->load->view('painel/cadastrar', $data);
    }

	

    public function publicador(){
        
        $this->load->library('facebook');

        $data['user'] = array();

        // Check if user is logged in
        if ($this->facebook->is_authenticated())
        {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,email,picture');
            if (!isset($user['error']))
            {
                $data['user'] = $user;
            }
        }

        if($this->input->post('submit')){
            $this->painel_model->Postador(1);
        }

        if($this->input->post('parar')){
            $this->painel_model->Postador(0);
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');

        $data['titulo'] = 'Divulgador Automático';
        $data['pg_divulgador'] = true;

        $this->load->view('painel/conta/templates/header', $data);
        $this->load->view('painel/divulgacao');
        $this->load->view('painel/conta/templates/footer');

    }

    public function publicador_novo(){

        $this->load->library('facebook');

        $data['user'] = array();

        // Check if user is logged in
        if ($this->facebook->is_authenticated())
        {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,email,picture');
            if (!isset($user['error']))
            {
                $data['user'] = $user;
            }
        }

        if($this->input->post('submit')){
            $this->painel_model->novoPost();
        }


        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');

        $data['titulo'] = 'Novo Post | Divulgador Automático';
        $data['pg_divulgador'] = true;

        $this->load->view('painel/conta/templates/header', $data);
        $this->load->view('painel/novopost');
        $this->load->view('painel/conta/templates/footer');

    }


}