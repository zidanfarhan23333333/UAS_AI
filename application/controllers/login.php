<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('v_login');
    }

    function login_aksi() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() != false) {
            $where = array(
                'username' => $username, 
                'password' => md5($password)
            );
            $cek = $this->M_Admin->cek_login('tb_admin', $where)->num_rows();
                if($cek > 0) {
                    $data = $this->M_Admin->cek_login('tb_admin', $where)->row();
                    $data_session = array(
                        'id' => $data->id,
                        'username' => $data->username,
                        'status' => 'admin_login'
                    );
                    $this->session->set_userdata($data_session);
                    redirect(base_url().'admin/dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Username atau password salah');
                    redirect(base_url().'auth/login');
                }
        }  else {
            $this->load->view('auth/login');
        }
    }
}
?>
