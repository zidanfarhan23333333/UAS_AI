<!-- app/Views/diagnosa_result.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosa Result</title>
</head>
<body>
    <h2>Diagnosa Result</h2>

    <p>Nilai Probabilitas user:</p>
    <div>
        <?php $no = 1; ?>
        <?php foreach ($nilai_p as $value): ?>
            <?php echo $no++; ?>. <?= $value; ?><br>
        <?php endforeach; ?>
    </div>

    <a href="<?= base_url('user/diagnosa'); ?>">Back to Diagnosa Form</a>
</body>
</html>
