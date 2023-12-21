<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(). '/assets/css/bootstrap.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(). '/assets/css/awesome/css/font-awesome.css' ?>">
    <script type="text/javascript" src="<?php echo base_url(). '/assets/js/jquery.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url(). '/assets/js/bootstrap.js' ?>"></script>
    <?php
        $path="http://".$_SERVER['HTTP_HOST']."/" ;
    ?>
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="<?php echo base_url().'admin'; ?>" class="navbar-brand">SIMPERPUS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url().'admin'; ?>" class="nav-link">
                        <i class="fa fa-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url().'admin/anggota'; ?>" class="nav-link">
                        <i class="fa fa-users"></i>
                            Anggota
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url().'admin/buku'; ?>" class="nav-link">
                        <i class="fa fa-book"></i>
                            Buku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url().'admin/petugas'; ?>" class="nav-link">
                        <i class="fa fa-user"></i>
                            Petugas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url().'admin/peminjaman'; ?>" class="nav-link">
                        <i class="fa fa-book"></i>
                            Peminjaman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url().'admin/ganti_password'; ?>" class="nav-link">
                        <i class="fa fa-lock"></i>
                            Ganti Password
                        </a>
                    </li>
                </ul>
                <span class="navbar-text mr-3 text-center">Halo, <?php echo $this->session->userdata('username'); ?> [Admin]</span>
                <a href="<?php echo base_url().'admin/logout' ; ?>" class="btn btn-outline-light ml-1">
                    <i class="fa fa-power-off"></i>
                    Keluar
                </a>
            </div>
        </div>
    </nav>
    <br />
    <br />
</html>