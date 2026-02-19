<?php
class Database {
    public static function connect() {
        return new PDO(
            "mysql:host=sql304.infinityfree.com;dbname=if0_41120839_webcl;charset=utf8mb4",
            "if0_41120839",
            "v6OWzaMSbz",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }
}
