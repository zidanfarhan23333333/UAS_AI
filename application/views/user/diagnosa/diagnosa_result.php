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

        .card-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .card {
            border: 3px solid var(--main-color);
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(255, 254, 254, 0.1);
            margin: 70px;

        }

        .button-container {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .card-title {
            text-align: center;
            font-weight: bold;
            font-size: 2rem;
        }

        .data-user {
            margin-bottom: 20px;
        }

        .button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            font-size: 1.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <title>Sistem Pakar - User</title>
</head>

<body>
<section>
    
        <div class="card-container">
            <div class="card">
                <h1 class="card-title">Hasil Diagnosa</h1>
                <h1 class="data-user">Nama Pasien: <?php echo $nama_pasien; ?></h1>
                <h1 class="data-user">Tanggal Diagnosa: <?php echo $tanggal_diagnosa; ?></h1>
                <h1 class="data-user">Penyakit: <?php echo $namaPenyakitPersentaseTerbesar; ?></h1>
                <h1 class="data-user">Tingkat keyakinan: <?php echo $persentase; ?>%</h1>
                <h1 class="data-user">Definisi: <?php echo $definisi; ?></h1>
                <h1 class="data-user">Cara Pengobatan: <?php echo $pengobatan; ?></h1>
            </div>
            <div class="button-container">
                <a href="<?php echo base_url().'user/dashboard'?>" class="button">Selesai</a>
                <a href="<?php echo base_url().'user/diagnosa'?>" class="button">Diagnosa Lagi</a>
            </div>
        </div>

    </section>

</body>
</html> 