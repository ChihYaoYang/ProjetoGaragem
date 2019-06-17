<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Accessorio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Accessorio_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
        $this->Usuario_model->checkSession();
    }

    public function index() {
        $data['access'] = $this->Accessorio_model->getAll();
        $data['total'] = $this->Accessorio_model->countrow();
        $this->load->view('includes/header');
        $this->load->view('accessorio/lista', $data);
        $this->load->view('includes/footer');
    }

    //Insert
    public function cadastro() {
        $this->load->view('includes/header');
        $this->load->view('accessorio/cadastro');
        $this->load->view('includes/footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('descricao', 'descrição', 'required|is_unique[tb_acessorio.descricao]');
        $this->form_validation->set_rules('preco', 'preço', 'required|max_length[13]');
        if ($this->form_validation->run() == false) {
            $this->cadastro();
        } else {
            $data = array(
                'descricao' => strtoupper($this->input->post('descricao')),
                'preco' => str_replace(',', '.', str_replace('.', '', $this->input->post('preco'))),
            );
            //IMG
            if (!empty($_FILES['imagem']['name']) || $_FILES['imagem']['name'] == '') {
                $config['upload_path'] = './public/uploads';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 100;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('imagem')) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Cadastra Imagem *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>' . $this->upload->display_errors());
                    redirect('Accessorio/cadastrar');
                    exit();
                } else {
                    $data['imagem'] = $this->upload->data()['file_name'];
                }
            }
            if ($this->Accessorio_model->insert($data)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Accessório Cadastrado com Sucesso! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                redirect('Accessorio/index');
            } else {
                unlink('./public/uploads/' . $data['imagem']);
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Cadastrar Accessório *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                redirect('Accessorio/cadastro');
            }
        }
    }

    //Delete
    public function deletar($id) {
        $get = $this->Accessorio_model->getId($id);
        //Valida
        if ($id > 0) {
            if ($this->Accessorio_model->delete($id)) {
                unlink('./public/uploads/' . $get->imagem);
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Accessório Deletado com Sucesso ! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Deletar Accessório *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
            }
        }
        redirect('Accessorio/index');
    }

    //Update
    public function alteracao($id) {
        $data['access'] = $this->Accessorio_model->getId($id);
        $this->load->view('includes/header');
        $this->load->view('accessorio/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('descricao', 'descrição', 'required');
            $this->form_validation->set_rules('preco', 'preço', 'required|max_length[13]');
            if ($this->form_validation->run() == false) {
                $this->alteracao($id);
            } else {
                $data = array(
                    'descricao' => strtoupper($this->input->post('descricao')),
                    'preco' => str_replace(',', '.', str_replace('.', '', $this->input->post('preco'))),
                );
                //IMG
                if (!empty($_FILES['imagem']['name'])) {
                    $config['upload_path'] = './public/uploads';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 100;
                    $config['max_width'] = 1024;
                    $config['max_height'] = 768;
                    $config['encrypt_name'] = true;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('imagem')) {
                        $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Cadastra Imagem *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>' . $this->upload->display_errors());
                        redirect('Accessorio/alteracao');
                        exit();
                    } else {
                        $data['imagem'] = $this->upload->data()['file_name'];
                        $actualimage = $this->Accessorio_model->getId($id)->imagem;
                        if (!empty($actualimage) && file_exists('./public/uploads/' . $actualimage)) {
                            unlink('./public/uploads/' . $actualimage);
                        }
                    }
                }
                if ($this->Accessorio_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Accessório Alterado com Sucesso ! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Accessorio/index');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i> Accessório não sofreu Alterações<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Accessorio/index');
                }
            }
        }
    }

}
