<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Edit Gejala</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'gejala' ?>" class="btn btn-sm btn-light btn-outline-dark pull-right">
                <i class="fa fa-arrow-left"></i>
                Kembali
            </a>
            <br><br>
            <?php foreach($gejala as $p) { ?>
                <form method="post" action="<?php echo base_url().'gejala/gejala_update' ; ?>">
                    <div class="form-group">
                        <label for="id_gejala" class="font-weight-bold">Id Gejala</label>
                        <input type="text" class="form-control" name="id_gejala" value="<?php echo $p->id_gejala; ?>">
                    </div>       
                    <div class="form-group">
                        <label for="nm_gejala" class="font-weight-bold">Nama Gejala</label>
                        <input type="text" class="form-control" name="nm_gejala" placeholder="Masukkan Nama Gejala" value="<?php echo $p->nm_gejala; ?>" required="required">
                    </div>  
                    <input type="submit" class="btn btn-primary" value="Simpan"> 
                </form>
            <?php } ?>

        </div>
    </div>
</div>