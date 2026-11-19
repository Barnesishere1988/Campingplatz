<?php

require_once __DIR__ . '/Place.php';

class Reservation
{
    public static function all($db, $filters)
    {
        $sql = 'SELECT reservations.*, places.number AS place_number
            FROM reservations JOIN places ON reservations.place_id = places.id WHERE 1 = 1';
        $values = [];
        if ($filters['guest'] !== '') {
            $sql .= ' AND LOCATE(?, guest) > 0';
            $values[] = $filters['guest'];
        }
        if ($filters['place_id']) {
            $sql .= ' AND place_id = ?';
            $values[] = $filters['place_id'];
        }
        if ($filters['upcoming']) {
            $sql .= ' AND arrival >= ?';
            $values[] = date('Y-m-d');
        }
        $statement = $db->prepare($sql . ' ORDER BY arrival, reservations.id');
        $statement->execute($values);
        return $statement->fetchAll();
    }

    public static function find($db, $id, $lock = false)
    {
        $sql = 'SELECT * FROM reservations WHERE id = ? AND cancelled = 0';
        if ($lock) {
            $sql .= ' FOR UPDATE';
        }
        $statement = $db->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }

    public static function save($db, $id, $data)
    {
        $db->beginTransaction();
        // Änderungen für denselben Stellplatz laufen nacheinander.
        $place = Place::find($db, $data['place_id'], true);
        if (!$place) {
            $db->rollBack();
            return 'Bitte wähle einen vorhandenen Stellplatz.';
        }
        if ($data['people'] > $place['capacity']) {
            $db->rollBack();
            return 'Auf diesem Stellplatz sind höchstens ' . $place['capacity'] . ' Personen erlaubt.';
        }

        $price = $place['price'];
        if ($id) {
            $old = self::find($db, $id, true);
            if (!$old) {
                $db->rollBack();
                return 'Die Reservierung kann nicht bearbeitet werden.';
            }
            if ($old['place_id'] == $data['place_id']) {
                $price = $old['nightly_price'];
            }
        }

        $statement = $db->prepare('SELECT id FROM reservations
            WHERE place_id = ? AND cancelled = 0 AND arrival < ? AND departure > ? AND id <> ? LIMIT 1');
        $statement->execute([$data['place_id'], $data['departure'], $data['arrival'], $id]);
        if ($statement->fetch()) {
            $db->rollBack();
            return 'Der Stellplatz ist in diesem Zeitraum bereits reserviert.';
        }

        $values = [$data['place_id'], $data['guest'], $data['contact'], $data['arrival'],
            $data['departure'], $data['people'], $price];
        if ($id) {
            $statement = $db->prepare('UPDATE reservations SET place_id = ?, guest = ?, contact = ?,
                arrival = ?, departure = ?, people = ?, nightly_price = ? WHERE id = ?');
            $values[] = $id;
        } else {
            $statement = $db->prepare('INSERT INTO reservations
                (place_id, guest, contact, arrival, departure, people, nightly_price)
                VALUES (?, ?, ?, ?, ?, ?, ?)');
        }
        $statement->execute($values);
        $db->commit();
        return '';
    }

    public static function cancel($db, $id)
    {
        $statement = $db->prepare('UPDATE reservations SET cancelled = 1 WHERE id = ? AND cancelled = 0');
        $statement->execute([$id]);
        return $statement->rowCount() > 0;
    }

    public static function nights($reservation)
    {
        $arrival = new DateTimeImmutable($reservation['arrival']);
        $departure = new DateTimeImmutable($reservation['departure']);
        return $arrival->diff($departure)->days;
    }
}
