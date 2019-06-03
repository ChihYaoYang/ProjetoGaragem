<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Marca extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Marca_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
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
        $this->form_validation->set_rules('marca', 'marca', 'required|is_unique[tb_marca.nome]');
        if ($this->form_validation->run() == false) {
            $this->cadastro();
        } else {
            $data = array(
                //Nome da DB
                'nome' => $this->input->post('marca'),
            );
            //IMG
            if (!empty($_FILES['imagem']['name']) || $_FILES['imagem']['name'] == '') {
                $config['upload_path'] = './public/uploads/marca';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 100;
                $config['max_width'] = 1024;
                $config['max_height'] = 768;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('imagem')) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Cadastra Imagem *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>' . $this->upload->display_errors());
                    redirect('Marca/cadastrar');
                    exit();
                } else {
                    $data['imagem'] = $this->upload->data()['file_name'];
                }
            }
            if ($this->Marca_model->insert($data)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Marca Cadastrado com Sucesso! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                redirect('Marca/index');
            } else {
                unlink('./public/uploads/marca' . $data['imagem']);
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Cadastrar Marca *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                redirect('Marca/cadastro');
            }
        }
    }

    //Delete
    public function deletar($id) {
        $get = $this->Marca_model->getId($id);
        //Valida
        if ($id > 0) {
            if ($this->Marca_model->delete($id)) {
                unlink('./public/uploads/marca/' . $get->imagem);
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Marca Deletado com Sucesso ! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Deletar Marca *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
            }
        }
        redirect('Marca/index');
    }

    //Update
    public function alteracao($id) {
        $data['marca'] = $this->Marca_model->getId($id);
        $this->load->view('includes/header');
        $this->load->view('marca/alterar', $data);
        $this->load->view('includes/footer');
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('marca', 'marca', 'required');
            if ($this->form_validation->run() == false) {
                $this->alteracao($id);
            } else {
                $data = array(
                    //Nome da DB
                    'nome' => $this->input->post('marca'),
                );
                //IMG
                if (!empty($_FILES['imagem']['name'])) {
                    $config['upload_path'] = './public/uploads/marca';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 100;
                    $config['max_width'] = 1024;
                    $config['max_height'] = 768;
                    $config['encrypt_name'] = true;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('imagem')) {
                        $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Cadastra Imagem *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>' . $this->upload->display_errors());
                        redirect('Marca/alteracao');
                        exit();
                    } else {
                        $data['imagem'] = $this->upload->data()['file_name'];
                        $actualimage = $this->Marca_model->getId($id)->imagem;
                        if (!empty($actualimage) && file_exists('./public/uploads/marca/' . $actualimage)) {
                            unlink('./public/uploads/marca/' . $actualimage);
                        }
                    }
                }
                if ($this->Marca_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Marca Alterado com Sucesso ! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Marca/index');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i> Marca não sofreu Alterações<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Marca/index');
                }
            }
        }
    }

}
