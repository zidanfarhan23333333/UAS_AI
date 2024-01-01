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
            gap: 20px;
        }
        
        .card {
            border: 3px solid var(--main-color);
            border-radius: 8px;
            overflow: auto;
            box-shadow: 0 4px 8px rgba(255, 254, 254, 0.1);
            width: 80%;
            margin: 0 auto; 
            padding: 20px; 
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

        .data-user-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .data-user-label {
            width: 150px; 
            margin-right: 10px;
            color: white;
            font-size: 1.5em; 

        }

        .data-user {
            font-size: 1.5em; 
            padding: 10px; 
            width: 100%;
            box-sizing: border-box;
            border: none;
            background-color: transparent;
            border-bottom: 1px solid #fff;
            margin-top: 5px;
            margin-bottom: 15px;
            color: white;
            white-space: normal; 
            word-wrap: break-word; 
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
    <form method="post" action="<?php echo base_url().'user/tambah_aksi' ?>" class="card">
        <h1 class="card-title">Hasil Diagnosa</h1>
            <div class="data-user-container">
                <label class="data-user-label">Nama :</label>
                <input type="text" class="data-user" name="nama_pasien" value="<?php echo $nama_pasien; ?>" readonly>
            </div>
            <div class="data-user-container">
                <label class="data-user-label">Umur :</label>
                <input type="text" class="data-user" name="umur_pasien" value="<?php echo $umur_pasien; ?>" readonly>
            </div>
            <div class="data-user-container">
                <label class="data-user-label">Tanggal Lahir:</label>
                <input type="text" class="data-user" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" readonly>
            </div>
            <div class="data-user-container">
                <label class="data-user-label">Jenis Kelamin:</label>
                <input type="text" class="data-user" name="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>" readonly>
            </div>
            <div class="data-user-container">
                <label class="data-user-label">Tanggal Diagnosa:</label>
                <input type="text" class="data-user" name="tanggal_diagnosa" value="<?php echo $tanggal_diagnosa; ?>" readonly>
            </div>
            <div class="data-user-container">
                <label class="data-user-label">Penyakit:</label>
                <input type="text" class="data-user" name="penyakit_pasien" value="<?php echo $namaPenyakitPersentaseTerbesar; ?>" readonly>
            </div>
            <div class="data-user-container">
                <label class="data-user-label">Tingkat keyakinan:</label>
                <input type="text" class="data-user" name="persentase" value="<?php echo $persentase; ?>%" readonly>
            </div>
            <div class="data-user-container">
                <label class="data-user-label">Definisi:</label>
                <input type="text" class="data-user" name="definisi" value="<?php echo $definisi; ?>" readonly>
            </div>
            <div class="data-user-container">
                <label class="data-user-label">Cara Pengobatan:</label>
                <input type="text" class="data-user" name="pengobatan" value="<?php echo $pengobatan; ?>" readonly>
            </div>
            <div class="button-container">
                <a href="<?php echo base_url().'user/diagnosa'?>" class="button">Diagnosa Lagi</a>
                <input type="submit" class="button" value="Selesai">
            </div>
    </form>
</div>


    </section>

</body>
</html> 