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
              <a href="#">
                <i class="fas fa-disease"></i>
                <span class="nav-item">Pasien</span>
              </a>
            </li>
            <li>
              <a href="#">
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

        <div class="container1">
          <h1>Data Pasien</h1>

          <!-- Medical Records Table -->
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Pasien</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="records-list">
              <!-- Records will be displayed here -->
            </tbody>
          </table>
        </div>
      </div>
    </body>
  </html>
</span>
