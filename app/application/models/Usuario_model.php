<?php

/**
 * Classe model da tabela usuario do DB
 * @author Yang
 */
class Usuario_model extends CI_Model {

    const password = 'ryanSENAC';
    const table = 'tb_usuario';

    //GetAll
    public function getAll() {
        $query = $this->db->get(self::table);
        return $query->result();
    }

    //Get Email
    public function getEmail($email) {
        $query = $this->db->query("SELECT email FROM tb_usuario WHERE email='$email'");
        return $query->row();
    }

    //GET_ID
    public function getId($id) {
        $this->db->where('id', $id);
        $query = $this->db->get(self::table);
        //retorna apenas a primeira linha
        return $query->row(0);
    }

    //Update
    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $data['senha'] = sha1($data['senha'] . self::password);
            $this->db->update(self::table, $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    //Update Email
    public function updateEmail($data = array(), $email) {
        $this->db->set('senha', sha1($data['senha'] . self::password));
        $this->db->where('email', $email);
        $this->db->update('tb_usuario');
        return $this->db->affected_rows();
    }

    //Método que busca usuario no banco de dados
    //Recebe parametro email e senha
    public function getUsuario($email, $senha) {
        //Validar Email or Username and senha
        $this->db->where('(email = "' . $email . '" OR nome = "' . $email . '") AND senha ="' . sha1($senha . 'ryanSENAC') . '"');
        $query = $this->db->get(self::table);
        return $query->row(0);
    }

    //Insert
    //Passa $data no conttroller como array
    public function insert($data = array()) {
        $data['senha'] = sha1($data['senha'] . self::password);
        $this->db->insert(self::table, $data);
        return $this->db->affected_rows();
    }
    //Ativação
    public function activate($data, $id){
        $this->db->where('id', $id);
        $this->db->update(self::table, $data);
        return $this->db->affected_rows();
	}
    //Método que valida na sessão se o usuário esta logado
    public function verificaLogin() {
        //resgata na sessão o status logado e o id do usuario
        $logado = $this->session->userdata('logado');
        $idUsuaio = $this->session->userdata('idUsuario');
        //verifica se o status está setado, ou não está true, ou não tem isUsuario
        if ((!isset($logado)) || ($logado != TRUE) || ($idUsuaio <= 0)) {
            //redireciona obrigando o login...
            redirect(base_url() . 'Usuario/login');
        }
    }

    //Verifica session
    public function checkSession() {
        $status = $this->session->userdata('status');
        if ($status == 2) {
            redirect(base_url() . 'Home/index');
        }
    }

}
