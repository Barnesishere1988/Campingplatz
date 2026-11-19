<h1>Stellplatz <?= e($place['number']) ?></h1>
<dl>
    <dt>Beschreibung</dt><dd><?= e($place['description']) ?></dd>
    <dt>Art</dt><dd><?= e($place['type']) ?></dd>
    <dt>Maximale Personenanzahl</dt><dd><?= e($place['capacity']) ?></dd>
    <dt>Preis pro Nacht</dt><dd><?= number_format($place['price'], 2, ',', '.') ?> €</dd>
</dl>
<?php if ($action === 'remove'): ?>
    <form method="post">
        <p>Möchtest du diesen Stellplatz entfernen?</p>
        <input type="hidden" name="csrf" value="<?= e(csrfToken()) ?>">
        <button class="danger">Stellplatz entfernen</button>
        <a href="places.php?id=<?= e($place['id']) ?>">Abbrechen</a>
    </form>
<?php else: ?>
    <p class="actions">
        <a class="button" href="newplaces.php?id=<?= e($place['id']) ?>">Bearbeiten</a>
        <a href="places.php?id=<?= e($place['id']) ?>&amp;action=remove">Entfernen</a>
        <a href="places.php">Zur Übersicht</a>
    </p>
<?php endif; ?>
