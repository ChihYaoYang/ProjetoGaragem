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
        $data['veiculo'] = $this->Veiculo_model->getAll();
        $this->load->view('includes/header');
        $this->load->view('paginainicial/home', $data);
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

    public function faleConosco()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('texto', 'mensagem', 'required|min_length[10]');
        if ($this->form_validation->run() == false) {
            $this->load->view('includes/header');
            $this->load->view('paginainicial/contato');
            $this->load->view('includes/footer');
        } else {
            //Configuração de email
            $this->load->library("email");
            $config["protocol"] = "smtp";
            $config["smtp_host"] = "ssl://smtp.gmail.com";
            $config["smtp_user"] = "chih.yang@aluno.sc.senac.br";
            $config["smtp_pass"] = "sq092ppe76";
            $config['wordwrap'] = TRUE;
            $config["charset"] = "utf-8";
            $config["mailtype"] = "html";
            $config["newline"] = "\r\n";
            $config["smtp_port"] = '465';
            $this->email->initialize($config);

            $this->email->from($this->input->post('email'), $this->input->post('nome'));
            $this->email->to('chih.yang@aluno.sc.senac.br');
            $this->email->subject('VendCar');
            $this->email->message($this->input->post('texto'));
            //Send email
            if ($this->session->userdata('status') == 0) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Tentar logar e depois fazer essa processo *_*</div>');
                redirect('Home/faleConosco');
            } else {
                if ($this->email->send()) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Email Enviado com Successo ! ! !</div>');
                    redirect(base_url() . 'Home/faleConosco');
                } else {
                    show_error($this->email->print_debugger());
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Falha ao Enviar *_*</div>');
                    redirect(base_url() . 'Home/faleConosco');
                }
            }
        }
    }
}
