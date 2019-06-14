<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Veiculo_model');
        $this->load->model('Accessorio_model');
    }

    public function index() {
        $data['veiculo'] = $this->Veiculo_model->getAll();
        $this->load->view('includes/header');
        $this->load->view('paginainicial/home', $data);
        $this->load->view('includes/footer');
    }

    public function veiculo() {
        $data['veiculo'] = $this->Veiculo_model->getAll();
        $this->load->view('includes/header');
        $this->load->view('paginainicial/veiculo', $data);
        $this->load->view('includes/footer');
    }

    public function accessorio() {
        $data['acess'] = $this->Accessorio_model->getAll();
        $this->load->view('includes/header');
        $this->load->view('paginainicial/accessorio', $data);
        $this->load->view('includes/footer');
    }

    public function contato() {
        $this->load->view('includes/header');
        $this->load->view('paginainicial/contato');
        $this->load->view('includes/footer');
    }

    public function faleConosco() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('texto', 'mensagem', 'required|min_length[10]');
        if ($this->session->userdata('status') == 0) {
            $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Tentar logar e depois fazer essa processo *_*</div>');
        } else {
            if ($this->form_validation->run() == false) {
                $this->contato();
            } else {
                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'iso-8859-1';
                $config['wordwrap'] = TRUE;
                $this->email->initialize($config);

                $this->email->from($this->input->post('email'), $this->input->post('nome'));
                $this->email->to('chih.yang@aluno.sc.senac.br');
                $this->email->subject('Mensagem . . .');
                $this->email->message($this->input->post('texto'));
                //Send mail
                if ($this->email->send()) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Email Enviado com Successo ! ! !</div>');
                    redirect(base_url() . 'Home/contato');
                } else {
                    show_error($this->email->print_debugger());
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Falha ao Enviar *_*</div>');
                    redirect(base_url() . 'Home/contato');
                }
            }
        }
    }

}
