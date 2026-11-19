<?php

function placeTypes()
{
    return ['Zelt', 'Wohnwagen', 'Wohnmobil'];
}

function readPlace($post)
{
    $place = [];
    $errors = [];
    foreach (['number', 'description', 'type', 'capacity', 'price'] as $field) {
        $place[$field] = input($post, $field);
    }
    if ($place['number'] === '' || mb_strlen($place['number']) > 30) {
        $errors[] = 'Gib eine Stellplatznummer mit höchstens 30 Zeichen ein.';
    }
    if ($place['description'] === '' || mb_strlen($place['description']) > 255) {
        $errors[] = 'Gib eine Beschreibung mit höchstens 255 Zeichen ein.';
    }
    if (!in_array($place['type'], placeTypes(), true)) {
        $errors[] = 'Wähle eine Stellplatzart aus.';
    }
    if (!positiveNumber($place['capacity'])) {
        $errors[] = 'Gib eine gültige maximale Personenanzahl ein.';
    }
    $place['price'] = str_replace(',', '.', $place['price']);
    if (!preg_match('/^\d{1,8}(\.\d{1,2})?$/D', $place['price'])) {
        $errors[] = 'Gib einen Preis ab 0 € mit höchstens zwei Nachkommastellen ein.';
    }
    return [$place, $errors];
}
