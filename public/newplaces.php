<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../Controller/PlaceController.php';

$id = pageId();
$place = $id ? PlaceController::getById($id) : [];
if ($place === false) {
    errorPage(404, 'Der Stellplatz wurde nicht gefunden.');
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verifyPost();
    [$place, $errors] = PlaceController::save($id, $_POST);
    if (!$errors) {
        done('places.php', 'Der Stellplatz wurde gespeichert.');
    }
}

require __DIR__ . '/../src/views/layout/header.php';
require __DIR__ . '/../src/views/place-form.php';
require __DIR__ . '/../src/views/layout/footer.php';
