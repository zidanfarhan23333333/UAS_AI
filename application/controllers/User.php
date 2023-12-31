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

        function contact() {
            $this->load->view('user/kontak/kontak');
        }

        function diagnosa() {
            $data['gejala'] = $this->M_Admin->get_data('gejala')->result();

            $this->load->view('user/diagnosa/diagnosa', $data);
        }

        function diagnosaAksi() {
            $idGejala = $this->input->post('id_gejala');
            $nama_pasien = $this->input->post('nama_pasien');
            $umur_pasien = $this->input->post('umur_pasien');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');

            if (empty($idGejala)) {
                echo '<script>alert("Pilih setidaknya satu gejala");</script>';
                echo '<script>window.location.href="'.base_url().'user/diagnosa";</script>';
                return;
            }
        
            $idPenyakitList = $this->M_User->getAllPenyakitFromRuleTable();

            // inisial value
            $persentase = 0;
            $namaPenyakitPersentaseTerbesar = '';
            $definisi = '';
            $pengobatan = '';
            $Penyakit = '';
        
            foreach ($idPenyakitList as $idPenyakit) {
                $ruleProbabilitas = $this->M_User->getGejalaProbabilities($idPenyakit);
                
                // inisial value
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

                            // echo "tahap3: $tahap3 \n";
                            
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
                            // echo "Id: $idPenyakit\n";
                            // echo "tahap5: $tahap5 \n";

                            $tahap6 += $tahap1 * $tahap5;
                            break;
                        }
                    }
                }

                // Tahap 7

                $tahap7 = $tahap6 * 100;

                // $Penyakit = $this->M_User->getNamaPenyakit($idPenyakit); 
                // echo "Id: $idPenyakit\n";
                // echo "| Penyakit: $Penyakit\n";
                // echo "tahap2: $tahap2 \n";
                // echo "tahap4: $tahap4 \n";
                // echo "tahap5: $tahap5 \n";
                // echo "tahap6: $tahap6 \n";
                // echo "Persentase: $tahap7 %\n";
                
                if ($tahap7 > $persentase) {
                    $persentase = $tahap7;
                    $namaPenyakitPersentaseTerbesar = $this->M_User->getNamaPenyakit($idPenyakit); //get nama penyakit berdasarkan persentase terbesar
                    $definisi = $this->M_User->getDefinisi($idPenyakit); //get definisi penyakit berdasarkan persentase terbesar
                    $pengobatan = $this->M_User->getPengobatan($idPenyakit); //get pengobatan penyakit berdasarkan persentase terbesar
                }

            }  

            // echo "| Penyakit yang dialami pasien adalah: $namaPenyakitPersentaseTerbesar , dengan tingkat keyakinan: $persentase\n %";
            // echo "Definisi : $definisi\n ";
            // echo "Cara Pengobatan: $pengobatan\n ";
            // echo "Nama: $nama_pasien\n ";
            // echo "Umur: $umur_pasien\n ";
            // echo "Tanggal Lahir: $tanggal_lahir\n ";
            // echo "enis Kelamin: $jenis_kelamin\n ";
            // echo "Tanggal Diagnosa: $tanggal_diagnosa\n ";

            $data = array(
                'nama_pasien' => $nama_pasien,
                'umur_pasien' => $umur_pasien,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'tanggal_diagnosa' => date('Y-m-d'), 
                'namaPenyakitPersentaseTerbesar' => $namaPenyakitPersentaseTerbesar,
                'persentase' => $persentase,
                'definisi' => $definisi,
                'pengobatan' => $pengobatan
            );            

            echo '<script>alert("Berhasil Melakukan Diagnosa");</script>';
            
            $this->load->view('user/diagnosa/diagnosa_result', $data);
        
        }

        function tambah_aksi() {
            $nama_pasien = $this->input->post('nama_pasien');
            $umur_pasien = $this->input->post('umur_pasien');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $namaPenyakitPersentaseTerbesar = $this->input->post('penyakit_pasien');
            $persentase = $this->input->post('persentase');

            $data = array(
                'nama_pasien' => $nama_pasien,
                'umur_pasien' => $umur_pasien,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'penyakit_pasien' => $namaPenyakitPersentaseTerbesar,
                'persentase' => $persentase,
                'tanggal_diagnosa' => date('Y-m-d'),
            );

            $this->M_User->insert_data($data, 'diagnosa');

            redirect(base_url().'user/dashboard');
        }
        
    }