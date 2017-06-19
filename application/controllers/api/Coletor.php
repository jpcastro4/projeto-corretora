<?php

require_once(APPPATH.'libraries/REST_Controller.php');

class Coletor extends REST_Controller{

     public function __construct(){
        parent::__construct();

        $this->load->model('api_model');
        
    }

    public function index_get(){

        $result = (object) array( 'Sucesso'=> TRUE );
        $this->response($result, 200);
    }
    

    public function device_get(){

    	if(!$this->get('id') ){

    	 	$this->response( [
                    'status' => FALSE,
                    'message' => 'Insert id bank to return item'
                ], 404);
    	}

    	$userId = $this->get('id');

    	$this->db->where('id',$userId);
    	$user = $this->db->get('usuarios')->row();

    	$this->db->where('id_usuario',$userId);
    	$niveis = $this->db->get('usuarios_nivel')->row();

    	$result = $user + $nives;

        $this->response($result, 200);

    }

    public function homologacao_post(){


        if(! $this->post('deviceID') OR ! $this->post('coletorDados')  ){

            $this->response( [
                    'status' => FALSE,
                    'message' => 'Campos inválidos'
                ], 404);
        }

        $homologa = $this->api_model->homologacao($this->post('deviceID'),$this->post('coletorDados'),$this->post('registrationID') );

        if($homologa['status']){

            $this->response($homologa, 200);

        }else{

            $this->response($homologa, 400);
        }
    }
    
    public function bancos_get(){

        if(!$this->get('id') ){

            
        }

        $idBanco = $this->get('id');

        $banco = BancoPorID($idBanco);


        if(!$banco){

             $this->response( [
                'status' => FALSE,
                'message' => 'No bank were found'
            ], 404);       

        }
        
        $result = $banco;
        $this->response($result, 200);
        
    }    

}