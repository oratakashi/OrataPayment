<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Mkelas extends CI_Model {
    
        public function readAll(){
            return $this->db->get('tb_kelas');
        }

        public function read(){
            $this->db->where_not_in('id_kelas', 'KLS00');
            
            return $this->db->get('tb_kelas');
        }

        public function create($data){
            $this->db->insert('tb_kelas', $data);
        }

        public function cekID($id_kelas){
            $this->db->where('id_kelas', $id_kelas);
            $data = $this->db->get('tb_kelas');
            return $data->num_rows() < 1;
        }

        public function delete($id_kelas){
            $this->db->where('id_kelas', $id_kelas);
            return $this->db->delete('tb_kelas');
        }
        
        public function read_id($id_kelas)
        {
            $this->db->where('id_kelas', $id_kelas);
            return $this->db->get('tb_kelas');
        }

        public function read_nis_aktif($nis)
        {
            $this->db->join('tb_setkelas', 'tb_setkelas.id_kelas = tb_kelas.id_kelas', 'left');
            $this->db->join('tb_tahunajaran', 'tb_tahunajaran.id_ta = tb_setkelas.id_ta', 'left');
            $this->db->where('tb_setkelas.nis', $nis);
            
            return $this->db->get('tb_kelas');
        }

        public function read_riwayat($nis)
        {
            $this->db->join('tb_setkelas', 'tb_setkelas.id_kelas = tb_kelas.id_kelas', 'left');
            $this->db->join('tb_tahunajaran', 'tb_tahunajaran.id_ta = tb_setkelas.id_ta', 'left');
            $this->db->where('tb_setkelas.nis', $nis);
            return $this->db->get('tb_kelas');
        }
    }
    
    /* End of file Mkelas.php */
    
?>