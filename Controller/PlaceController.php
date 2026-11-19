<?php

require_once __DIR__ . '/../Model/Place.php';
require_once __DIR__ . '/../Requests/PlaceRequest.php';

class PlaceController
{
    public static function getAll($includeRemoved = false)
    {
        return Place::all(DB::connect(), $includeRemoved);
    }

    public static function getById($id)
    {
        return Place::find(DB::connect(), $id);
    }

    public static function save($id, $post)
    {
        [$place, $errors] = readPlace($post);
        if (!$errors) {
            $error = Place::save(DB::connect(), $id, $place);
            if ($error) {
                $errors[] = $error;
            }
        }
        return [$place, $errors];
    }

    public static function remove($id)
    {
        return Place::remove(DB::connect(), $id);
    }
}
