<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Penyakit</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'penyakit' ?>" class="btn btn-sm btn-light btn-outline-dark pull-right">
                <i class="fa fa-arrow-left"></i>
                Kembali
            </a>
            <br><br>
            <?php foreach($penyakit as $p) { ?>
                <form method="post" action="<?php echo base_url().'penyakit/penyakit_update' ; ?>">
                    <div class="form-group">
                    <?php
                        echo validation_errors('<div class="alert alert-danger">', '</div>'); 
                    ?>
                    <input type="hidden" class="form-control" name="id_penyakit" value="<?php echo $p->id_penyakit; ?>">
                        <label for="code_penyakit" class="font-weight-bold">Code penyakit</label>
                        <input type="text" class="form-control" name="code_penyakit" value="<?php echo $p->code_penyakit; ?>">
                    </div>       
                    <div class="form-group">
                        <label for="nama_penyakit" class="font-weight-bold">Nama Penyakit</label>
                        <input type="text" class="form-control" name="nama_penyakit" placeholder="Masukkan Nama Gejala" value="<?php echo $p->nama_penyakit; ?>" required="required">
                    </div>  
                    <div class="form-group">
                        <label for="definisi" class="font-weight-bold">Definisi</label>
                        <input type="text" class="form-control" name="definisi" placeholder="Masukkan Nama Gejala" value="<?php echo $p->definisi; ?>" required="required">
                    </div>  
                    <div class="form-group">
                        <label for="pengobatan" class="font-weight-bold">Cara Pengobatan</label>
                        <input type="text" class="form-control" name="pengobatan" placeholder="Masukkan Nama Gejala" value="<?php echo $p->pengobatan; ?>" required="required">
                    </div>  
                    <input type="submit" class="btn btn-primary" value="Simpan"> 
                </form>
            <?php } ?>

        </div>
    </div>
</div>