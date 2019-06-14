<?php

/*
 * @author Yang  
 */

class Pedido_model extends CI_model {

    public function getAll() {
        $query = $this->db->get('tb_formapagamento');
        return $query->result();
    }

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

    public function insert($data = array()) {
        $this->db->insert('tb_pedido', $data);
        return $this->db->affected_rows();
    }

}
