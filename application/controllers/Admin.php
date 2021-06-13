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

    public function dataTas()
    {
        $data['data'] = $this->model->ambilSemuaData('tb_tas')->result();
        $this->tools->view('3_dataTas',$data);
    }

    public function prosesCreateTas()
    {
        $this->form_validation->set_rules($this->validasi->cekInput('tas'));
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'kd_tas' => $this->tools->generateKode('tb_tas','kd_tas','PMS'),
                'nama_tas' => $this->input->post('nama_tas'),
                'merk' => $this->input->post('merk'),
                'warna' => $this->input->post('warna'),
                'bahan' => $this->input->post('bahan'),
            );

            $this->model->inputData('tb_tas',$data);

            $this->tools->Notif('Berhasil','Data Tas Berhasil disimpan','success','Admin/dataTas');
        } else {
            $this->tools->Notif('Gagal','Periksa Kemabali data inputan anda','error','Admin/dataTas');
        }
    }
    
    public function prosesUpdataTas()
    {
        $this->form_validation->set_rules($this->validasi->cekInput('update_tas'));
        if ($this->form_validation->run() == TRUE) {
            $where = array( 'kd_tas' => $this->input->post('kd_tas'));
            $data = array(
                'nama_tas' => $this->input->post('nama_tas'),
                'merk' => $this->input->post('merk'),
                'warna' => $this->input->post('warna'),
                'bahan' => $this->input->post('bahan'),
            );

            $this->model->updateData('tb_tas',$data,$where);

            $this->tools->Notif('Berhasil','Data Tas Berhasil disimpan','success','Admin/dataTas');
        } else {
            $this->tools->Notif('Gagal','Periksa Kemabali data inputan anda','error','Admin/dataTas');
        }
    }

    public function dataKriteria()
    {
        $data['data'] = $this->model->ambilSemuaData('tb_kriteria')->result();;
        $this->tools->view('5_dataKriteria',$data);
    }

    public function createKriteria()
    {
        $data['bobot'] = $this->model->query('SELECT sum(bobot) as bobot from tb_kriteria')->row();
        $this->tools->view('4_tambahKriteria',$data);
    }

    public function prosesCreateKriteria()
    {
        $this->form_validation->set_rules($this->validasi->cekInput('kriteria'));
        
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'kd_kriteria' => $this->tools->generateKode('tb_kriteria','kd_kriteria','PMK'),
                'kriteria' => $this->input->post('kriteria'),
                'bobot' => $this->input->post('bobot'),
                'core' => $this->input->post('core'),
                'secondary' => $this->input->post('secondary')
            );

            $this->model->inputData('tb_kriteria',$data);
            
            $this->tools->Notif('Berhasil','Data Berhasil Disimpan','success','Admin/createKriteria');
        } else {
            $this->tools->Notif('Gagal','Periksa Kemabali data yang anda inputkan','error','Admin/createKriteria');
        }
        
    }

    public function updateDataKriteria()
    {
        $kd_kriteria = $this->uri->segment(3);
        $data['kriteria'] = $this->model->ambilDataTertentu('tb_kriteria',['kd_kriteria' => $kd_kriteria])->row();
        if($data['kriteria'] != NULL){
            $data['bobot'] = $this->model->query('SELECT sum(bobot) as bobot from tb_kriteria')->row();
            $this->tools->view('4_tambahKriteria',$data);
        }else{
            redirect(base_url('Login/Logout'));
        }
    }

    public function prosesUpdateKriteria()
    {
        $this->form_validation->set_rules($this->validasi->cekInput('kriteria'));
        
        if ($this->form_validation->run() == TRUE) {

            $where = ['kd_kriteria' => $this->input->post('kd_kriteria')];
            
            $data = array(
                'kriteria' => $this->input->post('kriteria'),
                'bobot' => $this->input->post('bobot'),
                'core' => $this->input->post('core'),
                'secondary' => $this->input->post('secondary')
            );

            $this->model->updateData('tb_kriteria',$data,$where);
            
            $this->tools->Notif('Berhasil','Data Berhasil Disimpan','success','Admin/dataKriteria');
        } else {
            $this->tools->Notif('Gagal','Periksa Kemabali data yang anda inputkan','error','Admin/dataKriteria');
        }   
    }

    public function tambahDataTarget()
    {
        $where = ['kd_kriteria' =>  $this->uri->segment(3)];
        $data['kriteria'] = $this->model->ambilDataTertentu('tb_kriteria',$where)->row();
        if($data['kriteria'] != null){
            $data['nilai_target'] = $this->nilaiTarget();
            $data['data_target'] = $this->model->ambilDataTertentu('tb_target',$where)->result();
            $this->tools->view('6_dataTargetKriteria',$data);
        }else{
            redirect(base_url('Login/Logout'));
        }
        
    }

    public function prosesCreateTarget()
    {
        $kd_kriteria = $this->input->post('kd_kriteria');
        $this->form_validation->set_rules($this->validasi->cekInput('target'));
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'kd_target' =>  $this->tools->generateKode('tb_target','kd_target','PMT'),
                'kd_kriteria' =>  $kd_kriteria,
                'target' => $this->input->post('target'),
                'bobot_target' => $this->input->post('bobot_target'),
                'tipe' => $this->input->post('tipe'),
            );

            $this->model->inputData('tb_target',$data);
            $this->tools->Notif('Berhasil','Data Berhasil disimpan','success','Admin/tambahDataTarget/'.$kd_kriteria);
        } else {
            $this->tools->Notif('Gagal','Periksa Kembali Inputan yang anda masukan','error','Admin/tambahDataTarget/'.$kd_kriteria);
        }
        
        
    }


    // PROFILE MATCHING

    private function nilaiTarget()
    {
        return ['Sangat Buruk', 'Buruk','Cukup Baik', 'Baik', 'Sangat Baik'];
    }


}

/* End of file Admin.php */
