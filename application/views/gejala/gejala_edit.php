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
            <?php foreach($gejala as $g) { ?>
                <form method="post" action="<?php echo base_url().'gejala/gejala_update' ; ?>">
                    <div class="form-group">
                    <?php echo form_error('code_gejala', '<div class="text-danger">', '</div>'); ?>
                    <?php echo form_error('nama_gejala', '<div class="text-danger">', '</div>'); ?>
                    <input type="hidden" class="form-control" name="id_gejala" value="<?php echo $g->id_gejala; ?>">
                        <label for="code_gejala" class="font-weight-bold">Code Gejala</label>
                        <input type="text" class="form-control" name="code_gejala" value="<?php echo $g->code_gejala; ?>">
                    </div>       
                    <div class="form-group">
                        <label for="nama_gejala" class="font-weight-bold">Nama Gejala</label>
                        <input type="text" class="form-control" name="nama_gejala" placeholder="Masukkan Nama Gejala" value="<?php echo $g->nama_gejala; ?>" required="required">
                    </div>  
                    <input type="submit" class="btn btn-primary" value="Simpan"> 
                </form>
            <?php } ?>

        </div>
    </div>
</div>