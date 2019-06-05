<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Veiculo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Modelo_model');
        $this->load->model('Marca_model');
        $this->load->model('Cor_model');
        $this->load->model('Veiculo_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    public function index() {
        $data['veiculo'] = $this->Veiculo_model->getAll();
        $data['total'] = $this->Veiculo_model->countrow();
        $this->load->view('includes/header');
        $this->load->view('veiculo/lista', $data);
        $this->load->view('includes/footer');
    }

    public function cadastro() {
        $data['modelo'] = $this->Modelo_model->getAll();
        $data['marca'] = $this->Marca_model->getAll();
        $data['cor'] = $this->Cor_model->getAll();
        $this->load->view('includes/header');
        $this->load->view('veiculo/cadastro', $data);
        $this->load->view('includes/footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('id_modelo', 'modelo', 'required');
        $this->form_validation->set_rules('id_marca', 'marca', 'required');
        $this->form_validation->set_rules('id_cor', 'cor', 'required');
        $this->form_validation->set_rules('preco', 'preço', 'required|max_length[10]|numeric');
        $this->form_validation->set_rules('ano', 'ano', 'required|max_length[4]|numeric');
        if ($this->form_validation->run() == false) {
            $this->cadastro();
        } else {
            $data = array(
                'cd_modelo' => $this->input->post('id_modelo'),
                'cd_marca' => $this->input->post('id_marca'),
                'cd_cor' => $this->input->post('id_cor'),
                'preco' => $this->input->post('preco'),
                'ano' => $this->input->post('ano')
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
                    redirect('Veiculo/cadastrar');
                    exit();
                } else {
                    $data['imagem'] = $this->upload->data()['file_name'];
                }
            }
            if ($this->Veiculo_model->insert($data)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Veículo Cadastrado com Sucesso! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                redirect('Veiculo/index');
            } else {
                unlink('./public/uploads/' . $data['imagem']);
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Cadastrar Veículo *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                redirect('Veiculo/cadastro');
            }
        }
    }

}
