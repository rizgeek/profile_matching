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
    
    public function index()
    {
        echo "<h1>Admin</h1>";
    }

}

/* End of file Admin.php */
