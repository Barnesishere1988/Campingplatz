<h1><?= $id ? 'Stellplatz bearbeiten' : 'Stellplatz hinzufügen' ?></h1>
<form method="post" class="fields">
    <input type="hidden" name="csrf" value="<?= e(csrfToken()) ?>">
    <label>Stellplatznummer
        <input name="number" required maxlength="30" value="<?= e($place['number'] ?? '') ?>">
    </label>
    <label>Beschreibung
        <textarea name="description" required maxlength="255" rows="3"><?= e($place['description'] ?? '') ?></textarea>
    </label>
    <label>Stellplatzart
        <select name="type" required>
            <option value="">Bitte auswählen</option>
            <?php foreach (placeTypes() as $type): ?>
                <option <?= ($place['type'] ?? '') === $type ? 'selected' : '' ?>><?= e($type) ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <label>Maximale Personenanzahl
        <input type="number" name="capacity" required min="1" max="2147483647" value="<?= e($place['capacity'] ?? '') ?>">
    </label>
    <label>Preis pro Nacht in Euro
        <input name="price" inputmode="decimal" required value="<?= e($place['price'] ?? '') ?>">
    </label>
    <div class="actions">
        <button>Speichern</button>
        <a href="places.php">Abbrechen</a>
    </div>
</form>
