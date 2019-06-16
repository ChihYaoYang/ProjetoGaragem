<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
    }
    public function index()
    {
        $data['user'] = $this->Usuario_model->getAll();
        $this->load->view('includes/header');
        $this->load->view('user/lista', $data);
        $this->load->view('includes/footer');
    }
    //Update
    public function alteracao($id)
    {
        $data['user'] = $this->Usuario_model->getId($id);
        $this->load->view('includes/header');
        $this->load->view('user/alterar', $data);
        $this->load->view('includes/footer');
    }
    public function alterar($id)
    {
        if ($id > 0) {
            //Validation form
            $this->form_validation->set_rules('nome', 'nome', 'required|max_length[50]');
            $this->form_validation->set_rules('senha', 'senha', 'required|min_length[6]|max_length[20]');
            if ($this->form_validation->run() == false) {
                $this->alteracao($id);
            } else {
                //resgata dados
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'senha' => $this->input->post('senha'),
                );
                //Chama método de update
                if ($this->Usuario_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success"><i class="fas fa-check"></i> Usuário Alterado com Sucesso Tentei loga de novo! ! !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('Usuario/login');
                    $this->session->sess_destroy();
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger"><i class="fas fa-times"></i> Erro ao Alterar Senha *_*<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>');
                    redirect('User/alterar/' . $id);
                }
            }
        } else {
            redirect('User/index');
        }
    }
}
