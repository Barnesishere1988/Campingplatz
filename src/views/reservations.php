<h1>Reservierungen</h1>
<p><a class="button" href="reservation-form.php">Neue Reservierung</a></p>
<form method="get" class="filters">
    <label>Gastname
        <input type="search" name="guest" maxlength="120" value="<?= e($filters['guest']) ?>">
    </label>
    <label>Stellplatz
        <select name="place_id">
            <option value="">Alle Stellplätze</option>
            <?php foreach ($places as $place): ?>
                <option value="<?= e($place['id']) ?>" <?= $filters['place_id'] == $place['id'] ? 'selected' : '' ?>>
                    <?= e($place['number']) ?><?= $place['removed'] ? ' (entfernt)' : '' ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
    <label><input type="checkbox" name="upcoming" value="1" <?= $filters['upcoming'] ? 'checked' : '' ?>>
        Anreise ab heute
    </label>
    <div class="actions">
        <button>Filtern</button>
        <a href="index.php">Filter zurücksetzen</a>
    </div>
</form>
<?php if (!$reservations): ?>
    <p>Keine Reservierungen gefunden.</p>
<?php else: ?>
    <div class="table-wrap">
        <table>
            <thead>
                <tr><th>Gast</th><th>Stellplatz</th><th>Anreise</th><th>Abreise</th><th>Personen</th><th>Kosten</th><th>Status</th><th>Aktionen</th></tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <?php $nights = Reservation::nights($reservation); ?>
                    <tr>
                        <td><?= e($reservation['guest']) ?><br><small><?= e($reservation['contact']) ?></small></td>
                        <td><?= e($reservation['place_number']) ?></td>
                        <td><?= (new DateTimeImmutable($reservation['arrival']))->format('d.m.Y') ?></td>
                        <td><?= (new DateTimeImmutable($reservation['departure']))->format('d.m.Y') ?></td>
                        <td><?= e($reservation['people']) ?></td>
                        <td><?= number_format($nights * $reservation['nightly_price'], 2, ',', '.') ?> €</td>
                        <td><?= $reservation['cancelled'] ? 'Storniert' : 'Gebucht' ?></td>
                        <td>
                            <?php if (!$reservation['cancelled']): ?>
                                <a href="reservation-form.php?id=<?= e($reservation['id']) ?>">Bearbeiten</a><br>
                                <a href="reservation-cancel.php?id=<?= e($reservation['id']) ?>">Stornieren</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
