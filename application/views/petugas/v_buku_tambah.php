<div class="container-fluid">
    <div class="card">
        <div class="card-header text-center">
            <h4>Data Buku</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'petugas/buku' ?>" class="btn btn-sm btn-light btn-outline-dark float-right">
                <i class="fa fa-arrow-left"></i>
                Kembali
            </a>
            <br />
            <br />
            <form method="post" action="<?php echo base_url().'petugas/buku_tambah_aksi' ; ?>">
                <div class="form-group">
                    <label class="font-weight-bold" for="judul">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Buku" required="required">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="penulis">Penulis Buku</label>
                    <input type="text" class="form-control" name="penulis" placeholder="Masukkan Penulis Buku" required="required">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="kategori">Kategori</label>
                    <select class="form-control" name="kategori" required="required">
                        <option value="">-Pilih Kategori</option>
                        <?php { ?>
                            <option value="<?php echo 'Pemrogramman' ; ?>"><?php echo "Pemrogramman" ?></option>
                            <option value="<?php echo 'Jaringan Komputer' ; ?>"><?php echo "Jaringan Komputer" ?></option>
                            <option value="<?php echo 'Sistem Operasi Komputer' ; ?>"><?php echo "Sistem Operasi Komputer" ?></option>
                            <option value="<?php echo 'Microsoft Office' ; ?>"><?php echo "Microsoft Office" ?></option>
                            <option value="<?php echo 'Metode Komputer Khusus' ; ?>"><?php echo "Metode Komputer Khusus" ?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="penerbit">Penerbit Buku</label>
                    <input type="text" class="form-control" name="penerbit" placeholder="Masukkan Penerbit Buku" required="required">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="tahun">Tahun Terbit</label>
                    <select name="tahun" class="form-control" required="required">
                        <option value="">- Pilih Tahun</option>
                        <?php 
                            for($tahun=date('Y'); $tahun>=1990; $tahun--)
                            {
                        ?>
                        <option value="<?php echo $tahun ?>"><?php echo $tahun ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
</div>