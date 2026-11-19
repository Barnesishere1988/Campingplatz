<h1>Reservierung stornieren</h1>
<p>Möchtest du die Reservierung von <strong><?= e($reservation['guest']) ?></strong>
    mit Anreise am <?= (new DateTimeImmutable($reservation['arrival']))->format('d.m.Y') ?> stornieren?</p>
<form method="post" class="actions">
    <input type="hidden" name="csrf" value="<?= e(csrfToken()) ?>">
    <button class="danger">Stornierung bestätigen</button>
    <a href="index.php">Abbrechen</a>
</form>
