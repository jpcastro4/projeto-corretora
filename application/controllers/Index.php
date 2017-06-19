<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct(){
        parent::__construct();

        //$data['user'] = $this->usuario_model->getUser();
    }

    public function index(){

        $this->native_session->unset_userdata('user_id');
        $this->native_session->unset_userdata('superuser');
        $this->native_session->unset_userdata('conta_id');
        $this->native_session->unset_userdata('fb_access_token');
        
        if($this->input->post('submit') ){

            $this->usuario_model->login();
        }

        $data['title'] = 'Suprabit - Your investiment club';
        $data['pg_login'] = true;

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('login', $data); 
    }

    public function register(){

        $this->load->view('user/register');
    }

    public function lougout(){

        $this->native_session->unset_userdata('user_id');
        $this->native_session->unset_userdata('superuser');
        $this->native_session->unset_userdata('conta_id');
        $this->native_session->unset_userdata('fb_access_token');
        $this->native_session->unset_userdata('user_id_migracao');
        redirect('backoffice/login');
    }

    public function remember(){

        if($this->input->post('submit')){

            $this->backoffice_model->RecuperarSenhaConta();
        }

        $data['mensagem'] = $this->native_session->get_flashdata('mensagem');
        $data['mensagem_erro'] = $this->native_session->get_flashdata('mensagem_erro');

        $this->load->view('backoffice/esqueci', $data);

    }



    public function dashboard(){

    	$data['title'] = 'Dashboard';

        $this->load->view('user/templates/header',$data);
        $this->load->view('user/dashboard');
        $this->load->view('user/templates/footer');
    }

    public function quotas(){

    	$data['title'] = 'Quotas';

    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/quotas');
        $this->load->view('user/templates/footer');
    }

    public function network(){

    	$data['title'] = 'Network';

    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/network');
        $this->load->view('user/templates/footer');
    }

    public function income(){

    	$data['title'] = 'Return';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/income');
        $this->load->view('user/templates/footer');
    }

    public function direct_bonus(){

    	$data['title'] = 'Direct Bonus';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/direct-bonus');
        $this->load->view('user/templates/footer');
    }

    public function network_bonus(){

    	$data['title'] = 'Network Bonus';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/network-bonus');
        $this->load->view('user/templates/footer');
    }

    public function residual_bonus(){

    	$data['title'] = 'Residual Bonus';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/residual-bonus');
        $this->load->view('user/templates/footer');
    }

    public function career_bonus(){

    	$data['title'] = 'Career Bonus';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/career-bonus');
        $this->load->view('user/templates/footer');
    }

    public function settings_profile(){

    	$data['title'] = 'Profile Setting\'s';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/profile');
        $this->load->view('user/templates/footer');
    }

    public function settings_password(){

    	$data['title'] = 'Password Setting\'s';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/password');
        $this->load->view('user/templates/footer');
    }

    public function settings_wallets(){

    	$data['title'] = 'Wallet Setting\'';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/wallets');
        $this->load->view('user/templates/footer');
    }

    public function store(){

    	$data['title'] = 'Store';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/store');
        $this->load->view('user/templates/footer');
    }

    public function store_quotas(){

    	$data['title'] = 'Store - Buy Quotas';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/store-quotas');
        $this->load->view('user/templates/footer');
    }

    public function store_wallet(){

    	$data['title'] = 'Store - Blockchain Wallte\'';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/store-wallet');
        $this->load->view('user/templates/footer');
    }

    public function store_buy_bitcoins(){

    	$data['title'] = 'Store - Buy Bitcoin\'';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/store-buy-bitcoins');
        $this->load->view('user/templates/footer');
    }

    public function store_sale_bitcoins(){

    	$data['title'] = 'Store - Sale Bitcoin\'';
    	
    	$this->load->view('user/templates/header', $data);
        $this->load->view('user/store-sale-bitcoins');
        $this->load->view('user/templates/footer');
    }




    public function manutencao(){
        $this->load->view('index/manutencao');
    }
    public function politicas(){
        $this->load->view('admin/user/templates/header');
        $this->load->view('admin/politicas');
        $this->load->view('admin/user/templates/footer');
    }

    public function ativacao($id_user){
        
        $s1 = rand(302, 9999);
        $s2 = 'Az-';
        $s3 = date('Y-m-d H:i:s');
        $s4 = 'Oyk';

        $token = $s1.$s2.$s3.$s4;

        $this->db->where('id', $id_user);
        $this->db->update('usuarios', array('token'=>md5($token), 'email'=>$this->input->post('emailPost') ) ) ;

        $this->db->where('id', $id_user);
        $user = $this->db->get('usuarios')->row();

        $data['nome'] = $user->nome;
        $data['token'] = $user->token;

        $body = $this->load->view('email/ativacao',$data,TRUE);

        $config['protocol'] ='smtp';
        $config['smtp_host'] = 'srv30.prodns.com.br';
        $config['smtp_user'] = 'suporte@redeads50.com';
        $config['smtp_pass'] = 'ads502016';
        $config['smtp_port'] = '465';
        $config['smtp_crypto'] = 'ssl';
        $config['mailtype'] = 'html';

        $this->email->initialize($config);

        $this->email->to( $user->email);
        $this->email->from('suporte@redeads50.com', 'Suporte Rede ADS50');
        $this->email->set_alt_message('Faça a validação do seu e-mail para sua segurança.');
        $this->email->subject('Validação do seu e-mail');
        $this->email->message($body);

        $envia = $this->email->send();

        //return $envia;

    }

    public function valida($token){

        if(!empty($token)){

            $this->db->like('token',$token);
            $users = $this->db->get('usuarios');
            $user = $users->row();

            if($users->num_rows() > 0 ){

                if($user->validado == 0 ){

                    $this->db->where('id',$user->id);
                    $this->db->update('usuarios',array('validado'=>'1'));
                    $this->native_session->set('user_id',$user->id);
                    $this->native_session->set_flashdata('mensagem','<div class="alert alert-success">E-mail validado</div>');
                    redirect('painel');

                }else{

                    $this->native_session->set_flashdata('mensagem','<div class="alert alert-info">O e-mail já havia sido validado. Faça login</div>');
                    redirect('painel');
                }
                
            }

            $this->native_session->set_flashdata('mensagem','<div class="alert alert-danger">Usuário não existe ou não está cadastrado</div>');
            redirect('painel');

        }

        redirect('painel');
    }
    
}