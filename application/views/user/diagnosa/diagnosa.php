<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,100;1,300;1,700&family=Ubuntu:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <style>
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        scroll-behavior: smooth;
        list-style: none;
        text-decoration: none;
      }

      :root {
        --main-color: #ff702a;
        --text-color: #fff;
        --bg-color: #1e1c2a;
        --big-font: 5rem;
        --h2-font: 1.25rem;
        --p-font: 0.9rem;
      }
      ::selection {
        background: var(--main-color);
        color: #fff;
      }

      body {
        color: var(--text-color);
        background: var(--bg-color);
      }

      header {
        position: fixed;
        top: 0;
        right: 0;
        width: 100%;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 30px 170px;
        background: var(--bg-color);
      }

      .logo {
        color: var(--main-color);
        font-weight: 600;
        font-size: 1.4rem;
      }

      .navbar {
        display: flex;
      }

      .navbar a {
        color: var(--text-color);
        font-size: 1.1rem;
        padding: 10px 20px;
        font-weight: 500;
      }

      .navbar a:hover {
        color: var(--main-color);
        cursor: pointer;
        transition: 0.4s;
      }

      #menu-icon {
        font-size: 2rem;
        cursor: pointer;
        display: none;
      }
      body {
        font-family: "Arial", sans-serif;
        margin: 0;
        padding: 0;
      }

      .logo {
        color: white;
        text-decoration: none;
        font-size: 20px;
      }

      .container-card {
        margin-top: 100px;
      }

      .card-title {

        margin: 20px;
      }

      .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #2c2a3a; 
        padding: 20px;
        margin: 20px;
        border-radius: 8px;
        transition: transform 0.3s ease-in-out;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .symptom-radio-group {
        display: flex;
        gap: 20px;
    }

    .symptom-radio {
        margin-left: 10px;
        transform: scale(1.5);
    }

    .button-container {
      display: flex;
      justify-content: flex-end;
      align-items: flex-end;
      height: 100%;
    }

    .button {
      margin: 20px;
      padding: 10px 20px;
      font-size: 16px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .button:hover {
      background-color: #45a049;
    }

    .check {
        transform: scale(2); 
    }

    </style>
  </head>
  <body>
    <header>
      <a href="#" class="logo">Sistem Pakar kelompok 2</a>
      <div class="bx bx-menu" id="menu-icon"></div>

      <ul class="navbar">
        <a href="<?php echo base_url().'user/dashboard'; ?>">Home</a>
        <a href="#">Diagnnosis</a>
        <a href="#contact">Contact</a>
      </ul>
    </header>

   <section class="container-card">
    <h2 class="card-title">Pilih Gejala dibawah ini</h2>

    <form method="post" action="<?= base_url('user/diagnosaAksi') ?>">
    <?php
        $no = 1;
        foreach ($gejala as $g) {
        ?>
            <div class="card">
                <div class="card-main">
                    <p><?php echo $no++; ?>. <?php echo $g->nama_gejala; ?></p>
                </div>
                <div class="symptom-radio-group">
                    <input type="checkbox" class="check" name="id_gejala[]" value="<?= $g->id_gejala; ?>">
                </div>
            </div>
        <?php
        }
        ?>

      <div class="button-container">
          <input class="button" type="submit" class="btn btn-primary" value="Diagnosa Sekarang">
      </div>
  </form>


  </section>
  </body>
</html>