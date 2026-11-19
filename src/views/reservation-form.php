<h1><?= $id ? 'Reservierung bearbeiten' : 'Neue Reservierung' ?></h1>
<?php if (!$places): ?>
    <p>Lege zuerst einen <a href="newplaces.php">Stellplatz</a> an.</p>
<?php else: ?>
    <form method="post" class="fields">
        <input type="hidden" name="csrf" value="<?= e(csrfToken()) ?>">
        <label>Gastname
            <input name="guest" required maxlength="120" value="<?= e($reservation['guest'] ?? '') ?>">
        </label>
        <label>Telefonnummer oder E-Mail-Adresse
            <input name="contact" required maxlength="150" value="<?= e($reservation['contact'] ?? '') ?>">
        </label>
        <label>Stellplatz
            <select name="place_id" required>
                <option value="">Bitte auswählen</option>
                <?php foreach ($places as $place): ?>
                    <option value="<?= e($place['id']) ?>" <?= ($reservation['place_id'] ?? '') == $place['id'] ? 'selected' : '' ?>>
                        <?= e($place['number']) ?> – <?= e($place['type']) ?> (max. <?= e($place['capacity']) ?> Personen)
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <label>Anreise
            <input type="date" name="arrival" required value="<?= e($reservation['arrival'] ?? '') ?>">
        </label>
        <label>Abreise
            <input type="date" name="departure" required value="<?= e($reservation['departure'] ?? '') ?>">
        </label>
        <label>Personenanzahl
            <input type="number" name="people" min="1" max="2147483647" required value="<?= e($reservation['people'] ?? '') ?>">
        </label>
        <div class="actions">
            <button>Speichern</button>
            <a href="index.php">Abbrechen</a>
        </div>
    </form>
<?php endif; ?>
