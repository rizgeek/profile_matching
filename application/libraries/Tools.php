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
        $level_akses = $this->CI->session->userdata('level_akses');


        if($level_akses == 'HR'){
            $menu['MENU'] = $this->CI->sidebar->hr();
            $nama['nama'] = $this->CI->model->ambilDataTertentu('tb_hr',['kd_hr' =>  $this->CI->session->userdata('kd_hr')])->row();
        }else if($level_akses == 'ADMIN'){
            $menu['MENU'] = $this->CI->sidebar->admin();
            $nama['nama'] = 'ADMIN';
        }else if($level_akses == 'OPERATOR' || $level_akses == 'PEMILIK'){
            $nama['nama'] = $this->CI->model->ambilDataTertentu('tb_pengguna',['kd_pengguna' =>  $this->CI->session->userdata('kd_pengguna')])->row();

            $status_jml_kriteria = $this->cekStatusKriteria();
            $status_hr = $this->cekStatusHr();
            $status_aspek = $this->cekStatusAspek();
            $menu['MENU'] = $this->CI->sidebar->operator($status_jml_kriteria, $status_hr, $status_aspek);
        }


        $this->CI->load->view('PARTIAL/head');
        $this->CI->load->view('PARTIAL/sidebar',$menu);
        $this->CI->load->view('PARTIAL/topbar',$nama);
        $this->CI->load->view("DALAM/$halaman",$data);
        $this->CI->load->view('PARTIAL/footer');
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

    public function dataPengguna()
    {
        $kd_pengguna = $this->CI->session->userdata('kd_pengguna');
        return $this->CI->model->ambilDataTertentu('tb_pengguna',['kd_pengguna' =>  $kd_pengguna])->row();
    }

    public function dataHr()
    {
        $data_pengguna = $this->CI->tools->dataPengguna();
        $kd_salon = $data_pengguna->kd_salon;
        return $this->CI->model->ambilDataTertentu('tb_hr',['kd_salon' => $kd_salon])->result();
    }

    public function cekStatusKriteria($kd_salon = null)
    {
        $data_pengguna = $this->dataPengguna();
        
        $kd_salon = $kd_salon == null ? $data_pengguna->kd_salon : $kd_salon;
        $query = "SELECT tb_aspek.kd_aspek, COUNT(tb_kriteria.kd_kriteria) as jml FROM tb_aspek LEFT JOIN tb_kriteria ON tb_aspek.kd_aspek = tb_kriteria.kd_aspek WHERE tb_aspek.kd_salon = '$kd_salon' GROUP BY tb_aspek.kd_aspek";
        $jmlKriteria = $this->CI->model->query($query)->result();

        $status_jml_kriteria = FALSE;
        foreach ($jmlKriteria as $dt){
            if($dt->jml > 0){
                $status_jml_kriteria = TRUE;
            }else{
                $status_jml_kriteria = FALSE;
                break;
            }
        }
        return $status_jml_kriteria;
    }

    public function cekStatusHr()
    {
        $data_hr = $this->dataHr();
        $statusHr = count($data_hr) <= 0 ? FALSE : TRUE;
        return $statusHr;
    }

    public function cekStatusAspek()
    {
        $data_pengguna = $this->CI->tools->dataPengguna();
        $kd_salon = $data_pengguna->kd_salon;
        $aspek =  $this->CI->model->ambilDataTertentu('tb_aspek',['kd_salon' => $kd_salon])->result();

        $statusAspek = FALSE;
        foreach ($aspek as $dt){
            if($dt->status_input_bobot == 'belum'){
                $statusAspek = FALSE;
                break;
            }else{
                $statusAspek = TRUE;
            }
        }

        return $statusAspek;
    }

}
