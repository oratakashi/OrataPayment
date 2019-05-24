<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Ta extends CI_Controller {

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
                    'judul'             => 'Konfigurasi Tahun Ajaran - '.$this->conf->nama_apps,
                    'nama_apps'         => $this->conf->nama_apps,
                    'versi'             => $this->conf->versi,
                    'code_name'         => $this->conf->code_name,
                    'nama_sekolah'      => $this->sch->nama_sekolah,
                    'content'           => 'ta'
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
            $data = $this->mta->read()->result_array();

            echo json_encode(array("ta"=>$data));
        }
    }

    /**
     * Method untuk mengubah status aktif tahun ajaran
     */

    public function update(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id_ta = $this->input->post('id_ta');

            $data = array(
                'sta_aktif' => '0'
            );

            $this->mta->reset_aktif($data);
            
            $data = $this->mta->read_id($id_ta)->row();
            if($data->sta_aktif == '1'){
                $data = array(
                    'sta_aktif' => '0'
                );
            }elseif ($data->sta_aktif == '0') {
                $data = array(
                    'sta_aktif' => '1'
                );
            }

            
            $this->mta->update($id_ta, $data);

            $result['code'] = "1";
            $result["message"] = "Berhasil";
    
            echo json_encode($result);
        }else{
            $result['code'] = "0";
            $result["message"] = "Gagal";
    
            echo json_encode($result);
        }
    }

    /**
     * Method untuk insert tahun ajaran baru ke DB
     */

    public function create(){
        $data = array(
            'tahun_ajaran' => $this->input->post('ta'),
            'sta_aktif' => '0'
        );

        $this->mta->create($data);

        $result['code'] = "1";
        $result["message"] = "Berhasil";

        echo json_encode($result);
    }

    /**
     * Method untuk hapus tahun ajaran dari DB
     */

    public function delete(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id_ta = $this->input->post('id_ta');
            
            $this->mta->delete($id_ta);

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

/* End of file Ta.php */
