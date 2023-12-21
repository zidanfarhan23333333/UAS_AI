<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Penyakit Baru</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'penyakit'?>" class="btn btn-sm btn-outline-dark pull-right">
                <i class="fa fa-arrow-left"></i>
                Kembali
            </a>
            <br />
            <br />
            <form method="post" action="<?php echo base_url().'penyakit/penyakit_tambah_aksi' ?>">
                <div class="form-group">
                <?php
                    echo validation_errors('<div class="alert alert-danger">', '</div>'); 
                ?>
                    <label for="code_penyakit" class="font-weight-bold">Code Penyakit</label>
                    <input type="text" class="form-control" name="code_penyakit" placeholder="Masukkan Code Penyakit" required="required">
                </div>
                <div class="form-group">
                    <label for="nama_penyakit" class="font-weight-bold">Nama Penyakit</label>
                    <input type="text" class="form-control" name="nama_penyakit" placeholder="Masukkan Nama Penyakit" required="required">
                </div>
                <div class="form-group">
                    <label for="definisi" class="font-weight-bold">Definisi Penyakit</label>
                    <input type="text" class="form-control" name="definisi" placeholder="Masukkan Definisi Penyakit" required="required">
                </div>
                <div class="form-group">
                    <label for="pengobatan" class="font-weight-bold">Cara Pengobatan Penyakit</label>
                    <input type="text" class="form-control" name="pengobatan" placeholder="Masukkan Cara Pengobatan Penyakit" required="required">
                </div>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
</div>
