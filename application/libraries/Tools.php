<?php

class Tools
{
    
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('sidebar');
        $this->CI->load->model('model');
    }
    

    public function view($halaman, $data = null)
    {

        $this->CI->load->view('partial/head');
        $this->CI->load->view('partial/sidebar');
        $this->CI->load->view('partial/nav');
        $this->CI->load->view("dalam/$halaman",$data);
        $this->CI->load->view('partial/footer');
    }

    public function Notif($text1,$text2,$icon,$alamat)
    {
        $notif = "Swal.fire('$text1','$text2','$icon');";
        $this->CI->session->set_flashdata('PESAN', $notif);
        redirect(base_url($alamat));
    }
    

    public function generateKode($tabel,$kolom,$initial){
        $kode = $this->CI->model->query("SELECT MAX($kolom) as maxKode FROM $tabel")->row();
        $kode = $kode->maxKode;

        $noUrut = (int) substr($kode, 3,17);
        $noUrut++;
        $kode = $initial.sprintf('%07s',$noUrut);
        return $kode; 
    }



}
