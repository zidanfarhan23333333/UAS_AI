<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Anggota Mahasiswa</h4>
        </div>
        <div class="card-body">
        <a href="<?php echo base_url().'petugas/hapus_anggota' ; ?>" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
                Hapus Semua Anggota
            </a>
            <br />
            <br />
            <br />
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-datatable">
                    <thead>
                        <tr>
                            <td width="1%">No</td>
                            <td>NPM</td>
                            <td>Nama Lengkap</td>
                            <td>Opsi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($anggota as $a) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ; ?></td>
                            <td><?php echo $a->NPM_mhs ; ?></td>
                            <td><?php echo $a->biodata_mhs_nama ; ?></td>
                            <td>
                                <a target="_blank" href="<?php echo base_url().'/petugas/anggota_kartu/'.$a->NPM_mhs ; ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-address-card"></i>
                                    Cetak Kartu
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>