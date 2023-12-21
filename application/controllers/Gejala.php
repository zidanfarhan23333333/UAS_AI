<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Gejala extends CI_Controller {
        function __construct ()
        {
            parent::__construct();
        }
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
            $code_gejala = $this->input->post('code_gejala');
            $nama_gejala = $this->input->post('nama_gejala');
            
            $this->form_validation->set_rules('code_gejala', 'Kode Gejala', 'required|is_unique[gejala.code_gejala]',
                array('is_unique' => 'Kode Gejala sudah ada. Inputkan kode gejala yang berbeda.')
            );
            $this->form_validation->set_rules('nama_gejala', 'Nama Gejala', 'required');
        
            if ($this->form_validation->run() != false) {
                $data = array(
                    'code_gejala' => $code_gejala,
                    'nama_gejala' => $nama_gejala,
                );
                $this->M_data->insert_data($data, 'gejala');
                $this->session->set_flashdata('success_message', 'Gejala berhasil dibuat.');
                redirect(base_url() . 'gejala');
            } else {
                $this->load->view('partials/header');
                $this->load->view('gejala/gejala_create');
                $this->load->view('partials/footer');
            }
        }
        
        function gejala_edit($id_gejala) {
            $where = array('id_gejala' => $id_gejala);
            $data['gejala'] = $this->M_data->edit_data($where, 'gejala')->result();
            $this->load->view('partials/header');
            $this->load->view('gejala/gejala_edit', $data);
            $this->load->view('partials/footer');
        }
        function gejala_update() {
            $id_gejala = $this->input->post('id_gejala'); 
            $code_gejala = $this->input->post('code_gejala');
            $nama_gejala = $this->input->post('nama_gejala');
        
            $this->form_validation->set_rules('code_gejala', 'Kode Gejala', 'required|is_unique[gejala.code_gejala]',
                array('is_unique' => 'Kode Gejala sudah ada. Inputkan kode gejala yang berbeda.')
            );
            $this->form_validation->set_rules('nama_gejala', 'Nama Gejala', 'required');
        
            if ($this->form_validation->run() != false) {
                $where = array('id_gejala' => $id_gejala); 
                $data = array(
                    'code_gejala' => $code_gejala,
                    'nama_gejala' => $nama_gejala,
                );
                $this->M_data->update_data($where, $data, 'gejala');
                $this->session->set_flashdata('success_message', 'Gejala berhasil diedit.');
                redirect(base_url() . 'gejala');
            } else {
                $where = array('id_gejala' => $id_gejala);
                $data['gejala'] = $this->M_data->edit_data($where, 'gejala')->result();
        
                $this->load->view('partials/header');
                $this->load->view('gejala/gejala_edit', $data);
                $this->load->view('partials/footer');
            }
        }
        
        function gejala_hapus($id_gejala) {
            $where = array('id_gejala' => $id_gejala);
            $this->M_data->delete_data($where,'gejala');
            $this->session->set_flashdata('success_message', 'Gejala berhasil dihapus.');
            redirect(base_url().'gejala');
        }
    }
?>