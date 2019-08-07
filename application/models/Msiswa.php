<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Msiswa extends CI_Model {
    
        public function read(){
            return $this->db->get('tb_siswa');
        }

        public function create($data)
        {
            return $this->db->insert('tb_siswa', $data);
        }
    
    }
    
    /* End of file Msiswa.php */
    
?>