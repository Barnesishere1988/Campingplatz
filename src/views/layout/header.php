<?php
$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);
?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Campinghelfer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require __DIR__ . '/../navbar.php'; ?>
    <main>
        <?php if ($message !== ''): ?>
            <p class="success" role="status"><?= e($message) ?></p>
        <?php endif; ?>
        <?php if (!empty($errors)): ?>
            <ul class="error" role="alert">
                <?php foreach ($errors as $problem): ?>
                    <li><?= e($problem) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
