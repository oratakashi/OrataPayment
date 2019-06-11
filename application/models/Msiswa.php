<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Msiswa extends CI_Model {
    
        public function read(){
            return $this->db->get('tb_siswa');
        }
    
    }
    
    /* End of file Msiswa.php */
    
?>