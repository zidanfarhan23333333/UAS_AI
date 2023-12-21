<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pakar</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(). '/assets/css/bootstrap.css' ?>">
    <script type="text/javascript" src="<?php echo base_url(). '/assets/js/jquery.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url(). '/assets/js/bootstrap.js' ?>"></script>
</head>
<body class="bg-dark d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="container">
        <h3 class="font-weight-normal text-center text-white mb-5">SISTEM PAKAR</h3>
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <?php 
                        if(isset($_GET['alert'])) {
                            if($_GET['alert']=="gagal") {
                                echo '<div class="alert alert-danger font-weight-bold text-center">LOGIN GAGAL!</div>';
                            }
                            if($_GET['alert']=="belum_login") {
                                echo '<div class="alert alert-danger font-weight-bold text-center">SILAHKAN LOGIN TERLEBIH DAHULU!</div>';
                            }
                            if($_GET['alert']=="logout") {
                                echo '<div class="alert alert-success font-weight-bold text-center">ANDA TELAH LOGOUT!</div>';
                            }
                        }
                    ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <h4 class="font-weight-bold text-center mb-3 mt-3">LOGIN</h4>
                    <?php 
                        echo validation_errors();
                    ?>
                    <form method="post" action="<?php echo base_url(). 'admin/login_aksi'; ?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" placeholder="Masukkan username" required="required">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Masukkan password" required="required">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
