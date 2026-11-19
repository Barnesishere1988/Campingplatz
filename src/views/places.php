<h1>Stellplätze</h1>
<p><a class="button" href="newplaces.php">Stellplatz hinzufügen</a></p>
<?php if (!$places): ?>
    <p>Es wurden noch keine Stellplätze angelegt.</p>
<?php else: ?>
    <div class="table-wrap">
        <table>
            <thead><tr><th>Nummer</th><th>Art</th><th>Max. Personen</th><th>Preis pro Nacht</th><th>Aktionen</th></tr></thead>
            <tbody>
                <?php foreach ($places as $place): ?>
                    <tr>
                        <td><?= e($place['number']) ?></td>
                        <td><?= e($place['type']) ?></td>
                        <td><?= e($place['capacity']) ?></td>
                        <td><?= number_format($place['price'], 2, ',', '.') ?> €</td>
                        <td><a href="places.php?id=<?= e($place['id']) ?>">Details</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
