<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pedido extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pedido_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
        //Fuso Horario
        date_default_timezone_set('America/Sao_Paulo');
    }

    //Pedido Veiculo
    public function index($id) {
        $data['veiculo'] = $this->Pedido_model->getAllId($id);
        $data['paga'] = $this->Pedido_model->getAll();
        $this->load->view('includes/header');
        $this->load->view('pedido/lista', $data);
        $this->load->view('includes/footer');
    }

    public function cadastrar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('paga', 'pagamento', 'required');
            $this->form_validation->set_rules('cpf', 'cpf', 'required');
            $this->form_validation->set_rules('rg', 'rg', 'required|max_length[20]');
            $this->form_validation->set_rules('telefone', 'telefone', 'required');
            if ($this->form_validation->run() == false) {
                $this->index($id);
            } else {
                $veiculo = $this->Pedido_model->getAllId($id);
                $data = array(
                    'cd_formapagamento' => $this->input->post('paga'),
                    'cd_usuario' => $this->session->userdata('idUsuario'), //Pega id automaticamente  pelo session
                    'cd_veiculo' => $veiculo->id,
                    'cpf' => $this->input->post('cpf'),
                    'rg' => $this->input->post('rg'),
                    'telefone' => $this->input->post('telefone'),
                    'data_pedido' => date('Y-m-d H:i:s')
                );
                if ($this->Pedido_model->insert($data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Compra efetuada com Sucesso ! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Pedido/compra');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Falha ao Comprar *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Pedido/compra');
                }
            }
        }
    }

    //Pedido Acessorio
    public function acess($id) {
        $data['acess'] = $this->Pedido_model->getAllIdAcessorio($id);
        $data['paga'] = $this->Pedido_model->getAll();
        $this->load->view('includes/header');
        $this->load->view('pedido/listaAcess', $data);
        $this->load->view('includes/footer');
    }

    public function cadastrarAcess($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('paga', 'pagamento', 'required');
            $this->form_validation->set_rules('cpf', 'cpf', 'required');
            $this->form_validation->set_rules('rg', 'rg', 'required|max_length[20]');
            $this->form_validation->set_rules('telefone', 'telefone', 'required');
            if ($this->form_validation->run() == false) {
                $this->acess($id);
            } else {
                $acess = $this->Pedido_model->getAllIdAcessorio($id);
                $data = array(
                    'cd_formapagamento' => $this->input->post('paga'),
                    'cd_usuario' => $this->session->userdata('idUsuario'), //Pega id automaticamente  pelo session
                    'cd_acessorio' => $acess->id,
                    'cpf' => $this->input->post('cpf'),
                    'rg' => $this->input->post('rg'),
                    'telefone' => $this->input->post('telefone'),
                    'data_pedido' => date('Y-m-d H:i:s')
                );
                if ($this->Pedido_model->insert($data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Compra efetuada com Sucesso ! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Pedido/compra');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Falha ao Comprar *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Pedido/compra');
                }
            }
        }
    }

    public function compra() {
        $data['compra'] = $this->Pedido_model->getAllCompra();
        $this->load->view('includes/header');
        $this->load->view('pedido/compra', $data);
        $this->load->view('includes/footer');
    }

}
