<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h4>Tambah Rule Baru</h4>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url().'admin/rule'?>" class="btn btn-sm btn-outline-dark pull-right">
                <i class="fa fa-arrow-left"></i>
                Kembali
            </a>
            <br /> <br />
            <?php
            echo validation_errors('<div class="alert alert-danger">', '</div>'); 
            ?>
            <form method="post" action="<?php echo base_url().'admin/rule_tambah_aksi' ?>">
            <div class="form-group">
                <label for="penyakit" class="font-weight-bold">Penyakit</label>
                <select name="penyakit" id="penyakit" class="form-control">
                    <option value="">-Pilih Penyakit</option>
                    <?php foreach ($distinct_data->penyakit as $penyakit): ?>
                        <option value='<?php echo $penyakit->id_penyakit; ?>'><?php echo $penyakit->nama_penyakit; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="gejala" class="font-weight-bold">Gejala</label>
                    <select class="form-control" name="gejala" id="gejala">
                        <option value="">-Pilih Gejala</option>
                        <?php foreach ($distinct_data->gejala as $gejala): ?>
                            <option value='<?php echo $gejala->id_gejala; ?>'><?php echo $gejala->nama_gejala; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="bobot" class="font-weight-bold">Bobot</label>
                    <input type="text" class="form-control" name="bobot" placeholder="Masukkan Bobot" required="required">
                </div>

                <div class="form-group col-md-3">
                    <label for="tambah" class="invisible">Tambah</label>
                    <input type="button" class="btn btn-primary btn-block" value="Tambah" onclick="addFields()">
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function addFields() {
        var newFields = document.createElement('div');
        newFields.innerHTML =
            '<div class="form-group col-md-6">' +
            '<label for="gejala" class="font-weight-bold">Gejala</label>' +
            '<select class="form-control" name="gejala" id="gejala">' +
            '<option value="">-Pilih Gejala</option>' +
            '<?php foreach ($distinct_data->gejala as $gejala): ?>' +
            '<option value=\'<?php echo $gejala->id_gejala; ?>\'><?php echo $gejala->nama_gejala; ?></option>' +
            '<?php endforeach; ?>' +
            '</select>' +
            '</div>' +
            '<div class="form-group col-md-3">' +
            '<label for="bobot" class="font-weight-bold">Bobot</label>' +
            '<input type="text" class="form-control" name="bobot" placeholder="Masukkan Bobot" required="required">' +
            '</div>' +
            '<div class="form-group col-md-3">' +
            '<label for="tambah" class="invisible">Tambah</label>' +
            '<input type="button" class="btn btn-primary btn-block" value="Tambah" onclick="addFields()">' +
            '</div>';

        document.querySelector('.form-row').appendChild(newFields);
    }
</script>