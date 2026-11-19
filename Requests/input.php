<?php

function input($source, $name)
{
    $value = $source[$name] ?? '';
    if (!is_string($value) || !mb_check_encoding($value, 'UTF-8') || strpos($value, "\0") !== false) {
        return '';
    }
    return trim($value);
}

function positiveNumber($value)
{
    return filter_var($value, FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1, 'max_range' => 2147483647]
    ]);
}

function csrfToken()
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function verifyPost()
{
    if (!hash_equals(csrfToken(), input($_POST, 'csrf'))) {
        errorPage(403, 'Das Formular ist abgelaufen. Bitte öffne die Seite erneut.');
    }
}

function pageId()
{
    if (!isset($_GET['id'])) {
        return 0;
    }
    $id = positiveNumber(input($_GET, 'id'));
    if (!$id) {
        errorPage(404, 'Der Eintrag wurde nicht gefunden.');
    }
    return $id;
}
