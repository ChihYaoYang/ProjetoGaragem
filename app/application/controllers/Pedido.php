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
        $this->load->view('includes/header');
        $this->load->view('pedido/lista', $data);
        $this->load->view('includes/footer');
    }

}
