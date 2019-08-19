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
        
        public function read_murid_baru()
        {
            return $this->db->query("SELECT * from tb_siswa where nis not in (SELECT nis from tb_setkelas)");
        }
        
        public function read_nis($nis)
        {
            $this->db->where('nis', $nis);
            return $this->db->get('tb_siswa');
        }

        public function filter_siswa($id_ta, $id_kelas, $status)
        {
            $this->db->join('tb_setkelas', 'tb_setkelas.nis = tb_siswa.nis');
            $this->db->where('tb_setkelas.id_kelas', $id_kelas);
            $this->db->where('tb_setkelas.id_ta', $id_ta);
            $this->db->where('tb_siswa.status', $status);
            return $this->db->get('tb_siswa');
        }

        public function delete($nis)
        {
            $this->db->where('nis', $nis);
            return $this->db->delete('tb_siswa');
        }
    }
    
    /* End of file Msiswa.php */
    
?>