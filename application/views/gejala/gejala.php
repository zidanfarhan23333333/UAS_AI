<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Gejala</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'gejala/gejala_tambah' ?>" class="btn btn-sm btn-success float-right mb-3">
                <i class="fa fa-plus"></i>
                Tambah Gejala 
            </a> <br />
            <table class="table table-bordered table-striped tabel-hover">
                <tr>
                    <th width="1%">No</th>
                    <th>Id Gejala</th>
                    <th>Nama Gejala</th>
                    <th width="16%">Aksi</th>
                </tr>
                <?php 
                    $no = 1;
                    foreach ($gejala as $p)
                    {
                        ?>
                        <tr>
                            <td><?php echo $no++ ; ?></td>
                            <td><?php echo $p->id_gejala ; ?></td>
                            <td><?php echo $p->nm_gejala ; ?></td>    
                            <td>
                                <a href="<?php echo base_url().'gejala/gejala_edit/'.$p->id_gejala ; ?>" class="btn btn-sm btn-warning">
                                    <i class="fa fa-wrench "> Edit</i>
                                </a>
                                <a href="<?php echo base_url().'gejala/gejala_hapus/'.$p->id_gejala ; ?>" class="btn btn-sm btn-danger">
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