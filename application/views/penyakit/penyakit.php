<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Penyakit</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'gejala/gejala_tambah' ?>" class="btn btn-sm btn-success float-right mb-3">
                <i class="fa fa-plus"></i>
                Tambah Penyakit 
            </a> <br />
            <table class="table table-bordered table-striped tabel-hover">
                <tr>
                    <th width="1%">No</th>
                    <th>Id Penyakit</th>
                    <th>Nama Penyakit</th>
                    <th>Definisi</th>
                    <th>Pengobatan</th>
                    <th width="16%">Aksi</th>
                </tr>
                <?php 
                    $no = 1;
                    foreach ($penyakit as $p)
                    {
                        ?>
                        <tr>
                            <td><?php echo $no++ ; ?></td>
                            <td><?php echo $p->id_penyakit ; ?></td>
                            <td><?php echo $p->nama_penyakit ; ?></td>    
                            <td><?php echo $p->definisi ; ?></td>    
                            <td><?php echo $p->pengobatan ; ?></td>    
                            <td>
                                <a href="<?php echo base_url().'gejala/gejala_edit/'.$p->id_penyakit ; ?>" class="btn btn-sm btn-warning">
                                    <i class="fa fa-wrench "> Edit</i>
                                </a>
                                <a href="<?php echo base_url().'gejala/gejala_hapus/'.$p->id_penyakit ; ?>" class="btn btn-sm btn-danger">
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