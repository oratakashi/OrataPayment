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
            $this->load->model('msiswa');
            
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

        /**
         * Method untuk mengambil semua data
         */

        public function read(){
            if($_SERVER['REQUEST_METHOD']=='GET'){
                $data = $this->msiswa->read()->result_array();
                echo json_encode(array("siswa"=>$data));
            }
        }
        

        public function create()
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                
                $nis = $this->input->post('nis');

                $config['upload_path'] = './media/siswa/';
                $config['allowed_types'] = 'jpg';
                $config['max_size']  = '5000';
                $config['file_name']            = $nis.".jpg";
                $config['overwrite']            = true;
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('foto')){
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                    // echo "<script>alert('Data gagal di simpan!')</script>";
                    // redirect('siswa','refresh');
                }
                else{
                    $data = array('upload_data' => $this->upload->data());
                    $data = array(
                        'nis'           => $nis,
                        'nama_siswa'    => $this->input->post('nama_lengkap'),
                        'jk'            => $this->input->post('jk'),
                        'tmp_lahir'     => $this->input->post('tmp_lahir'),
                        'tgl_lahir'     => date_format(date_create($this->input->post('tgl_lahir')), 'Y-m-d'),
                        'nama_ayah'     => $this->input->post('nama_ayah'),
                        'nama_ibu'      => $this->input->post('nama_ibu'),
                        'no_hp'         => $this->input->post('no_hp'),
                        'email'         => $this->input->post('email'),
                        'alamat'        => $this->input->post('alamat'),
                        'foto'          => $nis.".jpg",
                        'status'        => 'Aktif'
                    );
                    $this->msiswa->create($data);
                    echo "<script>alert('Data berhasil di simpan!')</script>";
                    redirect('siswa','refresh');
                    
                }
                
            }else{
                redirect('siswa','refresh');
            }
        }
    
    }
    
    /* End of file Siswa.php */
    
?>