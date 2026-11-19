<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../Controller/PlaceController.php';
require __DIR__ . '/../Controller/ReservationController.php';

$filters = readFilters($_GET);
$places = PlaceController::getAll(true);
$reservations = ReservationController::getAll($filters);

require __DIR__ . '/../src/views/layout/header.php';
require __DIR__ . '/../src/views/reservations.php';
require __DIR__ . '/../src/views/layout/footer.php';
