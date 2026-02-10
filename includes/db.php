<?php
// includes/db.php

require_once __DIR__ . '/../config.php';

try {
    $pdo = new PDO(
        "mysql:host=" . sql304.infinityfree.com . ";dbname=" . if0_41120839_webcl . ";charset=utf8mb4",
        if0_41120839,
        v6OWzaMSbz,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
