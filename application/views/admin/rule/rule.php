<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Rule</h4>
        </div>
        <div class="card-body">
                <?php if ($this->session->flashdata('success_message')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success_message'); ?>
                    </div>
                <?php endif; ?>
            <a href="<?php echo base_url().'admin/rule_tambah' ?>" class="btn btn-sm btn-success float-right mb-3">
                <i class="fa fa-plus"></i>
                Tambah Rule 
                
            </a> <br />

            <table class="table table-bordered table-striped tabel-hover">
                <tr>
                    <th width="1%">No</th>
                    <th>Nama Penyakit</th>
                    <th>Gejala</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                    $no = 1;
                    $gejalaMap = []; 

                    foreach ($rules as $r) {
                        $gejalaMap[$r->id_penyakit][] = $r->nama_gejala;
                    }

                    foreach ($penyakit as $r) {
                        if (isset($gejalaMap[$r->id_penyakit])) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>
                                    <?php echo $r->nama_penyakit; ?>
                                </td>
                                <td>
                                    <?php 
                                        $symptomsForDisease = array_unique($gejalaMap[$r->id_penyakit]);
                                        echo implode(", ", $symptomsForDisease);
                                    ?>
                                </td>    
                                <td class="text-center">
                                    <a href="<?php echo base_url().'admin/rule_view/'.$r->id_penyakit ; ?>" class="btn btn-sm btn-warning">
                                        <i class="fa fa-eye"> Detail</i>
                                    </a>
                                </td>  
                            </tr>
                            <?php
                            unset($gejalaMap[$r->id_penyakit]);
                        }
                    }
                    ?>
            </table>
        </div>
    </div>
</div>