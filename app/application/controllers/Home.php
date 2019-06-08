<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Veiculo_model');
        $this->load->model('Accessorio_model');
    }

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('paginainicial/home');
        $this->load->view('includes/footer');
    }
    public function veiculo()
    {
        $data['veiculo'] = $this->Veiculo_model->getAll();
        $this->load->view('includes/header');
        $this->load->view('paginainicial/veiculo', $data);
        $this->load->view('includes/footer');
    }
    public function accessorio()
    {
        $data['acess'] = $this->Accessorio_model->getAll();
        $this->load->view('includes/header');
        $this->load->view('paginainicial/accessorio', $data);
        $this->load->view('includes/footer');
    }
}
