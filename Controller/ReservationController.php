<?php

require_once __DIR__ . '/../Model/Reservation.php';
require_once __DIR__ . '/../Requests/ReservationRequest.php';

class ReservationController
{
    public static function getAll($filters)
    {
        return Reservation::all(DB::connect(), $filters);
    }

    public static function getById($id)
    {
        return Reservation::find(DB::connect(), $id);
    }

    public static function save($id, $post)
    {
        [$reservation, $errors] = readReservation($post);
        if (!$errors) {
            $error = Reservation::save(DB::connect(), $id, $reservation);
            if ($error) {
                $errors[] = $error;
            }
        }
        return [$reservation, $errors];
    }

    public static function cancel($id)
    {
        return Reservation::cancel(DB::connect(), $id);
    }
}
