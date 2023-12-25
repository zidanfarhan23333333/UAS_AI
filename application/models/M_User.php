<?php 
    class M_User extends CI_Model{

        function get_data($table){
            return $this->db->get($table);
        }

        function insert_data($data, $table){
            $this->db->insert($table, $data);
        }

       
    }
?>