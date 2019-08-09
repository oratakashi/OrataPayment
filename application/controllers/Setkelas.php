<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Setkelas extends CI_Controller {
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
            $this->load->model('msiswa');
            $this->load->model('msetkelas');
            $this->conf = $this->core->read_conf()->row();
            $this->sch = $this->core->read_sch()->row();
        }
        public function index()
        {
            if(empty($this->session->userdata('id_operator'))){
                redirect('','refresh');
            }else{
                $data = [
                    'judul'             => 'Data Master Pengaturan Kelas - '.$this->conf->nama_apps,
                    'nama_apps'         => $this->conf->nama_apps,
                    'versi'             => $this->conf->versi,
                    'code_name'         => $this->conf->code_name,
                    'nama_sekolah'      => $this->sch->nama_sekolah,
                    'data_ta'           => $this->mta->read()->result_array(),
                    'data_kls'          => $this->mkelas->readAll()->result_array(),
                    'content'           => 'setkelas'
                ];
                $this->load->view('main', $data);
            }
        }

        public function read()
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){

                $data = $this->msiswa->read_murid_baru()->result_array();

                echo json_encode(array("siswa"=>$data));
            }
        }

        public function create()
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $data = array(
                    "id_kelas"  => $this->input->post('id_kelas'),
                    "id_ta"     => $this->input->post('id_ta'),
                    "nis"     => $this->input->post('nis')                
                );
                $this->msetkelas->create($data);
                $result['code'] = "1";
                $result["message"] = "Berhasil";
    
                echo json_encode($result);
            }
        }
        
    }
    
    /* End of file Setkelas.php */
    
?>