<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mcore extends CI_Model {

    public function read_conf(){
        return $this->db->get('tb_settings');
    }

    public function read_sch(){
        return $this->db->get('tb_sekolah');
    }

    public function update_sch($data){
        return $this->db->update('tb_sekolah', $data);
        
    }
}

/* End of file MCore.php */
