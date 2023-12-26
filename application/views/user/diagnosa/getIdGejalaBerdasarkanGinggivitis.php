<!-- your_view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ginggivitis Gejala</title>
</head>
<body>

<h1>Gejala Ginggivitis</h1>

<?php if ($rule): ?>
    <ul>
        <?php foreach ($rule as $gejala): ?>
            <li><?php echo $gejala->id_gejala; ?>. <?php echo $gejala->bobot ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Tidak ada gejala ginggivitis yang ditemukan.</p>
<?php endif; ?>

</body>
</html>
