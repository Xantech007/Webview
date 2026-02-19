<?php
class Database {
    public static function connect() {
        return new PDO(
            "mysql:host=localhost;dbname=YOUR_DB;charset=utf8mb4",
            "DB_USER",
            "DB_PASS",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }
}
