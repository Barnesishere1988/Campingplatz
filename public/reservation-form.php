<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../Controller/PlaceController.php';
require __DIR__ . '/../Controller/ReservationController.php';

$id = pageId();
$reservation = $id ? ReservationController::getById($id) : [];
if ($reservation === false) {
    errorPage(404, 'Die Reservierung kann nicht bearbeitet werden.');
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verifyPost();
    [$reservation, $errors] = ReservationController::save($id, $_POST);
    if (!$errors) {
        done('index.php', 'Die Reservierung wurde gespeichert.');
    }
}

$places = PlaceController::getAll();
require __DIR__ . '/../src/views/layout/header.php';
require __DIR__ . '/../src/views/reservation-form.php';
require __DIR__ . '/../src/views/layout/footer.php';
