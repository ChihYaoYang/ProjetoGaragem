<?php

/*
 * @author Yang  
 */

class Pedido_model extends CI_model {

    //Forma pagamento
    public function getAll() {
        $query = $this->db->get('tb_formapagamento');
        return $query->result();
    }

    public function getAllCompra() {
        $this->db->select('tb_pedido.*, tb_formapagamento.descricao, tb_usuario.nome as username, tb_veiculo.imagem as veiculo, tb_acessorio.imagem as acessorio');
        $this->db->from('tb_pedido');
        $this->db->join('tb_formapagamento', 'tb_formapagamento.id=tb_pedido.cd_formapagamento', 'inner');
        $this->db->join('tb_usuario', 'tb_usuario.id=tb_pedido.cd_usuario', 'inner');
        $this->db->join('tb_veiculo', 'tb_veiculo.id=tb_pedido.cd_veiculo', 'left');
        $this->db->join('tb_acessorio', 'tb_acessorio.id=tb_pedido.cd_acessorio', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    //Veículo
    public function getAllId($id) {
        $this->db->select('tb_veiculo.*, tb_marca.nome as marca, tb_cor.descricao as cor, tb_modelo.nome as modelo');
        $this->db->from('tb_veiculo');
        $this->db->join('tb_marca', 'tb_marca.id=tb_veiculo.cd_marca', 'inner');
        $this->db->join('tb_cor', 'tb_cor.id=tb_veiculo.cd_cor', 'inner');
        $this->db->join('tb_modelo', 'tb_modelo.id=tb_veiculo.cd_modelo', 'inner');
        $this->db->where('tb_veiculo.id', $id);
        $query = $this->db->get();
        return $query->row(0);
    }

    //Acessorio
    public function getAllIdAcessorio($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_acessorio');
        return $query->row(0);
    }

    public function insert($data = array()) {
        $this->db->insert('tb_pedido', $data);
        return $this->db->affected_rows();
    }

}
