<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Siswa extends CI_Controller {
        
        /**
         * Atribute Conf dan Sch untuk menyimpan data konfigurasi aplikasi
         * data tersimpan dalam database dan model Mcore di load otomatis
         * begitu aplikasi di jalankan
         */
        
        private $conf   = "";
        private $sch    = "";

        public function __construct()
        {
            parent::__construct();
            $this->load->model('mta');
            $this->load->model('mkelas');
            
            $this->conf = $this->core->read_conf()->row();
            $this->sch = $this->core->read_sch()->row();
        }

        public function index()
        {
            if(empty($this->session->userdata('id_operator'))){
                redirect('','refresh');
            }else{
                $data = [
                    'judul'             => 'Data Siswa - '.$this->conf->nama_apps,
                    'nama_apps'         => $this->conf->nama_apps,
                    'versi'             => $this->conf->versi,
                    'code_name'         => $this->conf->code_name,
                    'nama_sekolah'      => $this->sch->nama_sekolah,
                    'data_ta'           => $this->mta->read()->result_array(),
                    'data_kls'          => $this->mkelas->readAll()->result_array(),
                    'content'           => 'siswa'
                ];
                $this->load->view('main', $data);
            }
        }
    
    }
    
    /* End of file Siswa.php */
    
?>