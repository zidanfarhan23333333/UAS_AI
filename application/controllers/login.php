<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('jwt'); 
        $this->load->model('M_Auth'); 
    }

    public function index()
    {
        $this->load->view('v_login');
    }

    public function login_aksi() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() !== false) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $where = array(
                'username' => $username, 
                'password' => md5($password)
            );

            $cek = $this->M_Auth->cek_login('tb_admin', $where)->num_rows();

            if ($cek > 0) {
                $data = $this->M_Auth->cek_login('tb_admin', $where)->row();
                $token = $this->jwt->encode(array('username' => $username, 'password' => $password), 'your_jwt_secret_key');

                $response = array(
                    'id' => $data->id,
                    'username' => $data->username,
                    'password' => $data->password,
                    'token' => $token
                );

                echo "<script>
                        localStorage.setItem('token', '$token');
                        window.location.href='" . base_url() . "admin/dashboard';
                    </script>";
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah');
                redirect(base_url() . 'admin/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }
}
?>
