<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Rule</h4>
        </div>
        
        <div class="card-body">
        <a href="<?php echo base_url().'admin/rule'?>" class="btn btn-sm btn-outline-dark pull-right mb-3">
            <i class="fa fa-arrow-left"></i>
            Kembali
        </a>
                <?php if ($this->session->flashdata('success_message')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success_message'); ?>
                    </div>
                <?php endif; ?>

            <table class="table table-bordered table-striped tabel-hover">
    <tr>
        <th width="1%">No</th>
        <th>Nama Penyakit</th>
        <th>Nama Gejala</th>
        <th>Bobot</th>
        <th width="16%">Aksi</th>
    </tr>
    <?php 
        $no = 1;
        foreach ($rules as $r) {
    ?>
    <tr>
        <td><?php echo $no++ ; ?></td>
        <td><?php echo $r->nama_penyakit ; ?></td>
        <td><?php echo $r->nama_gejala ; ?></td>    
        <td><?php echo $r->bobot ; ?></td>    
        <td>
            <a href="<?php echo base_url().'admin/rule_edit/'.$r->id_rule ; ?>" class="btn btn-sm btn-warning">
                <i class="fa fa-wrench"> Edit</i>
            </a>
            <a href="<?php echo base_url().'admin/rule_hapus/'.$r->id_rule ; ?>"  class="btn btn-sm btn-danger">
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