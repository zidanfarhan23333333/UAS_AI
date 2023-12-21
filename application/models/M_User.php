<?php 
    class M_User extends CI_Model{

        function get_data($table){
            return $this->db->get($table);
        }

        function insert_data($data, $table){
            $this->db->insert($table, $data);
        }

        function edit_data($where, $table){
            return $this->db->get_where($table, $where);
        }

        function update_data($where, $data, $table) {
            $this->db->where($where);
            if ($this->db->update($table, $data)) {
                return true;
            } else {
                $error = $this->db->error();
                log_message('error', 'Database error: ' . $error['message']);
                return false;
            }
        }   

        function delete_data($where, $table){
            $this->db->delete($table, $where);
        }
        
        function cek_login($table, $where){
            return $this->db->get_where($table, $where);
        }

        function check_existing_rule($id_penyakit, $id_gejala) {
            $this->db->where('id_penyakit', $id_penyakit);
            $this->db->where('id_gejala', $id_gejala);
            $query = $this->db->get('rule');
    
            return $query->num_rows() > 0;
        }

        function get_distinct_penyakit_gejala() {
            $penyakit_query = $this->db->distinct()->select('id_penyakit, nama_penyakit')->from('penyakit')->get();
            $gejala_query = $this->db->distinct()->select('id_gejala, nama_gejala')->from('gejala')->get();
        
            $penyakit_result = $penyakit_query->result();
            $gejala_result = $gejala_query->result();
        
            return (object) ['penyakit' => $penyakit_result, 'gejala' => $gejala_result];
        }
    }
?>