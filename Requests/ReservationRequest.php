<?php

function validDate($value)
{
    $date = DateTimeImmutable::createFromFormat('!Y-m-d', $value);
    return $date && $date->format('Y-m-d') === $value && $value >= '1000-01-01';
}

function readReservation($post)
{
    $reservation = [];
    $errors = [];
    foreach (['guest', 'contact', 'place_id', 'arrival', 'departure', 'people'] as $field) {
        $reservation[$field] = input($post, $field);
    }
    if ($reservation['guest'] === '' || mb_strlen($reservation['guest']) > 120) {
        $errors[] = 'Gib einen Gastnamen mit höchstens 120 Zeichen ein.';
    }
    $contact = $reservation['contact'];
    $phone = preg_match('/^\+?[0-9][0-9 ().\/\-]*$/D', $contact)
        && strlen(preg_replace('/\D/', '', $contact)) >= 5;
    if (mb_strlen($contact) > 150 || (!$phone && !filter_var($contact, FILTER_VALIDATE_EMAIL))) {
        $errors[] = 'Gib eine gültige Telefonnummer oder E-Mail-Adresse ein.';
    }
    if (!positiveNumber($reservation['place_id'])) {
        $errors[] = 'Wähle einen Stellplatz aus.';
    }
    if (!validDate($reservation['arrival']) || !validDate($reservation['departure'])) {
        $errors[] = 'Gib ein gültiges Anreise- und Abreisedatum ein.';
    } elseif ($reservation['departure'] <= $reservation['arrival']) {
        $errors[] = 'Das Abreisedatum muss nach dem Anreisedatum liegen.';
    }
    if (!positiveNumber($reservation['people'])) {
        $errors[] = 'Gib eine gültige Personenanzahl ein.';
    }
    return [$reservation, $errors];
}

function readFilters($query)
{
    return [
        'guest' => mb_substr(input($query, 'guest'), 0, 120),
        'place_id' => positiveNumber(input($query, 'place_id')),
        'upcoming' => input($query, 'upcoming') === '1'
    ];
}
