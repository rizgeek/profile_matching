<?php 

class Sidebar  
{
    public function admin()
    {

        $kumpulanData = array(
            array('label' => 'Data Salon','url' => base_url('Admin/dataSalon')),
            array('label' => 'Data Pengguna','url' => base_url('Admin/dataPengguna')),
            array('label' => 'Data Hairstylist','url' => base_url('Admin/dataHr')),
        );

        $menu = array(
            array('child' => FALSE, 'child_menu' => NULL, 'url' => base_url('Admin'),'icon' => 'fas fa-tachometer-alt', 'label' => 'Dashboard'),
            array('child' => FALSE, 'child_menu' => NULL, 'url' => base_url('Admin/dataSalon'),'icon' => 'fa fa-building', 'label' => 'Salon'),
            array('child' => TRUE, 'child_menu' => $kumpulanData, 'url' => '#','icon' => 'fa fa-folder', 'label' => 'Data'),
        );

        return $menu;
    }


    public function hr()
    {
        $menu = array(
            array('child' => FALSE, 'child_menu' => NULL, 'url' => '#','icon' => 'fas fa-tachometer-alt', 'label' => 'Dashboard'),
        );

        return $menu;
    }


    public function operator($status_jml_kriteria, $status_hr, $status_aspek)
    {
        $pm = array(
            array('label' => 'Aspek','url' => base_url('Operator/aspek')),
        );

        if($status_jml_kriteria && $status_hr){
            array_push($pm, array('label' => 'Bobot','url' =>base_url('Operator/bobot')));
        }

        if($status_aspek){
            array_push($pm,  array('label' => 'Ranking','url' => base_url('Operator/vRanking')));
        }

        $menu = array(
            array('child' => FALSE, 'child_menu' => NULL, 'url' => '#','icon' => 'fas fa-tachometer-alt', 'label' => 'Dashboard'),
            array('child' => FALSE, 'child_menu' => NULL, 'url' => base_url('Operator/hairstylist'),'icon' => 'fas fa-chalkboard-teacher', 'label' => 'Hairstylist'),
            array('child' => TRUE, 'child_menu' => $pm, 'url' => '#','icon' => 'fas fa-adjust', 'label' => 'Profile Matching'),
        );

        return $menu;
    }
}
