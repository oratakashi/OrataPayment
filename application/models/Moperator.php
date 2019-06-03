<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model Moperator berfungsi untuk menghubungkan CI dengan DB
 * dan menghandle yang berhubungan dengan pengguna
 */
class Moperator extends CI_Model {

    public function login($data){
        return $this->db->get_where('tb_operator', $data);
    }

    public function read($id_operator){
        $this->db->where_not_in('id_operator', $id_operator);
        
        $this->db->select('id_operator, nama_operator, email, lev_user, foto');
        return $this->db->get('tb_operator');
    }
    public function read_id($id_operator){
        $this->db->select('id_operator, nama_operator, email, lev_user, foto');
        $this->db->where('id_operator', $id_operator);
        
        return $this->db->get('tb_operator');
    }

    public function cekID($id_operator){
        $this->db->where('id_operator', $id_operator);
        $data = $this->db->get('tb_operator');
        return $data->num_rows() < 1;
    }

    public function create($data){
        return $this->db->insert('tb_operator', $data);
    }

    public function delete($id_operator){
        $this->db->where('id_operator', $id_operator);
        return $this->db->delete('tb_operator');
    }

    public function update($id_operator, $data){
        $this->db->where('id_operator', $id_operator);
        return $this->db->update('tb_operator', $data);
    }

}

/* End of file Moperator.php */
