<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kelas extends CI_Controller {
        
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
            $this->load->model('mkelas');
            $this->conf = $this->core->read_conf()->row();
            $this->sch = $this->core->read_sch()->row();
        }
        

        public function index()
        {
            if(empty($this->session->userdata('id_operator'))){
                redirect('','refresh');
            }else{
                if($this->session->userdata('lev_user')=='Kepala Sekolah'){
                    $data = [
                        'judul'             => 'Konfigurasi Kelas - '.$this->conf->nama_apps,
                        'nama_apps'         => $this->conf->nama_apps,
                        'versi'             => $this->conf->versi,
                        'code_name'         => $this->conf->code_name,
                        'nama_sekolah'      => $this->sch->nama_sekolah,
                        'content'           => 'kelas'
                    ];
                    $this->load->view('main', $data);
                }else{
                    
                    redirect('dashboard','refresh');
                    
                }
            }
        }

        /**
         * Method untuk mengambil semua data
         */

        public function read(){
            if($_SERVER['REQUEST_METHOD']=='GET'){
                $data = $this->mkelas->read()->result_array();

                echo json_encode(array("kelas"=>$data));
            }
        }

        /**
         * Method untuk insert tahun ajaran baru ke DB
         */

        public function create(){

            /**
             * Generate ID Kelas
             */
            $no = 1;
            while(true){
                if($no < 10){
                    $id_kelas = "KLS"."0".$no;
                    if($this->mkelas->cekID($id_kelas)){
                        break;
                    }
                }elseif($no < 100){
                    $id_kelas = "KLS".$no;
                    if($this->mkelas->cekID($id_kelas)){
                        break;
                    }
                }else{
                    break;
                }
                $no++;
            }
            /* ========================================== */ 
            $data = array(
                'id_kelas' => $id_kelas,
                'kelas'     => $this->input->post('kelas')
            );

            $this->mkelas->create($data);

            $result['code'] = "1";
            $result["message"] = "Berhasil";

            echo json_encode($result);
        }

        /**
         * Method untuk hapus tahun ajaran dari DB
         */

        public function delete(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $id_kelas = $this->input->post('id_kelas');
                
                $this->mkelas->delete($id_kelas);

                $result['success'] = "1";
                $result["message"] = "Berhasil";

                echo json_encode($result);
            }else{
                $result['success'] = "0";
                $result["message"] = "Gagal";

                echo json_encode($result);
            }
        }
    }

    /* End of file Kelas.php */
    
?>