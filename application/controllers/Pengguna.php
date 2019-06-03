<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
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
        $this->load->model('moperator');
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
                    'judul'             => 'Konfigurasi Pengguna - '.$this->conf->nama_apps,
                    'nama_apps'         => $this->conf->nama_apps,
                    'versi'             => $this->conf->versi,
                    'code_name'         => $this->conf->code_name,
                    'nama_sekolah'      => $this->sch->nama_sekolah,
                    'content'           => 'pengguna'
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

    public function read()
    {
        $data = $this->moperator->read($this->session->userdata('id_operator'))->result_array();
        
        echo json_encode(array("pengguna"=>$data));
    }

    /**
     * Method untuk mengambil ID terbaru
     * ID di generate sesuai dengan Tgl saat ini
     */

    public function getid(){
        $tgl = date('Ymd');
        $no = 1;
        while(true){
            if($no < 10){
                $id_operator = $tgl.'0'.$no;
                if($this->moperator->cekid($id_operator)){
                    break;
                }
            }elseif($no<100){
                $id_operator = $tgl.'0'.$no;
                if($this->moperator->cekid($id_operator)){
                    break;
                }
            }else{
                $id_operator = "Data Penuh!";
                break;
            }
            $no++;
        }

        echo json_encode(array("id_operator"=>$id_operator));
    }

    /**
     * Method untuk insert pengguna baru ke DB
     */
    public function create(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data = array(
                'id_operator'   => $this->input->post('id_operator'),
                'nama_operator' => $this->input->post('nama_operator'),
                'pass'          => md5($this->input->post('id_operator')),
                'email'         => $this->input->post('email'),
                'lev_user'      => $this->input->post('lev_user'),
                'foto'          => 'no-pic.png'
            );
    
            $this->moperator->create($data);
    
            $result['success'] = "1";
            $result["message"] = "Berhasil";
    
            echo json_encode($result);
        }else{
            $result['success'] = "0";
            $result["message"] = "Gagal";
    
            echo json_encode($result);
        }
    }

    /**
     * Method untuk menghapus pengguna dari DB
     */
    public function delete(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id_operator = $this->input->post('id_operator');
            
            $this->moperator->delete($id_operator);

            $result['success'] = "1";
            $result["message"] = "Berhasil";
    
            echo json_encode($result);
        }else{
            $result['success'] = "0";
            $result["message"] = "Gagal";
    
            echo json_encode($result);
        }
    }

    /**
     * Method untuk melihat detail pengguna
     */
    public function read_data(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id_operator = $this->input->post('id_operator');
            
            $data = $this->moperator->read_id($id_operator)->result_array();

            echo json_encode($data[0]);
        }else{
            $result['success'] = "0";
            $result["message"] = "Gagal";
    
            echo json_encode($result);
        }
    }

    public function update(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id_operator = $this->input->post('id_operator');
            
            $data = array(
                'nama_operator' => $this->input->post('nama_operator'),
                'email'         => $this->input->post('email'),
                'lev_user'      => $this->input->post('lev_user')
            );
            
            $this->moperator->update($id_operator, $data);

            if($id_operator == $this->session->userdata('id_operator')){
                
                $array = array(
                    'nama_operator' => $this->input->post('nama_operator'),
                    'email' => $this->input->post('email'),
                    'lev_user' => $this->input->post('lev_user')
                );
                
                $this->session->set_userdata( $array );
                
            }
            $result['code'] = "1";
            $result["message"] = "Berhasil";
    
            echo json_encode($result);
        }else{
            $result['code'] = "0";
            $result["message"] = "Gagal";
    
            echo json_encode($result);
        }
    }

}

/* End of file Pengguna.php */
