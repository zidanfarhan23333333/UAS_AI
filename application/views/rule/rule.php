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
            <a href="<?php echo base_url().'rule/rule_tambah' ?>" class="btn btn-sm btn-success float-right mb-3">
                <i class="fa fa-plus"></i>
                Tambah Rule 
                
            </a> <br />

            <table class="table table-bordered table-striped tabel-hover">
                <tr>
                    <th width="1%">No</th>
                    <th>Nama Penyakit</th>
                    <th>Nama Gejala</th>
                    <th>Bobot</th>
                    <th width="16%">Aksi</th>
                </tr>
                <!-- Use $rules instead of $rule in the foreach loop -->
                    <?php 
                        $no = 1;
                        foreach ($rules as $r)
                        {
                            ?>
                            <tr>
                                <td><?php echo $no++ ; ?></td>
                                <td><?php echo $r->nama_penyakit ; ?></td>
                                <td><?php echo $r->nama_gejala ; ?></td>    
                                <td><?php echo $r->bobot ; ?></td>    
                                <td>
                                    <a href="<?php echo base_url().'rule/rule_edit/'.$r->id_rule ; ?>" class="btn btn-sm btn-warning">
                                        <i class="fa fa-wrench "> Edit</i>
                                    </a>
                                    <a href="<?php echo base_url().'rule/rule_hapus/'.$r->id_rule ; ?>" id="hapusBtn" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"> Hapus</i>
                                    </a>
                                </td>  
                            </tr>
                            <?php
                        }
                    ?>

            </table>
        </div>
    </div>
</div>