<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('validasi');
        $this->load->library('tools');
        $this->load->model('model');
    }
    

    public function index()
    {
        $this->load->view('V_Login');
    }

    public function validasiLogin()
    {
        $this->form_validation->set_rules($this->validasi->cekInput('login'));
        if ($this->form_validation->run() == TRUE) {
            $where = array(
                'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password'))
            );

            $data = $this->model->ambilDataTertentu('tb_akun',$where)->row();

            if($data != null){
                var_dump($data);
                $sess = array(
                    "kd_akun" => $data->kd_akun,
                    "kd_pengguna" => $data->kd_pengguna,
                    "username" => $data->username,
                    "level_akses" => $data->level_akses
                );

                $this->session->set_userdata($sess);
                if($data->level_akses == 'admin'){
                    redirect(base_url('Admin'));
                }elseif ($data->level_akses == 'umum') {
                    redirect(base_url('Umum'));
                }else{
                    redirect(base_url('Login/Logout'));
                }

            }else{
                $this->tools->Notif("Gagal","Username atau Password yang anda masukan salah", "error","Login/Index");
            }
        } else {
            $this->tools->Notif("Gagal","Username atau Password yang anda masukan salah", "error","Login/Index");
        }
        
    }

    public function Logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Login/Index'));
    }

}

/* End of file Login.php */
