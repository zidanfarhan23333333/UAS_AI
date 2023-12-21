<!-- 
<script>
    const token = localStorage.getItem('token');

    if (!token) {
        alert("Login Dulu!!")
        window.location.href = "<?php echo base_url('admin'); ?>";
    }
</script> -->

<div class="container">
    <div class="jumbotron text-center">
        <div class="col-sm8 mx-auto">
            <h1>SISTEM PAKAR</h1>
            <p>
                <b>Selamat datang di Sistem Pakar Metode Naive Bayes Kelompok 2</b>
                <!-- <p>Anda telah login sebagai <b><?php echo $this->session->userdata('username'); ?></b> -->
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h1>
                        <?php echo $this->M_Admin->get_data('penyakit')->num_rows(); ?>
                        <div class="pull-right">
                            <!-- <i class="fa fa-virus"></i> -->
                        </div>
                    </h1>
                    Jumlah Penyakit
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h1>
                        <?php echo $this->M_Admin->get_data('gejala')->num_rows(); ?>
                        <div class="pull-right">
                            <!-- <i class="fa fa-user"></i> -->
                        </div>
                    </h1>
                    Jumlah Gejala
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h1>
                        <?php echo $this->M_Admin->get_data('rule')->num_rows(); ?>
                        <div class="pull-right">
                            <!-- <i class="fa fa-gear"></i> -->
                        </div>
                    </h1>
                    Jumlah Rule
                </div>
            </div>
        </div>
    </div>
</div>