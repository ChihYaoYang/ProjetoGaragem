<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Marca_model');
    }

    public function index() {
        $data['marca'] = $this->Marca_model->getAll();
        $data['total'] = $this->Marca_model->countrow();
        $this->load->view('includes/header');
        $this->load->view('marca/lista', $data);
        $this->load->view('includes/footer');
    }
}
?>