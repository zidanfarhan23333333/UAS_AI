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
                    <select class="form-control" name="gejala[]" id="gejala">
                        <option value="">-Pilih Gejala</option>
                        <?php foreach ($distinct_data->gejala as $gejala): ?>
                            <option value='<?php echo $gejala->id_gejala; ?>'><?php echo $gejala->nama_gejala; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="bobot" class="font-weight-bold">Bobot</label>
                    <input type="text" class="form-control" name="bobot[]" placeholder="Masukkan Bobot" required="required">
                </div>
                <div class="form-group col-md-3">
                    <label for="tambah" class="invisible">Tambah</label>
                    <input type="button" id="tambah" class="btn btn-primary btn-block" value="Tambah">
                </div>
            </div>

            <div id="gejalaSets">
                
            </div>

            <input type="submit" class="btn btn-success" value="Simpan">
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var counter = 1;

        function addGejalaSet() {
            var newRow = document.createElement("div");
            newRow.className = "form-row";
            newRow.id = "gejalaSet" + counter;

            var selectGejala = document.getElementById("gejala").cloneNode(true);
            selectGejala.id = "gejala" + counter;
            selectGejala.name = "gejala[]";

            var inputBobot = document.createElement("input");
            inputBobot.type = "text";
            inputBobot.className = "form-control";
            inputBobot.name = "bobot[]";
            inputBobot.placeholder = "Masukkan Bobot";
            inputBobot.required = "required";

            var buttonRemove = document.createElement("button");
            buttonRemove.type = "button";
            buttonRemove.className = "btn btn-danger btn-block";
            buttonRemove.textContent = "Hapus";
            buttonRemove.onclick = function() {
                removeGejalaSet(counter -1);
            };

            newRow.appendChild(createFormColumnGejala(selectGejala));
            newRow.appendChild(createFormColumnBobot(inputBobot));
            newRow.appendChild(createFormColumnBobot(buttonRemove));

            document.getElementById("gejalaSets").appendChild(newRow);
            
            counter++;
        }

        window.removeGejalaSet = function(id) {
            var elementToRemove = document.getElementById("gejalaSet" + id);
            elementToRemove.parentNode.removeChild(elementToRemove);
        };

        function createFormColumnGejala(element) {
            var formGroup = document.createElement("div");
            formGroup.className = "form-group col-md-6";
            formGroup.appendChild(element);
            return formGroup;
        }

        function createFormColumnBobot(element) {
            var formGroup = document.createElement("div");
            formGroup.className = "form-group col-md-3";
            formGroup.appendChild(element);
            return formGroup;
        }

        document.getElementById("tambah").addEventListener("click", function() {
            addGejalaSet();
        });
    });
</script>