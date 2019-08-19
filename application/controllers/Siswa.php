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
        
        public function detail()
        {
            $nis = $this->uri->segment(3);
            $kelas_aktif = array();
            $data_kelas = array();
            
            $data = array();
            if($this->mkelas->read_nis_aktif($nis)->num_rows() > 0){
                $kelas_aktif = $this->mkelas->read_nis_aktif($nis)->row_array();
                
            }else{
                $kelas_aktif['kelas'] = "Tidak ada";
            }
            if($this->mkelas->read_riwayat($nis)->num_rows() > 0){
                $data_kelas['isi_data'] = $this->mkelas->read_riwayat($nis)->result_array();
                $data_kelas['cek'] = "not_null";
            }else{
                $data_kelas['cek'] = "null";
            }
            $data = array(
                "data_siswa" => $this->msiswa->read_nis($nis)->row_array(),
                "kelas_aktif"   => $kelas_aktif,
                "data_kelas"    => $data_kelas
            );
            echo json_encode($data);
        }

        public function filter()
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $id_ta = $this->input->post('id_ta');
                $id_kelas = $this->input->post('id_kelas');
                $status = $this->input->post('status');
                
                $data = $this->msiswa->filter_siswa($id_ta, $id_kelas, $status)->result_array();

                echo json_encode(array("siswa"=>$data));
            }
        }

        public function delete()
        {
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $nis = $this->input->post('nis');
                
                $this->msiswa->delete($nis);

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
    
    /* End of file Siswa.php */
    
?>