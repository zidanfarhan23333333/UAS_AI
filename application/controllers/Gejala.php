<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Gejala extends CI_Controller {
        function __construct ()
        {
            parent::__construct();
            // if($this->session->userdata('status')!="admin_login")
            // {
            //     redirect(base_url().'login?alert=belum_login');
            // }
        }
        // function index() {
        //     $this->load->view('partials/header');
        //     $this->load->view('gejala/gejala');
        //     $this->load->view('partials/footer');
        // }
        // function logout() {
        //     $this->session->sess_destroy();
        //     redirect(base_url().'login/?alert=logout');
        // }
        // function ganti_password() {
        //     $this->load->view('admin/v_header');
        //     $this->load->view('admin/v_ganti_password');
        //     $this->load->view('admin/v_footer');
        // }
        // function ganti_password_aksi() {
        //     $baru = $this->input->post('password_baru');
        //     $ulang = $this->input->post('password_ulang');
        //     $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|matches[password_ulang]');
        //     $this->form_validation->set_rules('password_ulang', 'Ulangi Password', 'required');
        //     if($this->form_validation->run() != false) 
        //     {
        //         $id= $this->session->userdata('id');
        //         $where = array('id' => $id);
        //         $data = array('password' => md5($baru));
        //         $this->M_data->update_data($where,$data,'admin');
        //         redirect(base_url().'admin/ganti_password/?alert=sukses');
        //     } else
        //     {
        //         $this->load->view('admin/v_header');
        //         $this->load->view('admin/v_ganti_password');
        //         $this->load->view('admin/v_footer');
        //     }
        // }
        function index() {
            $data['gejala'] = $this->M_data->get_data('gejala')->result();
            $this->load->view('partials/header');
            $this->load->view('gejala/gejala', $data);
            $this->load->view('partials/footer');
        }
        function gejala_tambah() {
            $this->load->view('partials/header');
            $this->load->view('gejala/gejala_create');
            $this->load->view('partials/footer');
        }
        function gejala_tambah_aksi() {
            $id_gejala = $this->input->post('id_gejala');
            $nm_gejala = $this->input->post('nm_gejala');
            $data = array (
                'id_gejala' => $id_gejala,
                'nm_gejala' => $nm_gejala,
            );
            $this->M_data->insert_data($data,'gejala');
            redirect(base_url().'gejala');
        }
        function gejala_edit($id_gejala) {
            $where = array ('id_gejala' => $id_gejala);
            $data['gejala'] = $this->M_data->edit_data($where, 'gejala')->result();
            $this->load->view('partials/header');
            $this->load->view('gejala/gejala_edit', $data);
            $this->load->view('partials/footer');
        }
        function gejala_update() {
            $id_gejala = $this->input->post('$id_gejala');
            $nm_gejala = $this->input->post('nm_gejala');
            $where = array('$id_gejala' => $id_gejala);
            $data = array(
                'id_gejala' =>$id_gejala,
                'nm_gejala' =>$nm_gejala,
            );
            $this->M_data->update_data($where, $data, 'gejala');   
            redirect(base_url().'gejala');
        } 
        function gejala_hapus($id_gejala) {
            $where = array('$id_gejala' => $id_gejala);
            $this->M_data->delete_data($where,'gejala');
            redirect(base_url().'gejala');
        }
    }
?>