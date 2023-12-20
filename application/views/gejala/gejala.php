<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Gejala</h4>
        </div>
        <div class="card-body">
                <?php if ($this->session->flashdata('success_message')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success_message'); ?>
                    </div>
                <?php endif; ?>
            <a href="<?php echo base_url().'admin/gejala_tambah' ?>" class="btn btn-sm btn-success float-right mb-3">
                <i class="fa fa-plus"></i>
                Tambah Gejala 
                
            </a> <br />

            <table class="table table-bordered table-striped tabel-hover">
                <tr>
                    <th width="1%">No</th>
                    <th>Code Gejala</th>
                    <th>Nama Gejala</th>
                    <th width="16%">Aksi</th>
                </tr>
                <?php 
                    $no = 1;
                    foreach ($gejala as $g)
                    {
                        ?>
                        <tr>
                            <td><?php echo $no++ ; ?></td>
                            <td><?php echo $g->code_gejala ; ?></td>
                            <td><?php echo $g->nama_gejala ; ?></td>    
                            <td>
                                <a href="<?php echo base_url().'admin/gejala_edit/'.$g->id_gejala ; ?>" class="btn btn-sm btn-warning">
                                    <i class="fa fa-wrench "> Edit</i>
                                </a>
                                <a href="<?php echo base_url().'admin/gejala_hapus/'.$g->id_gejala ; ?>" id="hapusBtn" class="btn btn-sm btn-danger">
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