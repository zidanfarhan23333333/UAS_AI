<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Buku</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'petugas/buku_tambah' ?>" class="btn btn-sm btn-success float-right">
                <i class="fa fa-plus"></i>
                Buku Baru
            </a>
            <br />
            <br />
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-data-table">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Status</th>
                            <th width="13%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach ($buku as $b)
                            {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $b->data_buku_judul; ?></td>
                            <td><?php echo $b->data_buku_kategori; ?></td>
                            <td><?php echo $b->data_buku_penulis; ?></td>
                            <td><?php echo $b->data_buku_penerbit; ?></td>
                            <td><?php echo $b->data_buku_tahun_terbit; ?></td>
                            <td>
                                <?php 
                                    if($b->data_buku_status == "1")
                                    {
                                        echo "<span class='badge badge-success'>Tersedia</span>";
                                    } else if ($b->data_buku_status == "2")
                                    {
                                        echo "<span class='badge badge-warning'>Dipinjam</span>";
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url().'petugas/buku_edit/'.$b->iddata_buku ; ?>" class="btn btn-sm btn-warning">
                                    <i class="fa fa-wrench"></i>
                                    Edit
                                </a>
                                <a href="<?php echo base_url().'petugas/buku_hapus/'.$b->iddata_buku ; ?>" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>