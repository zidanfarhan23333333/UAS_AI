<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    require_once FCPATH . 'vendor/autoload.php';

    class User extends CI_Controller {
        function __construct ()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('M_User'); 
        }

        function dashboard() {
            $this->load->view('user/dashboard/dashboard');
        }

        function diagnosa() {
            $data['gejala'] = $this->M_Admin->get_data('gejala')->result();
            $data['nilai_p'] = $this->M_Admin->get_data('nilai_p')->result();

            $this->load->view('user/diagnosa/diagnosa', $data);
        }

        function diagnosaAksi() {
            $idGejala = $this->input->post('id_gejala');
        
            $idPenyakitList = $this->getAllPenyakitFromRuleTable();
        
            $maxResult = 0;
            $namaPenyakitPersentaseTerbesar = '';
        
            foreach ($idPenyakitList as $idPenyakit) {
                $ruleProbabilitas = $this->getGejalaProbabilities($idPenyakit);
                
                $tahap1 = 0;
                $tahap2 = 0; 
                $tahap3 = 0; 
                $tahap4 = 0; 
                $tahap5 = 0; 
                $tahap6 = 0; 
                $tahap7 = 0; 

                // Tahap 1 
                foreach ($idGejala as $idGejalaInptanUser) {
                    foreach ($ruleProbabilitas as $probabilitasPakar) {
                        if ($probabilitasPakar->id_gejala == $idGejalaInptanUser) {
                            $tahap1 = (float)$probabilitasPakar->bobot;
                            $tahap2 += $tahap1;
                            // echo "Hasil untuk id_penyakit $idPenyakit:\n";
                            // echo "tahap ke-1: $tahap1\n";
                            break;
                        }
                    }
                }
                
                // Tahap 2, Tahap 3 & tahap 4
                foreach ($idGejala as $idGejalaInptanUser) {
                    foreach ($ruleProbabilitas as $probabilitasPakar) {
                        if ($probabilitasPakar->id_gejala == $idGejalaInptanUser) {
                            $tahap1 = (float)$probabilitasPakar->bobot;
                            $tahap3 = $tahap1 / $tahap2;
                            
                            $tahap4 += $tahap1 * $tahap3;
                            
                            // echo "Hasil untuk id_penyakit $idPenyakit:\n";
                            // echo "tahap ke-1: $tahap1\n";
                            // echo "tahap ke-2: $tahap2\n";
                            // echo "tahap ke-3: $tahap3\n";

                            break;
                        }
                    }
                }

                // Tahap 5 
                foreach ($idGejala as $idGejalaInptanUser) {
                    foreach ($ruleProbabilitas as $probabilitasPakar) {
                        if ($probabilitasPakar->id_gejala == $idGejalaInptanUser) {
                            $tahap1 = (float)$probabilitasPakar->bobot;
                            $tahap3 = $tahap1 / $tahap2;

                            $tahap5 = $tahap1 * $tahap3 / $tahap4;

                            $tahap6 += $tahap1 * $tahap5;

                            // echo "Hasil untuk id_penyakit $idPenyakit:\n";
                            // echo "tahap ke-1: $tahap1\n";
                            // echo "tahap ke-3: $tahap3\n";
                            // echo "tahap ke-5: $tahap5\n";
                            // echo "tahap ke-6: $tahap6\n";
                            
                            break;
                        }
                    }
                }

                // Tahap 7
                $tahap7 = $tahap6 * 100;

                if ($tahap7 > $maxResult) {
                    $maxResult = $tahap7;
                    $namaPenyakitPersentaseTerbesar = $this->getNamaPenyakitById($idPenyakit);
                }
                
                // echo "Hasil untuk id_penyakit $idPenyakit:\n";
                // echo "tahap ke-1 : $tahap1\n";
                // echo "tahap ke-2 : $tahap2\n";
                // echo "tahap ke-3: $tahap3\n";
                // echo "tahap ke-4: $tahap4\n";
                // echo "tahap ke-5: $tahap5\n";
                // echo "tahap ke-6: $tahap6\n";
                // echo "tahap ke-7: $tahap7 %";
            }
            echo "Penyakit yang dialami pasien adalah: $namaPenyakitPersentaseTerbesar , dengan tingkat keyakinan: $maxResult %";
        
            $this->load->view('user/diagnosa/diagnosa_result');
        }
        
        function getNamaPenyakitById($idPenyakit) {
            $query = $this->db->query("SELECT nama_penyakit FROM penyakit WHERE id_penyakit = $idPenyakit");
            $result = $query->row();
        
            return $result->nama_penyakit;
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
        
        function getGejalaProbabilities($idPenyakit) {
            $this->db->select('id_gejala, bobot');
            $this->db->where('id_penyakit', $idPenyakit);
        
            return $this->db->get('rule')->result();
        }


        function diagnosaAksibckp() {
            $idGejala = $this->input->post('id_gejala');
        
            $idPenyakitList = $this->getAllPenyakitFromRuleTable();
        
            $maxResult = 0;
            $namaPenyakitPersentaseTerbesar = '';
        
            foreach ($idPenyakitList as $idPenyakit) {
                $ruleProbabilitas = $this->getGejalaProbabilities($idPenyakit);
        
                $tahap2 = 1; 
                $tahap4 = 1; 
        
                foreach ($idGejala as $idGejalaInptanUser) {
                    foreach ($ruleProbabilitas as $probabilitasPakar) {
                        if ($probabilitasPakar->id_gejala == $idGejalaInptanUser) {
                            $probPakar = (float)$probabilitasPakar->bobot;
        
                            $tahap2 *= $probPakar; 
                            $tahap4 *= $probPakar; 
        
                            break;
                        }
                    }
                }
        
                $tahap7 = ($tahap2 * $tahap4) * 100; 

        
                echo "Hasil untuk id_penyakit $idPenyakit:\n";
                echo "tahap ke-2 : $tahap2\n";
                echo "tahap ke-4 : $tahap4\n";
                echo "tahap ke-7: $tahap7 %\n\n";
        
                if ($tahap7 > $maxResult) {
                    $maxResult = $tahap7;
                    $namaPenyakitPersentaseTerbesar = $this->getNamaPenyakitById($idPenyakit);
                }
            }
        
            echo "Hasil Diagnosa:\n";
            echo "Penyakit: $namaPenyakitPersentaseTerbesar\n";
            echo "Probabilitas: $maxResult %\n";
        
            $this->load->view('user/diagnosa/diagnosa_result');
        }



    }