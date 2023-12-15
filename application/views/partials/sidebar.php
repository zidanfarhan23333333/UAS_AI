<span style="font-family: verdana, geneva, sans-serif"
  ><!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Sistem Pakar | Pencernaan</title>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/pasien.css') ?>" />
      <!-- Font Awesome Cdn Link -->
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      />
    </head>
    <body>
      <div class="container">
        <nav>
          <ul>
            <li>
              <a href="#" class="logo">
                <img src="<?php echo base_url('img/tangan.png') ?>" />
                <span class="nav-item">Admin</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('/dashboard/dashboard'); ?>" >
                <i class="fas fa-menorah"></i>
                <span class="nav-item">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('/pasien/pasien'); ?>">
                <i class="fas fa-disease"></i>
                <span class="nav-item">Pasien</span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('/penyakit/penyakit'); ?>">
                <i class="fas fa-disease"></i>
                <span class="nav-item">Penyakit</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fas fa-disease"></i>
                <span class="nav-item">Diagnosa</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fas fa-cog"></i>
                <span class="nav-item">Setting</span>
              </a>
            </li>

            <li>
              <a href="#" class="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Log out</span>
              </a>
            </li>
          </ul>
        </nav>