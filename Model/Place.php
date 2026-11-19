<?php

class Place
{
    public static function all($db, $includeRemoved = false)
    {
        $sql = 'SELECT * FROM places';
        if (!$includeRemoved) {
            $sql .= ' WHERE removed = 0';
        }
        return $db->query($sql . ' ORDER BY number')->fetchAll();
    }

    public static function find($db, $id, $lock = false)
    {
        $sql = 'SELECT * FROM places WHERE id = ? AND removed = 0';
        if ($lock) {
            $sql .= ' FOR UPDATE';
        }
        $statement = $db->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }

    public static function save($db, $id, $data)
    {
        $values = [$data['number'], $data['description'], $data['type'], $data['capacity'], $data['price']];
        if ($id) {
            $db->beginTransaction();
            if (!self::find($db, $id, true)) {
                $db->rollBack();
                return 'Der Stellplatz wurde nicht gefunden.';
            }

            $statement = $db->prepare('SELECT id FROM reservations
                WHERE place_id = ? AND cancelled = 0 AND departure > ? AND people > ? LIMIT 1');
            $statement->execute([$id, date('Y-m-d'), $data['capacity']]);
            if ($statement->fetch()) {
                $db->rollBack();
                return 'Die Personenanzahl ist für eine bestehende Reservierung zu niedrig.';
            }

            $sql = 'UPDATE places SET number = ?, description = ?, type = ?, capacity = ?, price = ? WHERE id = ?';
            $values[] = $id;
        } else {
            $sql = 'INSERT INTO places (number, description, type, capacity, price) VALUES (?, ?, ?, ?, ?)';
        }

        try {
            $statement = $db->prepare($sql);
            $statement->execute($values);
        } catch (PDOException $error) {
            if (($error->errorInfo[1] ?? 0) != 1062) {
                throw $error;
            }
            if ($id) {
                $db->rollBack();
            }
            return 'Diese Stellplatznummer ist bereits vergeben.';
        }

        if ($id) {
            $db->commit();
        }
        return '';
    }

    public static function remove($db, $id)
    {
        $db->beginTransaction();
        if (!self::find($db, $id, true)) {
            $db->rollBack();
            return 'Der Stellplatz wurde nicht gefunden.';
        }

        $statement = $db->prepare('SELECT id FROM reservations
            WHERE place_id = ? AND cancelled = 0 AND departure > ? LIMIT 1');
        $statement->execute([$id, date('Y-m-d')]);
        if ($statement->fetch()) {
            $db->rollBack();
            return 'Für den Stellplatz gibt es noch laufende oder bevorstehende Reservierungen.';
        }

        $statement = $db->prepare('UPDATE places SET removed = 1 WHERE id = ?');
        $statement->execute([$id]);
        $db->commit();
        return '';
    }
}
