<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $level_akses = $this->session->userdata('level_akses');
        if($level_akses == 'admin'){
            $this->load->library('validasi');
            $this->load->library('tools');
            $this->load->model('model');
        }else{
            redirect(base_url('Login/Logout'));
        }
    }

    public function hapusData()
    {
        $kolom =  $this->uri->segment(3);
        $kdData = $this->uri->segment(4);
        $tabel = $this->uri->segment(5);
        $alamatKembali = $this->uri->segment(6);
        if($alamatKembali == '' || $tabel == '' || $alamatKembali == '' || $kolom == ''){
            redirect(base_url('Login/Logout'));
        }else{
            $this->model->hapusData($tabel,[$kolom => $kdData]);
            $this->tools->Notif('Berhasil', 'Data Berhasil di Hapus','success','Admin/'.$alamatKembali);
        }
    }
    
    public function index()
    {
        $this->tools->view('0_blank');
    }

    public function dataPengguna()
    {
        $join = [['tb_akun', 'tb_akun.kd_pengguna = tb_pengguna.kd_pengguna','INNER JOINT']];
        $data['data'] = $this->model->jointTabel('tb_pengguna.*, tb_akun.username, tb_akun.level_akses','tb_pengguna',$join)->result();
        $this->tools->view('1_dataPengguna',$data);
    }

    public function createPengguna()
    {
        $data['username'] = $this->tools->generateKode('tb_akun','username','PMU');
        $this->tools->view('2_tambahDataPengguna',$data);
    }

    public function prosesCreateDataPengguna()
    {
        
        $this->form_validation->set_rules($this->validasi->cekInput('pengguna'));
        if ($this->form_validation->run() == TRUE) {
            $kd_pengguna = $this->tools->generateKode('tb_pengguna','kd_pengguna','PMP');
            $dataPengguna = array(
                'kd_pengguna' => $kd_pengguna,
                'nama' => $this->input->post('nama'),
                'nomor_hp' => $this->input->post('nomor_hp'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            );

            $dataAkun = array(
                'kd_akun' => $this->tools->generateKode('tb_akun','kd_akun','PMU'),
                'kd_pengguna' => $kd_pengguna,
                'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password')),
                'level_akses' => $this->input->post('level_akses')
            );

            $this->model->inputData('tb_pengguna',$dataPengguna);
            $this->model->inputData('tb_akun',$dataAkun);
            
            $this->tools->Notif("Berhasil","Data Anda Berhasil disimpan", "success","Admin/dataPengguna");
        } else {
            $this->tools->Notif("Gagal","Periksa Kemabali Inputan Anda", "error","Admin/createPengguna");
        }
        
        
    }

    public function prosesUpdateDataPengguna()
    {
        $this->form_validation->set_rules($this->validasi->cekInput('update_pengguna'));
        if ($this->form_validation->run() == TRUE) {
            var_dump($_POST);
            $where = array('kd_pengguna' => $this->input->post('kd_pengguna'));
            $dataPengguna = array(
                'nama' => $this->input->post('nama'),
                'nomor_hp'  =>  $this->input->post('nomor_hp'),
                'jenis_kelamin'  =>  $this->input->post('jenis_kelamin'),
            );

            $dataAkun = array(
                'level_akses' => $this->input->post('level_akses')
            );

            $this->model->updateData('tb_pengguna', $dataPengguna,$where);
            $this->model->updateData('tb_akun', $dataAkun,$where);

            $this->tools->Notif('Berhasil','Data berhasil diinputkan','success','Admin/dataPengguna');
            
        } else {
            $this->tools->Notif('Gagal','Data yang anda inputkan tidak sesuai','warning','Admin/dataPengguna');
        }
        
    }

}

/* End of file Admin.php */
