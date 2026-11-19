<?php

session_start();
date_default_timezone_set('Europe/Vienna');

require_once __DIR__ . '/../Model/DB.php';
require_once __DIR__ . '/../Requests/input.php';

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function errorPage($status, $error)
{
    http_response_code($status);
    require __DIR__ . '/views/layout/header.php';
    require __DIR__ . '/views/error.php';
    require __DIR__ . '/views/layout/footer.php';
    exit;
}

function done($page, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $page, true, 303);
    exit;
}

set_exception_handler(function ($exception) {
    error_log((string) $exception);
    errorPage(500, 'Die Anfrage konnte nicht verarbeitet werden. Bitte prüfe die Datenbankverbindung.');
});
