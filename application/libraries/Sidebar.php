<?php 

class Sidebar  
{
    public function admin()
    {
        $dataPengguna = array(
            array('label' => 'Data Pengguna','url' => base_url('Admin/dataPengguna')),
            array('label' => 'Tambah Pengguna','url' => base_url('Admin/createPengguna')),
        );

        $dataTas = array(
            array('label' => 'Data Tas','url' => base_url('Admin/dataTas')),
            array('label' => 'Tambah Tas','url' => '#'),
        );

        
        $dataTarget = array(
            array('label' => 'Data Target','url' => '#'),
            array('label' => 'Tambah Target','url' => '#'),
        );

        $dataKriteria = array(
            array('label' => 'Data Kriteria','url' => '#'),
            array('label' => 'Tambah Kriteria','url' => '#'),
        );


        $menu = array(
            array('child' => FALSE, 'child_menu' => NULL, 'url' => base_url('Admin'),'icon' => 'fa fa-home', 'label' => 'Dashboard'),
            array('child' => TRUE, 'child_menu' => $dataPengguna, 'url' => '#','icon' => 'fa fa-users', 'label' => 'Pengguna'),
            array('child' => TRUE, 'child_menu' => $dataTas, 'url' => '#','icon' => 'fa fa-shopping-bag', 'label' => 'Tas'),
            array('child' => TRUE, 'child_menu' => $dataTarget, 'url' => '#','icon' => 'fa fa-bullseye', 'label' => 'Target'),
            array('child' => TRUE, 'child_menu' => $dataKriteria, 'url' => '#','icon' => 'fa fa-braille', 'label' => 'Kriteria'),
        );
        return $menu;
    }

    public function umum()
    {
        # code...
    }


}
