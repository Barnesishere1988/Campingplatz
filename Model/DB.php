<?php

class DB
{
    const HOST = 'localhost';
    const USER = 'lapuebungen';
    const PASSWORD = 'Lap@2027';
    const DATABASE = 'camping';

    public static function connect(): PDO
    {
        $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DATABASE . ';charset=utf8mb4';

        return new PDO($dsn, self::USER, self::PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
}
