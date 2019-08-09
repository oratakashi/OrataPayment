<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Msetkelas extends CI_Model {
    
        public function create($data)
        {
            return $this->db->insert('tb_setkelas', $data);
        }
    
    }
    
    /* End of file Msetkelas.php */
    
?>