<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Petugas extends CI_Controller {
        function __construct ()
        {
            parent::__construct();
            if($this->session->userdata('status')!="petugas_login")
            {
                redirect(base_url().'login?alert=belum_login');
            }
        }
        function index() {
            $this->load->view('petugas/v_header');
            $this->load->view('petugas/v_index');
            $this->load->view('petugas/v_footer');
        }
        function logout() {
            $this->session->sess_destroy();
            redirect(base_url().'login/?alert=logout');
        }
        function ganti_password() {
            $this->load->view('petugas/v_header');
            $this->load->view('petugas/v_ganti_password');
            $this->load->view('petugas/v_footer');
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
                $this->M_data->update_data($where,$data,'m_biodata_pegawai');
                redirect(base_url().'petugas/ganti_password/?alert=sukses');
            } else
            {
                $this->load->view('petugas/v_header');
                $this->load->view('petugas/v_ganti_password');
                $this->load->view('petugas/v_footer');
            }
        }
        function buku() {
            $data['buku'] = $this->M_data->get_data('m_data_buku')->result();
            $this->load->view('petugas/v_header');
            $this->load->view('petugas/v_buku', $data);
            $this->load->view('petugas/v_footer');
        }
        function buku_tambah() {
            $this->load->view('petugas/v_header');
            $this->load->view('petugas/v_buku_tambah');
            $this->load->view('petugas/v_footer');
        }
        function buku_tambah_aksi() {
            $judulbuku = $this->input->post('judul');
            $penulisbuku = $this->input->post('penulis');
            $kategoribuku = $this->input->post('kategori');
            $penerbitbuku = $this->input->post('penerbit');
            $tahunbuku = $this->input->post('tahun');
            $data = array(
                'data_buku_judul' => $judulbuku,
                'data_buku_penulis' => $penulisbuku,
                'data_buku_kategori' => $kategoribuku,
                'data_buku_penerbit' => $penerbitbuku,
                'data_buku_tahun_terbit' => $tahunbuku,
                'data_buku_status' => 1
            );
            $this->M_data->insert_data($data, 'm_data_buku');
            redirect(base_url().'petugas/buku');
        }
        function buku_edit($id) {
            $where = array('iddata_buku' => $id);
            $data['buku'] = $this->M_data->edit_data($where, 'm_data_buku')->result();
            $this->load->view('petugas/v_header');
            $this->load->view('petugas/v_buku_edit', $data);
            $this->load->view('petugas/v_footer');
        }
        function buku_update() {
            $id = $this->input->post('id');
            $judulbuku = $this->input->post('judul');
            $penulisbuku = $this->input->post('penulis');
            $kategoribuku = $this->input->post('kategori');
            $penerbitbuku = $this->input->post('penerbit');
            $tahunbuku = $this->input->post('tahun');
            $statusbuku = $this->input->post('status');
            $where = array (
                'iddata_buku' => $id
            );
            $data = array(
                'data_buku_judul' => $judulbuku,
                'data_buku_penulis' => $penulisbuku,
                'data_buku_kategori' => $kategoribuku,
                'data_buku_penerbit' => $penerbitbuku,
                'data_buku_tahun_terbit' => $tahunbuku,
                'data_buku_status' => $statusbuku
            );
            $this->M_data->update_data($where, $data, 'm_data_buku');
            redirect(base_url().'petugas/buku');
        }
        function buku_hapus($id) {
            $where = array(
                'iddata_buku' => $id
            );
            $this->M_data->delete_data($where, 'm_data_buku');
            redirect(base_url().'petugas/buku');
        }

        // Rest API Client
        var $API= "";
        function ambilsiak() {
            $this->API="http://127.0.0.1/1705041234/index.php/";
            $this->load->library('curl');
            $data['databiodata'] = json_decode($this->curl->simple_get($this->API.'/biodata'));
            $this->load->view('petugas/v_header');
            $this->load->view('petugas/v_siak', $data);
            $this->load->view('petugas/v_footer');
        }
        
        // insert biodata mahasiswa ke SIMPERPUS
        function api_input() {
            $this->API="http://127.0.0.1/1705041234/index.php/";
            $this->load->library('curl');
            $data = json_decode($this->curl->simple_get($this->API.'/biodata'));
            $this->db->trans_begin();
            foreach($data as $row) {
                $data = array(
                    "NPM_mhs" => $row->id,
                    "biodata_mhs_nama" => $row->nama
                );
                $this->M_data->insert_data($data,'m_biodata_mhs');
            }
            if($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                redirect(base_url().'/petugas/anggota');
            } else {
                $this->db->trans_commit();
                redirect(base_url().'/petugas/anggota');
            }
        }

        // Data anggota SIMPERPUS
        function anggota() {
            $data['anggota'] = $this->M_data->get_data('m_biodata_mhs')->result();
            $this->load->view('/petugas/v_header');
            $this->load->view('/petugas/v_anggota', $data);
            $this->load->view('/petugas/v_footer');
        }

        function hapus_anggota() {
            $this->db->empty_table('m_biodata_mhs');
            redirect(base_url().'petugas/anggota');
        }

        function anggota_kartu($id) {
            $where = array('NPM_mhs' => $id);
            $data['anggota'] = $this->M_data->edit_data($where, 'm_biodata_mhs')->result();
            $this->load->view('petugas/v_anggota_kartu', $data);
        }
    }
?>