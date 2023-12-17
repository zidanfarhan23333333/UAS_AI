<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Gejala Baru</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'gejala'?>" class="btn btn-sm btn-outline-dark pull-right">
                <i class="fa fa-arrow-left"></i>
                Kembali
            </a>
            <br />
            <br />
            <form method="post" action="<?php echo base_url().'gejala/gejala_tambah_aksi' ?>">
                <div class="form-group">
                    <label for="nama" class="font-weight-bold">Id Gejala</label>
                    <input type="text" class="form-control" name="id_gejala" placeholder="Masukkan Id Gejala" required="required">
                </div>
                <div class="form-group">
                    <label for="nama" class="font-weight-bold">Nama Gejala</label>
                    <input type="text" class="form-control" name="nm_gejala" placeholder="Masukkan Nama Gejala" required="required">
                </div>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
</div>