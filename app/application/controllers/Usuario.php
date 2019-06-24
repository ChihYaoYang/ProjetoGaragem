<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index() {
        $this->load->view('login/login');
    }

    //Construct
    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    public function login() {
        //Validation formulario se cadastra ou não
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            //Busca no banco de dados através do Model saber se existe
            //o usuario com este email e senha recebidos por POST
            $usuario = $this->Usuario_model->getUsuario(
                    $this->input->post('email'), $this->input->post('senha')
            );
            //valida se retornou algum registro, quer dizer que o usuario é existente
            if ($usuario) {
                //Montamos um array com as informações do usuário logado
                $data = array(
                    'idUsuario' => $usuario->id,
                    'nome' => $usuario->nome,
                    'email' => $usuario->email,
                    'status' => $usuario->status,
                    'ativacao' => $usuario->ativacao,
                    'logado' => true
                );
                //Mandamos o codeignitter salvar na sessão os dados do usuário
                //perceba que o método set_userdata é diferente do método
                //set_flashdata, pois ele salva dados permanentes enquanto durar a sessão ...
                $this->session->set_userdata($data);
                //abre a pagina principal do sistema
                if ($this->session->userdata('ativacao') == 1) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success"> Welcome to Vend Car <b>' . $this->session->userdata('nome') . '</b><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect(base_url());
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i> Please Activate Your Account *_*</div>');
                    //redireciona obrigando o login...
                    redirect(base_url() . 'Usuario/login');
                }
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i> Usuário e Senha Incorretos *_*</div>');
                //redireciona obrigando o login...
                redirect(base_url() . 'Usuario/login');
            }
        }
    }

    //Insert
    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required|is_unique[tb_usuario.nome]|max_length[50]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[tb_usuario.email]');
        $this->form_validation->set_rules('senha', 'senha', 'required|min_length[6]|max_length[20]');
        if ($this->form_validation->run() == false) {
            //Se for false carrega marca de novo e preencher todos campos
            $this->load->view('login/cadastro');
        } else {
            //E resgata dados de POST
            $data = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'senha' => $this->input->post('senha')
            );
            //Send Email
            $this->load->library("email");
            $config = array(
                'mailtype' => 'html',
            );
            $this->email->initialize($config);
            //Insert de dados e no model usa return insert_id return valor id e passa o valor para activation
            $id = $this->Usuario_model->insert($data);
            //Mensagem
            $message = "
                        <h2>Thank you for Registering.</h2>
                        <p>Your Account:</p>
                        <p>Email: " . $this->input->post('email') . "</p>
                        <p>Password: " . $this->input->post('senha') . "</p>
                        <h4><a href=" . base_url('Usuario/activation/' . $id) . ">Activate My Account</a></h4>
                    ";
            $this->email->from('chih.yang@aluno.sc.senac.br', 'Admin');
            $this->email->to($this->input->post('email'));
            $this->email->subject('E-mail de verificação de cadastro');
            $this->email->message($message);
            if ($this->email->send()) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Cadastrado com Sucesso Check Seu Email para Ativa Sua Conta! ! !</div>');
                redirect('Usuario/login');
            } else {
                show_error($this->email->print_debugger());
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Cadastrar *_*</div>');
                redirect('Usuario/cadastrar');
            }
        }
    }

    //Ativação
    public function activation($id) {
        $data = array(
            'ativacao' => 1,
        );
        $this->Usuario_model->activate($data, $id);
        $this->load->view('includes/header');
        $this->load->view('login/ativacao');
        $this->load->view('includes/footer');
    }

    //Método responsavel por fazer o logout do sistema destruindo a sessão do usuário
    public function sair() {
        //Apaga todo conteúdo da sessão do usuario
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
