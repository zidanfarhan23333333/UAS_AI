<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Petugas Baru</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'admin/petugas'?>" class="btn btn-sm btn-outline-dark pull-right">
                <i class="fa fa-arrow-left"></i>
                Kembali
            </a>
            <br />
            <br />
            <form method="post" action="<?php echo base_url().'admin/petugas_tambah_aksi' ?>">
                <div class="form-group">
                    <label for="nama" class="font-weight-bold">Nomor Induk Kepegawaian</label>
                    <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" required="required">
                </div>
                <div class="form-group">
                    <label for="nama" class="font-weight-bold">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required="required">
                </div>
                <div class="form-group">
                    <label for="nama" class="font-weight-bold">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required="required">
                </div>
                <div class="form-group">
                    <label for="nama" class="font-weight-bold">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required="required">
                </div>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
</div>