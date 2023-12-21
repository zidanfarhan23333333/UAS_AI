<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Petugas</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'admin/petugas' ?>" class="btn btn-sm btn-light btn-outline-dark pull-right">
                <i class="fa fa-arrow-left"></i>
                Kembali
            </a>
            <br><br>
            <?php foreach($petugas as $p) { ?>
                <form method="post" action="<?php echo base_url().'admin/petugas_update' ; ?>">
                    <div class="form-group">
                        <label for="nik" class="font-weight-bold">Nomor Induk Kepegawaian</label>
                        <input type="hidden" name="id" value="<?php echo $p->id; ?>">
                        <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" value="<?php echo $p->NIK; ?>" required="required">
                    </div>       
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" value="<?php echo $p->M_biodata_pegawai_nama; ?>" required="required">
                    </div>  
                    <div class="form-group">
                        <label for="username" class="font-weight-bold">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username" value="<?php echo $p->username; ?>" required="required">
                    </div>  
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
                    </div> 
                    <input type="submit" class="btn btn-primary" value="Simpan"> 
                </form>
            <?php } ?>

        </div>
    </div>
</div>