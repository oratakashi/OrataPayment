<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Sekolah extends CI_Controller {
    
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
        $this->conf = $this->core->read_conf()->row();
        $this->sch = $this->core->read_sch()->row();
    }

    public function index()
    {
        if(empty($this->session->userdata('id_operator'))){
            redirect('','refresh');
        }else{
            if($this->session->userdata('lev_user')=='Kepala Sekolah'){
                $data_sekolah = $this->core->read_sch()->row_array();
                $data = [
                    'judul'             => 'Konfigurasi Sekolah - '.$this->conf->nama_apps,
                    'nama_apps'         => $this->conf->nama_apps,
                    'versi'             => $this->conf->versi,
                    'code_name'         => $this->conf->code_name,
                    'nama_sekolah'      => $this->sch->nama_sekolah,
                    'content'           => 'sekolah',
                    'data'              => $data_sekolah
                ];
                $this->load->view('main', $data);
            }else{
                
                redirect('dashboard','refresh');
                
            }
        }
    }
    
    public function simpan(){
        if($this->uri->segment(3) == 'info'){
            $data = array(
                'nama_sekolah' => $this->input->post('nama_sekolah'),                
                'npsn' => $this->input->post('npsn'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'no_telp' => $this->input->post('no_telp')
            );

            $this->core->update_sch($data);

            echo "<script>alert('Data Tersimpan!')</script>";
            redirect('sekolah#section-linemove-1','refresh');
            
        }
    }
 }
 
 /* End of file Sekolah.php */
 
?>