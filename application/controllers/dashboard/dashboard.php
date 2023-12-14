<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Dashboard extends CI_Controller {
        function __construct ()
        {
            parent::__construct();
        }
        function index() {
            // $this->load->view('pasien/v_header');
            $this->load->view('dashboard/dashboard');
            // $this->load->view('pasien/v_footer');
        }
        function logout() {
            $this->session->sess_destroy();
            redirect(base_url().'login/?alert=logout');
        }
        function ganti_password() {
            $this->load->view('admin/v_header');
            $this->load->view('admin/v_ganti_password');
            $this->load->view('admin/v_footer');
        }
        function ganti_password_aksi() {
            $baru = $this->input->post('password_baru');
            $ulang = $this->input->post('password_ulang');
            $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|matches[password_ulang]');
            $this->form_validation->set_rules('password_ulang', 'Ulangi Password', 'required');
            if($this->form_validation->run() != false) 
            {
                $id= $this->session->userdata('id');
                $where = array('id' => $id);
                $data = array('password' => md5($baru));
                $this->M_data->update_data($where,$data,'admin');
                redirect(base_url().'admin/ganti_password/?alert=sukses');
            } else
            {
                $this->load->view('admin/v_header');
                $this->load->view('admin/v_ganti_password');
                $this->load->view('admin/v_footer');
            }
        }
        function petugas() {
            $data['petugas'] = $this->M_data->get_data('m_biodata_pegawai')->result();
            $this->load->view('admin/v_header');
            $this->load->view('admin/v_petugas', $data);
            $this->load->view('admin/v_footer');
        }
        function petugas_tambah() {
            $this->load->view('admin/v_header');
            $this->load->view('admin/v_petugas_tambah');
            $this->load->view('admin/v_footer');
        }
        function petugas_tambah_aksi() {
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = array (
                'NIK' => $nik,
                'M_biodata_pegawai_nama' => $nama,
                'username' => $username,
                'password' => md5($password)
            );
            $this->M_data->insert_data($data,'m_biodata_pegawai');
            redirect(base_url().'admin/petugas');
        }
        function petugas_edit($id) {
            $where = array ('id' => $id);
            $data['petugas'] = $this->M_data->edit_data($where, 'm_biodata_pegawai')->result();
            $this->load->view('admin/v_header');
            $this->load->view('admin/v_petugas_edit', $data);
            $this->load->view('admin/v_footer');
        }
        function petugas_update() {
            $id = $this->input->post('id');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $where = array('id' => $id);
            if($password=="") {
                $data = array(
                    'NIK' =>$nik,
                    'M_biodata_pegawai_nama'=> $nama,
                    'username' => $username, 
                );
                $this->M_data->update_data($where, $data, 'm_biodata_pegawai');
            } else {
                $data = array(
                    'NIK' =>$nik,
                    'M_biodata_pegawai_nama'=> $nama,
                    'username' => $username, 
                    'password' => md5($password)
                );
                $this->M_data->update_data($where, $data, 'm_biodata_pegawai');   
            }
            redirect(base_url().'admin/petugas');
        } 
        function petugas_hapus($id) {
            $where = array('id' => $id);
            $this->M_data->delete_data($where,'m_biodata_pegawai');
            redirect(base_url().'admin/petugas');
        }
    }
?>