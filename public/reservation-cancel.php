<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../Controller/ReservationController.php';

$id = pageId();
$reservation = ReservationController::getById($id);
if (!$reservation) {
    errorPage(404, 'Die Reservierung wurde nicht gefunden oder ist bereits storniert.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verifyPost();
    if (ReservationController::cancel($id)) {
        done('index.php', 'Die Reservierung wurde storniert.');
    }
    errorPage(404, 'Die Reservierung ist bereits storniert.');
}

require __DIR__ . '/../src/views/layout/header.php';
require __DIR__ . '/../src/views/reservation-cancel.php';
require __DIR__ . '/../src/views/layout/footer.php';
