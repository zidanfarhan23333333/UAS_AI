<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Penyakit extends CI_Controller {
        function __construct ()
        {
            parent::__construct();
            // if($this->session->userdata('status')!="admin_login")
            // {
            //     redirect(base_url().'login?alert=belum_login');
            // }
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
            $id_gejala = $this->input->post('id_gejala');
            $nm_gejala = $this->input->post('nm_gejala');
            $data = array (
                'id_gejala' => $id_gejala,
                'nm_gejala' => $nm_gejala,
            );
            $this->M_data->insert_data($data,'gejala');
            redirect(base_url().'gejala');
        }
        function penyakit_edit($id_gejala) {
            $where = array ('id_gejala' => $id_gejala);
            $data['gejala'] = $this->M_data->edit_data($where, 'gejala')->result();
            $this->load->view('partials/header');
            $this->load->view('gejala/gejala_edit', $data);
            $this->load->view('partials/footer');
        }
        function penyakit_update() {
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
        function gpenyakit_hapus($id_gejala) {
            $where = array('$id_gejala' => $id_gejala);
            $this->M_data->delete_data($where,'gejala');
            redirect(base_url().'gejala');
        }
    }
?>