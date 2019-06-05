<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Modelo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Modelo_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    //Read
    public function index() {
        $data['modelo'] = $this->Modelo_model->getAll();
        $data['total'] = $this->Modelo_model->countrow();
        $this->load->view('includes/header');
        $this->load->view('modelo/lista', $data);
        $this->load->view('includes/footer');
    }

    //Create
    public function cadastro() {
        $this->load->view('includes/header');
        $this->load->view('modelo/cadastro');
        $this->load->view('includes/footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('modelo', 'modelo', 'required|max_length[50]|is_unique[tb_modelo.nome]');
        if ($this->form_validation->run() == false) {
            //Se for false chama Form de novo
            $this->cadastro();
        } else {
            //resgata dados pelo post
            $data = array(
                'nome' => $this->input->post('modelo')
            );
            if ($this->Modelo_model->insert($data)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Modelo Cadastrado com Sucesso! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                redirect('Modelo/index');
            } else {
                //salva uma mensagem na sessão
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Cadastrar Modelo *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                //Se for false redireciona para cadastrar
                redirect('Modelo/cadastro');
            }
        }
    }

    //Delete
    public function deletar($id) {
        //Valida
        if ($id > 0) {
            if ($this->Modelo_model->delete($id)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Modelo Deletado com Sucesso! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Deletar Modelo *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
            }
        }
        redirect('Modelo/index');
    }

    //Update
    public function alteracao($id) {
        $data['modelo'] = $this->Modelo_model->getId($id);
        $this->load->view('includes/header');
        $this->load->view('modelo/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('modelo', 'modelo', 'required|max_length[50]');
            if ($this->form_validation->run() == false) {
                $this->alteracao($id);
            } else {
                $data = array(
                    'nome' => $this->input->post('modelo')
                );
                if ($this->Modelo_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Modelo Alterado com Sucesso ! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Modelo/index');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i> Modelo não sofreu Alterações<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Modelo/index');
                }
            }
        }
    }

}
