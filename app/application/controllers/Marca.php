<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Marca_model');
    }

    //Read
    public function index() {
        $data['marca'] = $this->Marca_model->getAll();
        $data['total'] = $this->Marca_model->countrow();
        $this->load->view('includes/header');
        $this->load->view('marca/lista', $data);
        $this->load->view('includes/footer');
    }

    //Create
    public function cadastro() {
        $this->load->view('includes/header');
        $this->load->view('marca/cadastro');
        $this->load->view('includes/footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('marca', 'marca', 'required|is_unique[tb_marca.tx_nome]');
        if ($this->form_validation->run() == false) {
            $this->cadastro();
        } else {
            $data = array(
              //Nome da DB
                'tx_nome' => $this->input->post('marca'),
            );
            if ($this->Marca_model->insert($data)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Marca Cadastrado com Sucesso! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                redirect('Marca/index');
            } else {
                //salva uma mensagem na sessão
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Cadastrar Marca *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                //Se for false redireciona para cadastrar
                redirect('Marca/cadastro');
            }
        }
    }

}

?>