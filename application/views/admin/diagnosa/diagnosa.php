<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Div dengan Checkbox</title>
    <style>
        .container {
            display: flex;
            align-items: center;
            color: white;
            border: 2px solid #ccc;
            padding: 10px;
            border-radius: 8px;
            margin: 20px auto; /* Menjadikan margin auto dan menghapus margin kiri dan kanan */
            max-width: 1200px; /* Menetapkan lebar maksimum */
            width: 100%; /* Mengatur agar lebar 100% */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .box{
            display: flex;
            gap: 350px;
        }

        .check {
            display: flex;
        }

        .checkbox-label {
            margin-right: 20px;
            display: flex;
            align-items: center;
        }

        .checkbox-label input {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="box">
        <div class="text">
                <p style="margin-right: 40px;">Tulisan Singkat</p>
        </div>
        <div class="check">
        <?php for ($i = 1; $i <= 5; $i++) : ?>
            <label class="checkbox-label">
                <input type="checkbox" name="checkbox<?= $i; ?>"> Checkbox <?= $i; ?>
            </label>
        <?php endfor; ?>
        </div>
    </div>
</div>

</body>
</html>
