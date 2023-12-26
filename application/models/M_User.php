<?php 
    class M_User extends CI_Model{

        function get_data($table){
            return $this->db->get($table);
        }

        function insert_data($data, $table){
            $this->db->insert($table, $data);
        }    

        function getGejalaProbabilities($idPenyakit) {
            $this->db->select('id_gejala, bobot');
            $this->db->where('id_penyakit', $idPenyakit);
        
            return $this->db->get('rule')->result();
        }

        function getAllPenyakitFromRuleTable() {
            $query = $this->db->query('SELECT DISTINCT id_penyakit FROM rule');
            $result = $query->result();
        
            $idPenyakitList = array();
            foreach ($result as $row) {
                $idPenyakitList[] = $row->id_penyakit;
            }
        
            return $idPenyakitList;
        }

        function getNamaPenyakitById($idPenyakit) {
            $query = $this->db->query("SELECT nama_penyakit FROM penyakit WHERE id_penyakit = $idPenyakit");
            $result = $query->row();
        
            return $result->nama_penyakit;
        }
       
    }
?>