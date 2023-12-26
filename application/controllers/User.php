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
        
            $idPenyakitList = $this->M_User->getAllPenyakitFromRuleTable();
        
            $maxResult = 0;
            $namaPenyakitPersentaseTerbesar = '';
        
            foreach ($idPenyakitList as $idPenyakit) {
                $ruleProbabilitas = $this->M_User->getGejalaProbabilities($idPenyakit);
                
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
                            break;
                        }
                    }
                }
                
                // Tahap 2, 3 & 4
                foreach ($idGejala as $idGejalaInptanUser) {
                    foreach ($ruleProbabilitas as $probabilitasPakar) {
                        if ($probabilitasPakar->id_gejala == $idGejalaInptanUser) {
                            $tahap1 = (float)$probabilitasPakar->bobot;
                            $tahap3 = $tahap1 / $tahap2;
                            
                            $tahap4 += $tahap1 * $tahap3;
                            break;
                        }
                    }
                }

                // Tahap 5 & 6
                foreach ($idGejala as $idGejalaInptanUser) {
                    foreach ($ruleProbabilitas as $probabilitasPakar) {
                        if ($probabilitasPakar->id_gejala == $idGejalaInptanUser) {
                            $tahap1 = (float)$probabilitasPakar->bobot;
                            $tahap3 = $tahap1 / $tahap2;

                            $tahap5 = $tahap1 * $tahap3 / $tahap4;

                            $tahap6 += $tahap1 * $tahap5;
                            break;
                        }
                    }
                }

                // Tahap 7
                $tahap7 = $tahap6 * 100;

                if ($tahap7 > $maxResult) {
                    $maxResult = $tahap7;
                    $namaPenyakitPersentaseTerbesar = $this->M_User->getNamaPenyakitById($idPenyakit);
                }
            }
            echo "Penyakit yang dialami pasien adalah: $namaPenyakitPersentaseTerbesar , dengan tingkat keyakinan: $maxResult %";
        
            $this->load->view('user/diagnosa/diagnosa_result');
        }
        
    }