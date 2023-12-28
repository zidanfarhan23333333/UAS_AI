<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data History Diagnosa Pasien</h4>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped tabel-hover">
                <tr>
                    <th width="1%">No</th>
                    <th>Nama Pasien</th>
                    <th>Umur</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Penyakit</th>
                    <th>Persentase</th>
                    <th>Tanggal Diagnosa</th>
                    <th>Aksi</th>
                </tr>

                <?php 
                    $no = 1;
                    foreach ($diagnosa as $d)
                    {
                        ?>
                        <tr>
                            <td><?php echo $no++ ; ?></td>
                            <td><?php echo $d->nama_pasien ; ?></td>
                            <td><?php echo $d->umur_pasien ; ?></td>    
                            <td><?php echo $d->tanggal_lahir ; ?></td>    
                            <td><?php echo $d->jenis_kelamin ; ?></td>    
                            <td><?php echo $d->penyakit_pasien ; ?></td>    
                            <td><?php echo $d->persentase ; ?></td>    
                            <td><?php echo $d->tanggal_diagnosa ; ?></td>    
                            <td class="text-center">
                                <a href="<?php echo base_url().'admin/diagnosa_hapus/'.$d->id_diagnosa ; ?>" class="btn btn-sm btn-danger ">
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