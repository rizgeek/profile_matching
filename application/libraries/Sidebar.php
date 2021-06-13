<?php 

class Sidebar  
{
    public function admin()
    {
        $dataPengguna = array(
            array('label' => 'Data Pengguna','url' => base_url('Admin/dataPengguna')),
            array('label' => 'Tambah Pengguna','url' => base_url('Admin/createPengguna')),
        );

        $dataKriteria = array(
            array('label' => 'Data Kriteria','url' => base_url('Admin/dataKriteria')),
            array('label' => 'Tambah Kriteria','url' => base_url('Admin/createKriteria')),
        );



        $menu = array(
            array('child' => FALSE, 'child_menu' => NULL, 'url' => base_url('Admin'),'icon' => 'fa fa-home', 'label' => 'Dashboard'),
            array('child' => TRUE, 'child_menu' => $dataPengguna, 'url' => '#','icon' => 'fa fa-users', 'label' => 'Pengguna'),
            array('child' => FALSE, 'child_menu' => NULL, 'url' =>  base_url('Admin/dataTas'),'icon' => 'fa fa-shopping-bag', 'label' => 'Tas'),
            array('child' => TRUE, 'child_menu' => $dataKriteria, 'url' => '#','icon' => 'fa fa-braille', 'label' => 'Kriteria'),
            array('child' => FALSE, 'child_menu' => NULL, 'url' => '#','icon' => 'fa fa-calculator', 'label' => 'Nilai Tas'),
        );
        return $menu;
    }

    public function umum()
    {
        # code...
    }


}
