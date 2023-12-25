<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    require_once FCPATH . 'vendor/autoload.php';

    class User extends CI_Controller {
        function __construct ()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('M_User'); 
        }

        function dashboard() {
            $this->load->view('user/dashboard/dashboard');
        }

        function diagnosa() {
            $data['gejala'] = $this->M_Admin->get_data('gejala')->result();
                $this->load->view('user/diagnosa/diagnosa', $data);
        }

    }