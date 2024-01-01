<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Pakar - User</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;1,100;1,300;1,700&display=swap"
      rel="stylesheet"
    />

    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="style.css" />
    <style>
          * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        border: none;
        outline: none;
        scroll-behavior: smooth;
        font-family: Poppins, sans-serif;
      }

      :root {
        --bg-color: #1f242d;
        --second-bg-color: #323946;
        --text-color: #fff;
        --main-color: #0ef;
      }


      html {
        font-size: 62.5%;
        overflow-x: hidden;
      }

      body {
        background: var(--bg-color);
        color: var(--text-color);
      }

      section {
        min-height: 100vh;
        padding: 10rem 9% 2rem;
      }

      .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 2rem 9%;
        background: var(--bg-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 100;
      }

      .logo {
      color: var(--main-color);
      font-weight: 600;
      font-size: 2rem;
      }

      .navbar a {
        font-size: 1.7rem;
        color: var(--text-color);
        margin-left: 4rem;
        transition: 0.3s;
      }

      .navbar a:hover,
      .navbar a.active {
        color: var(--main-color);
      }

      #menu-icon {
        font-size: 3.6rem;
        color: var(--text-color);
        display: none;
      }
    </style>
</head>
<body>
<header class="header">
      <a href="#" class="logo">Sistem Pakar Kelompok 2</a>

      <i class="bx bx-menu" id="menu-icon"></i>

      <nav class="navbar">
        <a href="<?php echo base_url().'user/dashboard'; ?>">Home</a>
       <a href="<?php echo base_url().'user/diagnosa'; ?>">Diagnosa</a>
        <a class="active" href="#">Contact</a>
      </nav>
    </header>
    
</body>
</html>