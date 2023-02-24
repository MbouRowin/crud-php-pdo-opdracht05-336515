<?php

// https://stackoverflow.com/questions/30074492/what-is-the-difference-between-utf8mb4-and-utf8-charsets-in-mysql
$dsn = 'mysql:host=localhost;dbname=basicfit;charset=utf8mb4';

$options = [
    // Default is FETCH_BOTH (both indexed and associative array)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, 'root', '', $options);
