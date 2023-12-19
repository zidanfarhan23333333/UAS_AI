<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {
    function __construct ()
    {
        parent::__construct();
    }

    function index() {
        $data['penyakit'] = $this->M_data->get_data('penyakit')->result();
        $this->load->view('partials/header');
        $this->load->view('penyakit/penyakit', $data);
        $this->load->view('partials/footer');
    }

    function penyakit_tambah() {
        $this->load->view('partials/header');
        $this->load->view('penyakit/penyakit_create');
        $this->load->view('partials/footer');
    }

    function penyakit_tambah_aksi() {
        $this->form_validation->set_rules('code_penyakit', 'Kode Penyakit', 'required|is_unique[penyakit.code_penyakit]',
            array('is_unique' => 'Kode Penyakit ini sudah ada. Tolong Inputkan kode penyakit yang berbeda.')
        );
        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required');
        $this->form_validation->set_rules('definisi', 'Definisi', 'required');
        $this->form_validation->set_rules('pengobatan', 'Pengobatan', 'required');
    
        if ($this->form_validation->run() != false) {
            $code_penyakit = $this->input->post('code_penyakit');
            $nama_penyakit = $this->input->post('nama_penyakit');
            $definisi = $this->input->post('definisi');
            $pengobatan = $this->input->post('pengobatan');
    
            $data = array(
                'code_penyakit' => $code_penyakit,
                'nama_penyakit' => $nama_penyakit,
                'definisi' => $definisi,
                'pengobatan' => $pengobatan
            );
    
            $this->M_data->insert_data($data, 'penyakit');
            redirect(base_url() . 'penyakit/penyakit');
        } else {
 
            $this->load->view('partials/header');
            $this->load->view('penyakit/penyakit_create');
            $this->load->view('partials/footer');
        }
    }
    
    function penyakit_edit($id_penyakit) {
        $where = array('id_penyakit' => $id_penyakit);
        $data['penyakit'] = $this->M_data->edit_data($where, 'penyakit')->result();
        $this->load->view('partials/header');
        $this->load->view('penyakit/penyakit_edit', $data);
        $this->load->view('partials/footer');
    }
    
    function penyakit_update() {
        $id_penyakit = $this->input->post('id_penyakit');
        $code_penyakit = $this->input->post('code_penyakit');
        $nama_penyakit = $this->input->post('nama_penyakit');
        $definisi = $this->input->post('definisi');
        
        $this->form_validation->set_rules('code_penyakit', 'Kode Penyakit', 'required|is_unique[penyakit.code_penyakit]',
            array('is_unique' => 'Kode Penyakit sudah ada. Inputkan kode penyakit yang berbeda.')
        );
        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required');
        
        if ($this->form_validation->run() != false) {
            $where = array('id_penyakit' => $id_penyakit);
            $data = array(
                'code_penyakit' => $code_penyakit,
                'nama_penyakit' => $nama_penyakit,
                'definisi' => $definisi,
            );
            $this->M_data->update_data($where, $data, 'penyakit');
            $this->session->set_flashdata('success_message', 'Penyakit berhasil diedit.');
            redirect(base_url() . 'penyakit');
        } else {
            $where = array('id_penyakit' => $id_penyakit);
            $data['penyakit'] = $this->M_data->edit_data($where, 'penyakit')->result();
        
            $this->load->view('partials/header');
            $this->load->view('penyakit/penyakit_edit', $data);
            $this->load->view('partials/footer');
        }
    }
    
    

    function penyakit_hapus($id_penyakit) {
        $where = array('id_penyakit' => $id_penyakit);
        $this->M_data->delete_data($where, 'penyakit');
        redirect(base_url().'penyakit/penyakit');
    }
}
?>