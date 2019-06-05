<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Cor_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
        $this->Usuario_model->checkSession();
    }

    public function index() {
        $data['cor'] = $this->Cor_model->getAll();
        $data['total'] = $this->Cor_model->countrow();
        $this->load->view('includes/header');
        $this->load->view('cor/lista', $data);
        $this->load->view('includes/footer');
    }

    public function cadastro() {
        $this->load->view('includes/header');
        $this->load->view('cor/cadastro');
        $this->load->view('includes/footer');
    }

    public function cadastrar() {
        //Valida formulario
        $this->form_validation->set_rules('descricao', 'cor', 'required|is_unique[tb_cor.descricao]|max_length[30]');
        if ($this->form_validation->run() == false) {
            //Se for false chama Form de novo
            $this->cadastro();
        } else {
            //resgata dados pelo post
            $data = array(
                'descricao' => $this->input->post('descricao')
            );
            if ($this->Cor_model->insert($data)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Cor Cadastrado com Sucesso! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                redirect('Cor/index');
            } else {
                //salva uma mensagem na sessão
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Cadastrar Cor *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                //Se for false redireciona para cadastrar
                redirect('Cor/cadastro');
            }
        }
    }

    //Delete
    public function deletar($id) {
        //Valida
        if ($id > 0) {
            if ($this->Cor_model->delete($id)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Cor Deletado com Sucesso! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Deletar Cor *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
            }
        }
        redirect('Cor/index');
    }

    //Update
    public function alteracao($id) {
        $data['cor'] = $this->Cor_model->getId($id);
        $this->load->view('includes/header');
        $this->load->view('cor/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('descricao', 'cor', 'required|max_length[30]');
            if ($this->form_validation->run() == false) {
                $this->alteracao($id);
            } else {
                $data = array(
                    'descricao' => $this->input->post('descricao')
                );
                if ($this->Cor_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Cor Alterado com Sucesso ! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Cor/index');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i> Cor não sofreu Alterações<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Cor/index');
                }
            }
        }
    }

}
