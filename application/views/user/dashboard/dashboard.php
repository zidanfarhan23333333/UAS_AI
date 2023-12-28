<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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
        font-size: 2.5rem;
        color: var(--text-color);
        font-weight: 500;
        cursor: default;
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

      .home {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .home-img img {
        width: 35vw;
      }

      .home-content h3 {
        font-size: 3.2rem;
        font-weight: 700;
      }

      .home-content h3:nth-of-type(2) {
        margin-bottom: 2rem;
      }

      span {
        color: var(--main-color);
      }

      .home-content h1 {
        font-size: 3.6rem;
        font-weight: 700;
        line-height: 1.3;
      }

      .home-content p {
        font-size: 1.6rem;
      }

      .social-media a {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 4rem;
        height: 4rem;
        background: transparent;
        border: 0.2rem solid var(--main-color);
        border-radius: 50%;
        font-size: 2rem;
        color: var(--main-color);
        margin: 3rem 1.5rem 3rem 0;
        transition: 0.5s ease;
      }

      .social-media a:hover {
        background: var(--main-color);
        color: var(--second-bg-color);
        box-shadow: 0 0 1rem var(--main-color);
      }

      .btn {
        display: inline-block;
        padding: 1rem 2.8rem;
        background: var(--main-color);
        border-radius: 4rem;
        box-shadow: 0 0 1rem var(--main-color);
        font-size: 1.6rem;
        letter-spacing: 0.1rem;
        font-weight: 600;
        transition: 0.5s;
      }

      .btn:hover {
        box-shadow: none;
      }

      .about {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2rem;
        background: var(--second-bg-color);
      }

      .about-img img {
        width: 35vw;
      }

      .heading {
        text-align: center;
        font-size: 4.5rem;
      }

      .about-content h2 {
        text-align: left;
        line-height: 1.2;
      }

      .about-content h3 {
        font-size: 2.6rem;
      }

      .about-content p {
        font-size: 1.6rem;
        margin: 2rem 0 3rem;
      }

      .services h2 {
        margin-bottom: 5rem;
      }

      .services-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 2rem;
      }

      .services-container .services-box {
        flex: 1 1 30rem;
        background: var(--second-bg-color);
        padding: 3rem 2rem 4rem;
        border-radius: 2rem;
        text-align: center;
        border: 0.2rem solid var(--bg-color);
        transition: 0.5s ease-in-out;
      }

      .services-container .services-box:hover {
        border-color: var(--main-color);
        transform: scale(1.02);
      }

      .services-box i {
        font-size: 7rem;
        color: var(--main-color);
      }

      .services-box h3 {
        font-size: 2.6rem;
      }

      .services-box p {
        font-size: 1.6rem;
        margin: 0.6rem;
      }

      .portofolio {
        background: var(--bg-color);
      }

      .portofolio h2 {
        margin-bottom: 4rem;
      }

      .portofolio-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        align-items: center;
        gap: 2.5rem;
      }

      .portofolio-container .portofolio-box {
        position: relative;
        border-radius: 2rem;
        box-shadow: 0 0 1rem var(--bg-color);
        overflow: hidden;
        display: flex;
      }

      .portofolio-box img {
        width: 100%;
      }
    </style>
  </head>
  <body>
    <header class="header">
      <a href="#" class="logo">Sistem Pakar</a>

      <i class="bx bx-menu" id="menu-icon"></i>

      <nav class="navbar">
        <a href="#home" class="active">Home</a>
       <a href="<?php echo base_url().'user/diagnosa'; ?>">Diagnosis</a>
        <a href="#contact">Contact</a>
      </nav>
    </header>

    <!-- section -->

    <section class="home" id="home">
      <div class="home-content">
        <h3>Sistem Pakar</h3>
        <h1>
          "Diagnosis Penyakit pada Gigi Manusia Menggunakan Metode Naive Bayes”
        </h1>

        <p></p>
        <div class="social-media">
          <a href="#"><i class="bx bxl-facebook-circle"></i></a>
          <a href="#"><i class="bx bxl-instagram"></i></a>
          <a href="#"><i class="bx bxl-whatsapp"></i></a>
          <a href="#"><i class="bx bxl-twitter"></i></a>
        </div>
        <a href="#" class="btn">Cek Diagnosis</a>
      </div>

      <div class="home-img">
      <img src="<?php echo base_url().'images/dokter.png'; ?>" alt="" />
</div>

    </section>

    <section class="services" id="services">
      <h2 class="heading">Our <span>Services</span></h2>

      <div class="services-container">
        <div class="services-box">
          <i class="bx bx-map"></i>

          <h3>Lokasi Pakar</h3>
          <p>Mertoyudan,pandasari Magelang</p>
          <a href="#" class="btn">Contact Us</a>
        </div>
      </div>
    </section>
  </body>
</html>
