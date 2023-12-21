<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Rule extends CI_Controller {
        function __construct ()
        {
            parent::__construct();
        }
        
        private function get_all() {
            $this->db->select('rule.id_rule, penyakit.nama_penyakit as nama_penyakit, gejala.nama_gejala as nama_gejala, rule.bobot as bobot');
            $this->db->from('rule');
            $this->db->join('gejala', 'rule.id_gejala = gejala.id_gejala');
            $this->db->join('penyakit', 'rule.id_penyakit = penyakit.id_penyakit');
        
            $query = $this->db->get();
            return $query->result(); 
        }
        
        function index() {
            $data['rules'] = $this->get_all(); 
        
            $this->load->view('partials/header');
            $this->load->view('rule/rule', $data);
            $this->load->view('partials/footer');
        }

        private function get_distinct_penyakit_gejala() {
            $penyakit_query = $this->db->distinct()->select('id_penyakit, nama_penyakit')->from('penyakit')->get();
            $gejala_query = $this->db->distinct()->select('id_gejala, nama_gejala')->from('gejala')->get();
        
            $penyakit_result = $penyakit_query->result();
            $gejala_result = $gejala_query->result();
        
            return (object) ['penyakit' => $penyakit_result, 'gejala' => $gejala_result];
        }
        
        function rule_tambah() {
            $data['distinct_data'] = $this->get_distinct_penyakit_gejala();
        
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
        
                $this->M_data->insert_data($data, 'rule');
                $this->session->set_flashdata('success_message', 'Rule berhasil dibuat.');
                redirect(base_url() . 'rule');
            } else {
                $this->load->view('partials/header');
                $this->load->view('rule/rule_create');
                $this->load->view('partials/footer');
            }
        }
        
        function check_existing_rule($str) {
            $id_penyakit = $this->input->post('penyakit');
            $id_gejala = $this->input->post('gejala');
        
            if ($this->M_data->check_existing_rule($id_penyakit, $id_gejala)) {
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
                $data['distinct_data'] = $this->get_distinct_penyakit_gejala();

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
            $this->M_data->update_data($where, $data, 'rule');
            $this->session->set_flashdata('success_message', 'Rule berhasil diedit.');
            redirect(base_url() . 'rule');
            } else {
                $data['rule'] = (object)$this->get_rule_by_id($id_rule);
                $data['distinct_data'] = $this->get_distinct_penyakit_gejala();

                $this->load->view('partials/header');
                $this->load->view('rule/rule_edit', $data);
                $this->load->view('partials/footer');
            }
        }
        
        function rule_hapus($id_rule) {
            $where = array('id_rule' => $id_rule);
            $this->M_data->delete_data($where,'rule');
            $this->session->set_flashdata('success_message', 'Rule berhasil dihapus.');
            redirect(base_url().'rule');
        }
        
        
    }
?>