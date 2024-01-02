<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
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
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
    }

    section {
      flex: 1;
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
      font-size: 2.4rem;
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

    form {
  max-width: 400px;
  margin: 3rem auto;
  background-color: #2c304d;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  font-size: 24px;
  margin-bottom: 20px;
  color: #fff;
}

label {
  display: block;
  margin: 10px 0 5px;
  font-size: 14px;
  color: #fff;
}

input {
  width: calc(100% - 12px);
  padding: 8px;
  margin-top: 5px;
  margin-bottom: 10px;
  box-sizing: border-box;
  border: 1px solid #4e5278;
  border-radius: 4px;
}

.button {
  display: inline-block;
  padding: 10px 20px;
  text-align: center;
  background-color: #3498db;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-decoration: none;
  transition: background-color 0.3s;
}

.button:hover {
  background-color: #297fb8;
}
.services {
  margin-bottom: 3rem; 
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
        margin: 1rem;
      }

      .row {
    display: flex;
     margin-top: 2rem;
    flex-wrap: wrap;
  }

    .row .maps {
      flex: 1 1 100%; 
      height: 500px; 
      object-fit: cover;
      box-shadow: 1px solid #333;
    }

  </style>
  <body>
    <header class="header">
    <a href="#" class="logo">Sistem Pakar Kelompok 2</a>

      <i class="bx bx-menu" id="menu-icon"></i>

      <nav class="navbar">
        <a href="<?php echo base_url(). 'user/dashboard'; ?>">Home</a>
        <a href="<?php echo base_url(). 'user/diagnosa'; ?>">Diagnosis</a>
        <a href="#contact" class="active">Contact</a>
      </nav>
    </header>



      
    <section class="services" id="services">
      <h2 class="heading">Our <span>Services</span></h2>

      <div class="services-container">
        <div class="services-box">
          <i class="bx bx-map"></i>

          <h3>Lokasi Pakar</h3>
          <div class="row">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.4858517813054!2d110.22449557454982!3d-7.521864474224029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8f593d665a8f%3A0xd4e74aab2b530e83!2sKampus%202%20Universitas%20Muhammadiyah%20Magelang!5e0!3m2!1sid!2sid!4v1703756520039!5m2!1sid!2sid"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="maps"></iframe>

          </div>
          
          <p>Jl. Mayjen Bambang Soegeng, Glagak, Sumberrejo, Kec. Mertoyudan, Kabupaten Magelang, Jawa Tengah 56172</p>
          <a href="#" class="btn">Contact Us</a>
        </div>
      </div>
    </section>

    <form action="">
      <div>
        <label for="Nama">Nama:</label>
        <i data-feather="user"></i>
        <input type="text" id="Nama" placeholder="Enter your Nama" />
      </div>

      <div>
        <label for="Email">Email:</label>
        <i data-feather="mail"></i>
        <input type="Email" id="Email" placeholder="Enter your Email" />
      </div>
      <div>
        <label for="To Telepon">No Telepon:</label>
        <i data-feather="phone"></i>
        <input
          type="No Telepon"
          id="No Telepon"
          placeholder="Enter your No Telepon"
        />
      </div>

      <button type="submit" class="button">Simpan</button>
      </form>
    
  </body>
</html>
