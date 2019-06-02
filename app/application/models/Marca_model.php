<?php

/*
 * @author Yang  
 */

class Marca_model extends CI_model {

    const table = 'tb_marca';

    //Read
    public function getAll() {
        $this->db->order_by('nome', 'ASC');
        $query = $this->db->get(self::table);
        return $query->result();
    }
    //count
    public function countrow() {
        $query = $this->db->query('SELECT id FROM tb_marca');
        return $query->num_rows();
    }

    //Create
    public function insert($data = array()) {
        $this->db->insert(self::table, $data);
        return $this->db->affected_rows();
    }

    //Delete
    public function delete($id) {
        //Valida
        if ($id > 0) {
                           //Nome do DB
            $this->db->where('id', $id);
            $this->db->delete(self::table);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

    //update
    public function getId($id) {
        $this->db->where('id', $id);
        $query = $this->db->get(self::table);
        return $query->row(0);
    }

    public function update($id, $data = array()) {
        if ($id > 0) {
            $this->db->where('id', $id);
            $this->db->update(self::table, $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }

}
