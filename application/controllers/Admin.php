<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin extends CI_Controller {
        function __construct ()
        {
            parent::__construct();
        }

        public function index()
        {
        $this->load->view('auth/login');
        }
        
        function dashboard() {
            $this->load->view('partials/header');
            $this->load->view('dashboard/index', );
            $this->load->view('partials/footer');
        }

        function gejala() {
            $data['gejala'] = $this->M_Admin->get_data('gejala')->result();
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
                $this->M_Admin->insert_data($data, 'gejala');
                $this->session->set_flashdata('success_message', 'Gejala berhasil dibuat.');
                redirect(base_url() . 'admin/gejala');
            } else {
                $this->load->view('partials/header');
                $this->load->view('gejala/gejala_create');
                $this->load->view('partials/footer');
            }
        }
        
        function gejala_edit($id_gejala) {
            $where = array('id_gejala' => $id_gejala);
            $data['gejala'] = $this->M_Admin->edit_data($where, 'gejala')->result();
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
                $this->M_Admin->update_data($where, $data, 'gejala');
                $this->session->set_flashdata('success_message', 'Gejala berhasil diedit.');
                redirect(base_url() . 'admin/gejala');
            } else {
                $where = array('id_gejala' => $id_gejala);
                $data['gejala'] = $this->M_Admin->edit_data($where, 'gejala')->result();
        
                $this->load->view('partials/header');
                $this->load->view('gejala/gejala_edit', $data);
                $this->load->view('partials/footer');
            }
        }
        
        function gejala_hapus($id_gejala) {
            $where = array('id_gejala' => $id_gejala);
            $this->M_Admin->delete_data($where,'gejala');
            $this->session->set_flashdata('success_message', 'Gejala berhasil dihapus.');
            redirect(base_url().'admin/gejala');
        }

        function penyakit() {
            $data['penyakit'] = $this->M_Admin->get_data('penyakit')->result();
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
        
                $this->M_Admin->insert_data($data, 'penyakit');
                redirect(base_url() . 'admin/penyakit');
            } else {
     
                $this->load->view('partials/header');
                $this->load->view('penyakit/penyakit_create');
                $this->load->view('partials/footer');
            }
        }
        
        function penyakit_edit($id_penyakit) {
            $where = array('id_penyakit' => $id_penyakit);
            $data['penyakit'] = $this->M_Admin->edit_data($where, 'penyakit')->result();
            $this->load->view('partials/header');
            $this->load->view('penyakit/penyakit_edit', $data);
            $this->load->view('partials/footer');
        }
        
        function penyakit_update() {
            $id_penyakit = $this->input->post('id_penyakit');
            $code_penyakit = $this->input->post('code_penyakit');
            $nama_penyakit = $this->input->post('nama_penyakit');
            $definisi = $this->input->post('definisi');
            $pengobatan = $this->input->post('pengobatan');
            
            $this->form_validation->set_rules('code_penyakit', 'Kode Penyakit', 'required|is_unique[penyakit.code_penyakit]',
                array('is_unique' => 'Kode Penyakit sudah ada. Inputkan kode penyakit yang berbeda.')
            );
            $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required');
            $this->form_validation->set_rules('definisi', 'Definisi Penyakit', 'required');
            $this->form_validation->set_rules('pengobatan', 'Pengobatan', 'required');
            
            if ($this->form_validation->run() != false) {
                $where = array('id_penyakit' => $id_penyakit);
                $data = array(
                    'code_penyakit' => $code_penyakit,
                    'nama_penyakit' => $nama_penyakit,
                    'definisi' => $definisi,
                    'pengobatan' => $pengobatan,
                );
                $this->M_Admin->update_data($where, $data, 'penyakit');
                $this->session->set_flashdata('success_message', 'Penyakit berhasil diedit.');
                redirect(base_url() . 'admin/penyakit');
            } else {
                $where = array('id_penyakit' => $id_penyakit);
                $data['penyakit'] = $this->M_Admin->edit_data($where, 'penyakit')->result();
            
                $this->load->view('partials/header');
                $this->load->view('penyakit/penyakit_edit', $data);
                $this->load->view('partials/footer');
            }
        }
        
        function penyakit_hapus($id_penyakit) {
            $where = array('id_penyakit' => $id_penyakit);
            $this->M_Admin->delete_data($where, 'penyakit');
            redirect(base_url().'admin/penyakit');
        }

        private function get_all() {
            $this->db->select('rule.id_rule, penyakit.nama_penyakit as nama_penyakit, gejala.nama_gejala as nama_gejala, rule.bobot as bobot');
            $this->db->from('rule');
            $this->db->join('gejala', 'rule.id_gejala = gejala.id_gejala');
            $this->db->join('penyakit', 'rule.id_penyakit = penyakit.id_penyakit');
        
            $query = $this->db->get();
            return $query->result(); 
        }
        
        function rule() {
            $data['rules'] = $this->get_all(); 
        
            $this->load->view('partials/header');
            $this->load->view('rule/rule', $data);
            $this->load->view('partials/footer');
        }

        function rule_tambah() {
            $data['distinct_data'] = $this->M_Admin->get_distinct_penyakit_gejala();
        
            $this->load->view('partials/header');
            $this->load->view('rule/rule_create', $data);
            $this->load->view('partials/footer');
        }
        
        function rule_tambah_aksi() {
            $id_penyakit = $this->input->post('penyakit');
            $id_gejala = $this->input->post('gejala');
            $bobot = $this->input->post('bobot');
        
            $this->form_validation->set_rules('penyakit', 'Penyakit', 'required');
            $this->form_validation->set_rules('gejala', 'Gejala', 'required');
            $this->form_validation->set_rules('check_existing_rule', 'Pasangan gejala dan penyakit tersebut sudah ada.', 'callback_check_existing_rule');
        
            if ($this->form_validation->run() != false) {
                $data = array(
                    'id_penyakit' => $id_penyakit,
                    'id_gejala' => $id_gejala,
                    'bobot' => $bobot,
                );
        
                $this->M_Admin->insert_data($data, 'rule');
                $this->session->set_flashdata('success_message', 'Rule berhasil dibuat.');
                redirect(base_url() . 'admin/rule');
            } else {
                $data['distinct_data'] = $this->M_Admin->get_distinct_penyakit_gejala();
        
                $this->load->view('partials/header');
                $this->load->view('rule/rule_create', $data);
                $this->load->view('partials/footer');
            }
        }
        
        function check_existing_rule($str) {
            $id_penyakit = $this->input->post('penyakit');
            $id_gejala = $this->input->post('gejala');
        
            if ($this->M_Admin->check_existing_rule($id_penyakit, $id_gejala)) {
                return false;
            } else {
                return true;
            }
        }
        
        public function get_rule_by_id($id_rule) {
                $this->db->where('id_rule', $id_rule);
                $query = $this->db->get('rule');
                return $query->row();
            }

            public function rule_edit($id_rule) {
                $data['rule'] = (object)$this->get_rule_by_id($id_rule);
                $data['distinct_data'] = $this->M_Admin->get_distinct_penyakit_gejala();

                $this->load->view('partials/header');
                $this->load->view('rule/rule_edit', $data);
                $this->load->view('partials/footer');
            }
        
        function rule_update() {
            $id_rule = $this->input->post('id_rule'); 
            $id_gejala = $this->input->post('gejala');
            $id_penyakit = $this->input->post('penyakit');
            $bobot = $this->input->post('bobot');
        
            $this->form_validation->set_rules('check_existing_rule', 'Pasangan gejala dan penyakit tersebut sudah ada.', 'callback_check_existing_rule');
        
            if ($this->form_validation->run() != false) {
                $where = array('id_rule' => $id_rule); 
                $data = (object)array(
                'id_gejala' => $id_gejala,
                'id_penyakit' => $id_penyakit,
                'bobot' => $bobot
            );
            $this->M_Admin->update_data($where, $data, 'rule');
            $this->session->set_flashdata('success_message', 'Rule berhasil diedit.');
            redirect(base_url() . 'admin/rule');
            } else {
                $data['rule'] = (object)$this->get_rule_by_id($id_rule);
                $data['distinct_data'] = $this->M_Admin->get_distinct_penyakit_gejala();

                $this->load->view('partials/header');
                $this->load->view('rule/rule_edit', $data);
                $this->load->view('partials/footer');
            }
        }
        
        function rule_hapus($id_rule) {
            $where = array('id_rule' => $id_rule);
            $this->M_Admin->delete_data($where,'rule');
            $this->session->set_flashdata('success_message', 'Rule berhasil dihapus.');
            redirect(base_url().'admin/rule');
        }

        function diagnosa() {
            $this->load->view('partials/header');
            $this->load->view('diagnosa/diagnosa', );
            $this->load->view('partials/footer');
        }
        
    }
?>