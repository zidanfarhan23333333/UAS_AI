<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

        .container {
            display: flex;
            justify-content: flex-end;
            margin: 20px;
        }

        .card {
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .card1 {
            border: 5px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(255, 254, 254, 0.1);
            margin: 70px;
        }

        .card h2, .card1 h2 {
            color: #fff;
            font-size: 20px;
        }

        .card p, .card1 p {
            margin: 10px 0;
            color: #fff;
            font-size: 12px;
        }

        .button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <title>Info Card</title>
</head>

<body>
<header class="header">
    <a href="#" class="logo">Sistem Pakar</a>
    <i class="bx bx-menu" id="menu-icon"></i>
    <nav class="navbar">
        <a href="#home" class="active">Home</a>
        <a href="diagnosa.html">Diagnosis</a>
        <a href="#contact">Contact</a>
    </nav>
</header>

<section>
    <div class="card1">
        <h2>Diagnosa Pasien</h2>
        <p></p>

        <div class="card">
            <h2>Nama_Pasien</h2>
            <p>Farhan</p>
        </div>

        <div class="card">
            <h2>Penyakit</h2>
            <!-- Your lengthy content here -->
        </div>

        <div class="card">
            <h2>Presentase</h2>
            <p>120%</p>
        </div>

        <div class="card">
            <h2>Definisi</h2>
            <!-- Your lengthy content here -->
        </div>

        <div class="card">
            <h2>Pengobatan</h2>
            <!-- Your lengthy content here -->
        </div>
    </div>
</section>

<div>
    <?php $no = 1; ?>
    <?php foreach ($nilai_p as $value): ?>
        <?php echo $no++; ?>. <?= $value; ?><br>
    <?php endforeach; ?>
</div>

<p>Id gejala inputan user:</p>
<div>
    <?php $no = 1; ?>
    <?php foreach ($nilai_p as $value): ?>
        <?php echo $no++; ?>. <?= $value; ?><br>
    <?php endforeach; ?>
</div>

<p>Menampilkan id yang sama:</p>
<div>
    <?php $no = 1; ?>
    <?php foreach ($matched_ids as $value): ?>
        <?php echo $no++; ?>. <?= $value; ?><br>
    <?php endforeach; ?>
</div>

<a href="<?= base_url('user/diagnosa'); ?>">Back to Diagnosa Form</a>
<div class="container">
    <button class="button">Click Me</button>
</div>
</body>
</html>
