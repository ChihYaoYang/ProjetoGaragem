<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Recupassword extends CI_Controller {

    public function index() {
        $this->load->view('email/recupassword');
    }

    public function sendmail() {
        $this->form_validation->set_rules('email', 'email', 'required');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $this->email->initialize($config);

            $this->email->from('chih.yang@aluno.sc.senac.br', 'Admin');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Send Email Codeigniter');
            $this->email->message('The email send using codeigniter library');
            //Send mail
            if ($this->email->send()) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Email Enviado com Successo Checky seu Email</div>');
                redirect(base_url() . 'Usuario/login');
            } else {
                show_error($this->email->print_debugger());
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Falha ao Enviar *_*</div>');
                $this->load->view('email/recupassword');
            }
        }
    }

}
