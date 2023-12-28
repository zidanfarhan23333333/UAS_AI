<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar - Admin</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(). '/assets/css/bootstrap.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(). '/assets/css/awesome/css/font-awesome.css' ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <script type="text/javascript" src="<?php echo base_url(). '/assets/js/jquery.js' ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(). '/assets/js/bootstrap.js' ?>"></script>
    <?php
        $path="http://".$_SERVER['HTTP_HOST']."/" ;
    ?>
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="<?php echo base_url().'dashboard'; ?>" class="navbar-brand">SISTEM PAKAR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url().'admin/dashboard'; ?>" class="nav-link">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url().'admin/gejala'; ?>" class="nav-link">
                            Gejala
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url().'admin/penyakit'; ?>" class="nav-link">
                        <i class="fas fa-viruses"></i>                            
                        Penyakit
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url().'admin/rule'; ?>" class="nav-link">
                            Rule
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url().'admin/diagnosa'; ?>" class="nav-link">
                            History Diagnosa
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