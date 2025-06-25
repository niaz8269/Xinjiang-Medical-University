<?php
// Database configuration with fallback values
$dbConfig = [
    'DB_HOST' => 'localhost',
    'DB_USER' => 'root',
    'DB_PASS' => '',
    'DB_NAME' => 'xjmu'
];

// Try to load from config file if exists
$configFile = __DIR__ . '/config.ini';
if (file_exists($configFile)) {
    $fileConfig = parse_ini_file($configFile);
    if ($fileConfig !== false) {
        $dbConfig = array_merge($dbConfig, $fileConfig);
    }
}

// Create connection
$conn = new mysqli(
    $dbConfig['DB_HOST'],
    $dbConfig['DB_USER'],
    $dbConfig['DB_PASS'],
    $dbConfig['DB_NAME']
);

// Check connection
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("System maintenance in progress. Please try again later.");
}

// Set charset
$conn->set_charset("utf8mb4");