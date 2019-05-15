<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Mta extends CI_Model {

    public function read(){
        return $this->db->get('tb_tahunajaran');
    }

    public function update($id_ta, $data){
        $this->db->where('id_ta', $id_ta);
        return $this->db->update('tb_tahunajaran', $data);
    }

    public function read_id($id_ta){
        $this->db->where('id_ta', $id_ta);
        return $this->db->get('tb_tahunajaran');
    }

}

/* End of file Mta.php */
