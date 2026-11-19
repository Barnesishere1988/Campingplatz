<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../Controller/PlaceController.php';

$id = pageId();
$action = input($_GET, 'action');
$errors = [];

if ($id) {
    $place = PlaceController::getById($id);
    if (!$place) {
        errorPage(404, 'Der Stellplatz wurde nicht gefunden.');
    }
    if ($action === 'remove' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        verifyPost();
        $error = PlaceController::remove($id);
        if (!$error) {
            done('places.php', 'Der Stellplatz wurde entfernt.');
        }
        $errors[] = $error;
    }
} else {
    $places = PlaceController::getAll();
}

require __DIR__ . '/../src/views/layout/header.php';
if ($id) {
    require __DIR__ . '/../src/views/place-detail.php';
} else {
    require __DIR__ . '/../src/views/places.php';
}
require __DIR__ . '/../src/views/layout/footer.php';
