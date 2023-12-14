<?php 
    class M_data extends CI_Model{
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
                // Pembaruan berhasil
                return true;
            } else {
                // Pembaruan gagal
                $error = $this->db->error();
                // Tampilkan pesan kesalahan
                echo 'Error: ' . $error['message'];
                return false;
            }
        }        
        function delete_data($where, $table){
            $this->db->delete($table, $where);
        }
        function cek_login($table, $where){
            return $this->db->get_where($table, $where);
        }
    }
?>