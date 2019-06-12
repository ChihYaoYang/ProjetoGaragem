<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pedido extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Veiculo_model');
        $this->load->model('Pedido_model');
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
        $this->Usuario_model->checkSession();
    }

    public function index($id) {
        $data['veiculo'] = $this->Veiculo_model->getId($id);
        $this->load->view('includes/header');
        $this->load->view('pedido/lista', $data);
        $this->load->view('includes/footer');
    }

}
