<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />

    <head>
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
    </head>
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

section {
  padding: 70px 17%;
}
.home {
  width: 100%;
  min-width: 90vh;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-gap: 1.5rem;
  align-items: center;
}
.home-img img {
  max-width: 100%;
  width: 600px;
  height: auto;
}

.home-text h1 {
  font-size: var(--big-font);
  color: var(--main-color);
}

.home-text h2 {
  font-size: var(--h2-font);
  margin: 1rem 0.2rem;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  background: var(--main-color);
  border-radius: 20px;
  color: #fff;
}

.btn:hover {
  transform: scale(1.2) translateY(10px);
  transition: 0.4s;
}

.about {
  display: grid;
  grid-template-columns: repeat(2, 2fr);
  grid-gap: 1.5rem;
  align-items: center;
}
.about-img img {
  max-width: 100%;
  width: 480px;
  height: auto;
}

.about-text span {
  color: var(--main-color);
}

.heading {
  text-align: center;
}

.heading span {
  color: var(--main-color);
  font-weight: 600;
}

.heading h2 {
  font-size: var(--h2-font);
}

.menu-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, auto));
  grid-gap: 1.5rem;
  align-items: center;
}

.box {
  position: relative;
  margin-top: 4rem;
  height: auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: #feeee7;
  padding: 20px;
  border-radius: 0.5rem;
}
.box-image {
  width: 220px;
  height: 220px;
}
.box-image img {
  width: 100%;
  height: 100%;
}

.box h2 {
  font-size: 1.3rem;
  color: var(--bg-color);
}
.box h3 {
  color: var(--bg-color);
  font-size: 1rem;
  font-weight: 400;
  margin: 4px 0px 10px;
}
.box span {
  font-size: var(--p-font);
  color: var(--main-color);
  font-weight: 600;
}

.box .bx {
  background: var(--main-color);
  position: absolute;
  right: 0;
  top: 0;
  font-size: 20px;
  padding: 7px 10px;
  border-radius: 0 0.5rem;
}

    </style>
  </head>
  <body>
    <header>
      <a href="#" class="logo">Sistem Pakar kelompok 2</a>
      <div class="bx bx-menu" id="menu-icon"></div>

      <ul class="navbar">
        <li><a href="#home">Home</a></li>
        <li><a href="<?php echo base_url().'user/diagnosa'; ?>">Diagnosis</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </header>

    <section class="home" id="home">
      <div class="home-text">
        <h1>Sistem Pakar</h1>
        <h2>
          Diagnosis Penyakit pada Gigi Manusia Menggunakan Metode Naive Bayes”
          <br />
        </h2>
        <a href="#" class="btn">Cek Diagnosis</a>
      </div>

      <div class="home-img">
        <img src="<?php echo base_url().'images/dokter.png'; ?>" alt="" />
    </div>


    <section class="footer" id="footer">
      <div class="footer-container">
        <div class="address">
          <h2>Lokasi Tempat</h2>
          <p>Mertoyudan Metro Kab.Magelang</p>
          <p>Email: sistempakar.com</p>
          <p>Phone: 0872292029928228</p>
        </div>
        <div class="social-media">
          <h2>Connect with Us</h2>
          <ul>
            <li>
              <a href="#" target="_blank"><i class="bx bxl-facebook"></i></a>
            </li>
            <li>
              <a href="#" target="_blank"><i class="bx bxl-twitter"></i></a>
            </li>
            <li>
              <a href="#" target="_blank"><i class="bx bxl-instagram"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </body>
</html>
