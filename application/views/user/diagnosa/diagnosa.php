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

      .symptom-table {
        margin: 20px;
        color: #ff702a;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      th,
      td {
        border: 1px solid white;
        padding: 10px;
        text-align: left;
      }

      th {
        background-color: #f2f2f2;
      }

      .symptom-checkbox {
        transform: scale(1.5);
      }
    </style>
  </head>
  <body>
    <header>
      <a href="#" class="logo">Sistem Pakar kelompok 2</a>
      <div class="bx bx-menu" id="menu-icon"></div>

      <ul class="navbar">
        <li><a href="dashboard.html">Home</a></li>
        <li><a href="#">Diagnnosis</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </header>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="styles.css" />
        <title>Tabel Gejala</title>
      </head>
      <body>
        <header>
          <a href="#" class="logo">Sistem Pakar kelompok 2</a>
          <div class="bx bx-menu" id="menu-icon"></div>

          <ul class="navbar">
            <li><a href="dashboard.html">Home</a></li>
            <li><a href="#">Diagnosis</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </header>

        <section class="symptom-table">
          <h2>TableGejala</h2>
          <table>
            <thead>
              <tr>
                <th>Gejala</th>
                <th>Checklist</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Gejala 1</td>
                <td><input type="checkbox" class="symptom-checkbox" /></td>
              </tr>
              <tr>
                <td>Gejala 2</td>
                <td><input type="checkbox" class="symptom-checkbox" /></td>
              </tr>
              <tr>
                <td>Gejala 3</td>
                <td><input type="checkbox" class="symptom-checkbox" /></td>
              </tr>
              <tr>
                <td>Gejala 4</td>
                <td><input type="checkbox" class="symptom-checkbox" /></td>
              </tr>

              <tr>
                <td>Gejala 5</td>
                <td><input type="checkbox" class="symptom-checkbox" /></td>
              </tr>
              <tr>
                <td>Gejala 6</td>
                <td><input type="checkbox" class="symptom-checkbox" /></td>
              </tr>
              <tr>
                <td>Gejala 7</td>
                <td><input type="checkbox" class="symptom-checkbox" /></td>
              </tr>
            </tbody>
          </table>
        </section>
      </body>
    </html>
  </body>
</html>
