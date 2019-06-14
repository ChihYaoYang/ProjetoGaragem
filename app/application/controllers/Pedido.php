<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pedido extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pedido_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }

    public function index($id) {
        $data['veiculo'] = $this->Pedido_model->getAllId($id);
        $data['paga'] = $this->Pedido_model->getAll();
        $this->load->view('includes/header');
        $this->load->view('pedido/lista', $data);
        $this->load->view('includes/footer');
        /*
          if ($id > 0) {
          $this->form_validation->set_rules('paga', 'paga', 'required');
          $this->form_validation->set_rules('cpf', 'cpf', 'required');
          $this->form_validation->set_rules('rg', 'rg', 'required');
          $this->form_validation->set_rules('telefone', 'telefone', 'required');
          if ($this->form_validation->run() == false) {
          $this->index($id);
          } else {
          $data = array(
          'cd_formapagamento' => $this->input->post('paga'),
          'cpf' => $this->input->post('cpf'),
          'rg' => $this->input->post('rg'),
          'telefone' => $this->input->post('telefone'),
          );
          if ($this->Pedido_model->insert($data)) {
          $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Compra efetuada com Sucesso ! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
          redirect('Pedido/index');
          } else {
          $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Falha ao Comprar *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
          redirect('Pedido/index');
          }
          }
          }
         */
    }

}
