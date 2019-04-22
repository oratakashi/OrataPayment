<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends CI_Controller {

        /**
         * Atribute Conf untuk menyimpan data konfigurasi aplikasi
         * data tersimpan dalam database dan model Mcore di load otomatis
         * begitu applikasi di jalankan
         */
        
        private $conf = "";
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('moperator');
            $this->conf = $this->core->read_conf()->row();
        }
        

        public function index()
        {
            $cookie = get_cookie('id_operator');
            if(empty($this->session->userdata('id_operator'))){
                if($cookie == ''){
                    if(empty($this->uri->segment(2))){
                        $data = [
                            'judul' => 'Login - '.$this->conf->nama_apps,
                            'nama_apps' => $this->conf->nama_apps,
                            'deskripsi' => $this->conf->deskripsi,
                            'versi' => $this->conf->versi,
                            'code_name' => $this->conf->code_name,
                        ];
                        $this->load->view('login', $data);
                    }else{
                        $data = [
                            'judul' => 'Login - '.$this->conf->nama_apps,
                            'nama_apps' => $this->conf->nama_apps,
                            'deskripsi' => $this->conf->deskripsi,
                            'versi' => $this->conf->versi,
                            'code_name' => $this->conf->code_name,
                            'error' => 'Email atau Katasandi Salah'
                        ];
                        $this->load->view('login', $data);
                    }
                    
                }else{
                    $data = array(
                        'email' => base64_decode(get_cookie('email')),
                        'pass' => base64_decode(get_cookie('token'))
                    );

                    $cek = $this->moperator->login($data)->num_rows();
                
                    if($cek == 1){
                        $data = $this->moperator->login($data)->row();
                        $array = array(
                            'id_operator' => $data->id_operator,
                            'nama_operator' => $data->nama_operator,
                            'email' => $data->email,
                            'lev_user' => $data->lev_user,
                            'foto' => $data->foto
                        );
                        
                        $this->session->set_userdata( $array );

                        $this->input->set_cookie('id_operator', base64_encode($data->id_operator), 3600*24*7);
                        $this->input->set_cookie('lev_user', base64_encode($data->lev_user), 3600*24*7);
                        $this->input->set_cookie('email', base64_encode($data->email), 3600*24*7);
                        $this->input->set_cookie('token', base64_encode($data->pass), 3600*24*7);
                                            
                        redirect('','refresh');
                    }else{
                        redirect('auth/logout','refresh');
                    }
                }
            }else{
                $data = [
                    'judul' => 'Dashboard - '.$this->conf->nama_apps,
                    'nama_apps' => $this->conf->nama_apps,
                    'versi' => $this->conf->versi,
                    'code_name' => $this->conf->code_name,
                    'content' => 'dashboard'
                ];
                $this->load->view('main', $data);
            }
        }

        public function auth(){
            if(empty($this->uri->segment(2))){
                $data = array(
                    'email' => $this->input->post('email'),
                    'pass' => md5($this->input->post('pass'))
                );

                $cek = $this->moperator->login($data)->num_rows();
                
                if($cek == 1){
                    $data = $this->moperator->login($data)->row();
                    $array = array(
                        'id_operator' => $data->id_operator,
                        'nama_operator' => $data->nama_operator,
                        'email' => $data->email,
                        'lev_user' => $data->lev_user,
                        'foto' => $data->foto
                    );
                    
                    $this->session->set_userdata( $array );

                    if(!empty($this->input->post('remmember'))){
                        $this->input->set_cookie('id_operator', base64_encode($data->id_operator), 3600*24*7);
                        $this->input->set_cookie('lev_user', base64_encode($data->lev_user), 3600*24*7);
                        $this->input->set_cookie('email', base64_encode($data->email), 3600*24*7);
                        $this->input->set_cookie('token', base64_encode($data->pass), 3600*24*7);
                                               
                        redirect('','refresh');
                        
                    }else{
                        redirect('','refresh');
                    }
                }else{
                    redirect('sessions/error','refresh');
                }
            }else{
                delete_cookie('id_operator');
                delete_cookie('lev_user');
                delete_cookie('email');
                delete_cookie('token');
                $this->session->sess_destroy();
                redirect('','refresh');
            }
        }
    }
?>