<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    require_once FCPATH . 'vendor/autoload.php';

    class Admin extends CI_Controller {
        function __construct ()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->library('jwt'); 
            $this->load->model('M_Auth'); 
            $this->load->model('M_Admin'); 
        }

        public function index(){
            $this->load->view('admin/auth/login');
        }

        function login_aksi() {
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
                    
                    $response = array(
                        'id_admin' => $data->id_admin,
                        'username' => $data->username,
                        'password' => $data->password,
                    );
                    $token = $this->jwt->encode($response);
        
                    $cookie = array(
                        'name'   => 'token',
                        'value'  => $token,
                        'expire' => time() + 3600,
                        'secure' => false,
                    );
                    $this->input->set_cookie($cookie);
        
                    redirect(base_url() . 'admin/dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Username atau password salah');
                    redirect(base_url() . 'admin');
                }
            } else {
                $this->load->view('admin/login');
            }
        }
        
        function logout() {
            $cookie = array(
                'name'   => 'token',
                'value'  => '',
                'expire' => time() - 3600, 
                'secure' => false,
            );
            $this->input->set_cookie($cookie);
            
            $this->session->set_flashdata('success_message', 'Berhasil Logout');
            redirect(base_url() . 'admin');
        }
        
        function checkToken() {
            $token = $this->input->cookie('token');
            if (!$token) {
                $this->session->set_flashdata('error', 'Harus Login Dulu');
                redirect(base_url() . 'admin');
            }
        
            try {
                $decoded_token = $this->jwt->decode($token);
                return true; 
            } catch (Exception $e) {
                return false; 
            }
        }
        
        function dashboard() {
            if ($this->checkToken()) {
                $this->load->view('partials/header');
                $this->load->view('admin/dashboard/index');
                $this->load->view('partials/footer');
            }
        }
        

        function gejala() {
            if ($this->checkToken()) {
                $data['gejala'] = $this->M_Admin->get_data('gejala')->result();
                $this->load->view('partials/header');
                $this->load->view('admin/gejala/gejala', $data);
                $this->load->view('partials/footer');
            }
            }
        function gejala_tambah() {
            if ($this->checkToken()) {
                $this->load->view('partials/header');
                $this->load->view('admin/gejala/gejala_create');
                $this->load->view('partials/footer');
            }
        }

        function gejala_tambah_aksi() {
            if ($this->checkToken()) {
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
                    $this->load->view('admin/gejala/gejala_create');
                    $this->load->view('partials/footer');
                }
            }
        }
        
        function gejala_edit($id_gejala) {
            if ($this->checkToken()) {
                $where = array('id_gejala' => $id_gejala);
                $data['gejala'] = $this->M_Admin->edit_data($where, 'gejala')->result();
                $this->load->view('partials/header');
                $this->load->view('admin/gejala/gejala_edit', $data);
                $this->load->view('partials/footer');
            }
        }
        function gejala_update() {
            if ($this->checkToken()) {
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
                    $this->load->view('admin/gejala/gejala_edit', $data);
                    $this->load->view('partials/footer');
                }
            }
        }
        
        function gejala_hapus($id_gejala) {
            if ($this->checkToken()) {
                $where = array('id_gejala' => $id_gejala);
                $this->M_Admin->delete_data($where,'gejala');
                $this->session->set_flashdata('success_message', 'Gejala berhasil dihapus.');
                redirect(base_url().'admin/gejala');
            }
        }

        function penyakit() {
            if ($this->checkToken()) {
                $data['penyakit'] = $this->M_Admin->get_data('penyakit')->result();
                $this->load->view('partials/header');
                $this->load->view('admin/penyakit/penyakit', $data);
                $this->load->view('partials/footer');
            }
        }
    
        function penyakit_tambah() {
            if ($this->checkToken()) {
                $this->load->view('partials/header');
                $this->load->view('admin/penyakit/penyakit_create');
                $this->load->view('partials/footer');
            }
        }
    
        function penyakit_tambah_aksi() {
            if ($this->checkToken()) {
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
                    $this->session->set_flashdata('success_message', 'Penyakit berhasil dibuat.');
                    redirect(base_url() . 'admin/penyakit');
                } else {
         
                    $this->load->view('partials/header');
                    $this->load->view('admin/penyakit/penyakit_create');
                    $this->load->view('partials/footer');
                }
            }
        }
        
        function penyakit_edit($id_penyakit) {
            if ($this->checkToken()) {
                $where = array('id_penyakit' => $id_penyakit);
                $data['penyakit'] = $this->M_Admin->edit_data($where, 'penyakit')->result();
                $this->load->view('partials/header');
                $this->load->view('admin/penyakit/penyakit_edit', $data);
                $this->load->view('partials/footer');
            }
        }
        
        function penyakit_update() {
            if ($this->checkToken()) {
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
                    $this->load->view('admin/penyakit/penyakit_edit', $data);
                    $this->load->view('partials/footer');
                }
            }
        }
        
        function penyakit_hapus($id_penyakit) {
            if ($this->checkToken()) {
                $where = array('id_penyakit' => $id_penyakit);
                $this->M_Admin->delete_data($where, 'penyakit');
                $this->session->set_flashdata('success_message', 'Penyakit berhasil dihapus.');
                redirect(base_url().'admin/penyakit');
            }
        }

        private function get_all() {
            $this->db->select('rule.id_rule ,rule.id_penyakit, rule.id_gejala, penyakit.nama_penyakit as nama_penyakit, gejala.nama_gejala as nama_gejala, rule.bobot as bobot');
            $this->db->from('rule');
            $this->db->join('gejala', 'rule.id_gejala = gejala.id_gejala');
            $this->db->join('penyakit', 'rule.id_penyakit = penyakit.id_penyakit');
        
            $query = $this->db->get();
            return $query->result(); 
        }
        
        function rule() {
            if ($this->checkToken()) {
                $data['rules'] = $this->get_all(); 
                $data['penyakit'] = $this->get_all(); 
            
                $this->load->view('partials/header');
                $this->load->view('admin/rule/rule', $data);
                $this->load->view('partials/footer');
            }
        }

        function rule_tambah() {
            if ($this->checkToken()) {
                $data['distinct_data'] = $this->M_Admin->get_distinct_penyakit_gejala();
            
                $this->load->view('partials/header');
                $this->load->view('admin/rule/rule_create', $data);
                $this->load->view('partials/footer');
            }
        }
        
        function rule_tambah_aksi() {
            if ($this->checkToken()) {
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
                    $this->load->view('admin/rule/rule_create', $data);
                    $this->load->view('partials/footer');
                }
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
            if ($this->checkToken()) {
                $data['rule'] = (object)$this->get_rule_by_id($id_rule);
                $data['distinct_data'] = $this->M_Admin->get_distinct_penyakit_gejala();

                $this->load->view('partials/header');
                $this->load->view('admin/rule/rule_edit', $data);
                $this->load->view('partials/footer');
            }
        }
        
        function rule_update() {
            if ($this->checkToken()) {
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
                $id_penyakit = $this->get_id_penyakit_by_rule($id_rule);

                $this->M_Admin->update_data($where, $data, 'rule');
                $this->session->set_flashdata('success_message', 'Rule berhasil diedit.');
                redirect(base_url() . 'admin/rule_view/' . $id_penyakit);
            } else {
                    $data['rule'] = (object)$this->get_rule_by_id($id_rule);
                    $data['distinct_data'] = $this->M_Admin->get_distinct_penyakit_gejala();
                    
                    $this->load->view('partials/header');
                    $this->load->view('admin/rule/rule_edit', $data);
                    $this->load->view('partials/footer');
                }
            }
        }
        
        
    function rule_hapus($id_rule) {
        if ($this->checkToken()) {
            $id_penyakit = $this->get_id_penyakit_by_rule($id_rule);

            $where = array('id_rule' => $id_rule);
            $this->M_Admin->delete_data($where, 'rule');
            $this->session->set_flashdata('success_message', 'Rule berhasil dihapus.');

            redirect(base_url() . 'admin/rule_view/' . $id_penyakit);
        }
    }

    function get_id_penyakit_by_rule($id_rule) {
        $this->db->select('id_penyakit');
        $this->db->where('id_rule', $id_rule);
        $query = $this->db->get('rule');

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->id_penyakit;
        } else {
            return null;
        }
    }

        function get_penyakit_by_id($id_penyakit) {
            $this->db->select('rule.id_rule, rule.bobot, gejala.nama_gejala, penyakit.nama_penyakit');
            $this->db->from('rule');
            $this->db->join('gejala', 'gejala.id_gejala = rule.id_gejala');
            $this->db->join('penyakit', 'penyakit.id_penyakit = rule.id_penyakit');
            $this->db->where('rule.id_penyakit', $id_penyakit);
            $query = $this->db->get();
            return $query->result();
        }
        
        function rule_view($id_penyakit) {
            if ($this->checkToken()) {
                $data['rules'] = $this->get_penyakit_by_id($id_penyakit);
                $this->load->view('partials/header');
                $this->load->view('admin/rule/rule_view/rule', $data);
                $this->load->view('partials/footer');
            }
        }
        

        function diagnosa() {
            if ($this->checkToken()) {
                $this->load->view('partials/header');
                $this->load->view('admin/diagnosa/diagnosa', );
                $this->load->view('partials/footer');
            }
        }
        
    }
?>