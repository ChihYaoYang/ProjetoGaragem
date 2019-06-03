<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('includes/header');
        $this->load->view('paginainicial/home');
        $this->load->view('includes/footer');
    }

}
