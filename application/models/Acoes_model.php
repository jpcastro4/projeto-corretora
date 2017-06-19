<?php
class Acoes_model extends CI_Model{

    public function __construct(){
        parent::__construct();

        // $this->load->helper('file');
        // $this->load->helper('url_amigavel');
        date_default_timezone_set('America/Sao_Paulo');
    }


/////////////////////////////////////////////////////////////////////////////////// EXTRATO
    public function infoUsario($usuarioID){

        $this->db->where('usuarioID', $usuarioID);
        $usuario = $this->db->get('usaurios')

        if($usuario->num_rows() > 0 ){

            return $usuario->row();
        }

        return false
    }



    public function inserirExtrato($usuarioID, $mensagem, $tipo=null ){

        $array_extrato = array(
            'usuarioID'=>$usuarioID,
            'extratoAcao'=>$mensagem,
            'extratoTipo'=> $tipo,
            'extratoDataata'=>date('Y-m-d H:i:s')
        );
        $this->db->insert('extrato', $array_extrato);
    }

    public function uploadImg($campo){

        $config['allowed_types'] = 'bmp|jpg|jpeg|pjpeg|png|gif';
        $config['upload_path'] = './uploads/postador/';
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);

        if($this->upload->do_upload($campo)){

            $retornoUpload = $this->upload->data();

            return $retornoUpload;

        }else{

            $this->session->set_flashdata('mensagem','<div class="alert alert-danger text-center">O comprovante não foi enviado</div>');

            return false;
        }

    }

    
    public function emailExtrato($usuarioID){

        $config['protocol'] ='smtp';
        $config['smtp_host'] = 'srv30.prodns.com.br';
        $config['smtp_user'] = 'suporte@nowx.club';
        $config['smtp_pass'] = 'now2016x';
        $config['smtp_port'] = '465';
        $config['smtp_crypto'] = 'ssl';
        $config['mailtype'] = 'html';

        $this->email->initialize($config);

        $body = $this->load->view('email/senha',$data,TRUE);

        $this->email->to( $row->email);
        $this->email->from('suporte@nowx.club', 'BackOffice Now X');
        $this->email->set_mailtype('html');
        $this->email->subject('Nova senha da Conta - '.$row->cpf);
        $this->email->message($body);

        $envia = $this->email->send();
    }

    public function TodosTickets(){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $this->db->limit(6);
        $tickets = $this->db->get('tickets');

        if($tickets->num_rows() > 0){

            return $tickets->result();
        }

        return false;
    }

    public function TicketsFechados(){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $this->db->where('status', '2');
        $tickets = $this->db->get('tickets');

        if($tickets->num_rows() > 0){

            return $tickets->result();
        }

        return false;
    }

    public function NovoTicket(){

        $sessao = $this->native_session->get('user_id');

        $assunto = $this->input->post('assunto');
        $mensagem = $this->input->post('mensagem');

        $array_ticket = array(
                                                'id_user'=>$sessao,
                                                'titulo'=>$assunto,
                                                'data'=>date('Y-m-d'),
                                                'status'=>0
                                                );

        $this->db->insert('tickets', $array_ticket);

        $array_ticket_mensagem = array(
                                                                    'id_ticket'=>$this->db->insert_id(),
                                                                    'mensagem'=>$mensagem,
                                                                    'user'=>1,
                                                                    'data'=>time()
                                                                    );

        $finish = $this->db->insert('tickets_mensagem', $array_ticket_mensagem);

        if($finish){

            return '<div class="alert alert-success text-center">Ticket aberto com sucesso, em breve responderemos.</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao abrir ticket.</div>';
    }

    public function InformacaoTicket($id){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id', $id);
        $this->db->where('id_user', $sessao);

        $ticket = $this->db->get('tickets');

        if($ticket->num_rows() > 0){

            return $ticket->row();

        }

        return false;
    }

    public function MensagensTicket($id){

        $this->db->order_by('data', 'ASC');
        $this->db->where('id_ticket', $id);
        $tickets_mensagens = $this->db->get('tickets_mensagem');

        if($tickets_mensagens->num_rows() > 0){

            return $tickets_mensagens->result();
        }

        return false;
    }

    public function AdicionarMensagemTicket($id){

        $resposta = $this->input->post('resposta');

        $array_mensagem = array(
                                                        'id_ticket'=>$id,
                                                        'mensagem'=>$resposta,
                                                        'user'=>1,
                                                        'data'=>time()
                                                        );

        $this->db->insert('tickets_mensagem', $array_mensagem);

        $this->db->where('id', $id);
        $this->db->update('tickets', array('status'=>0));
    }

    public function AtualizaNotificacoes(){

        $sessao = $this->native_session->get('user_id');

        $this->db->where('id_user', $sessao);
        $atualiza = $this->db->update('notificacoes', array('visto'=>1));

        if($atualiza){

            return true;
        }

        return false;
    }

  
}