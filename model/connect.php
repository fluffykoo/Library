
<?php
function connectToDatabase() {
    $dsn = 'mysql:host=127.0.0.1;dbname=pdoOumou;charset=utf8mb4;port=8889';
    $username = 'root';
    $password = 'root';

    try {
        $pdo = new PDO($dsn, $username, $password);
        return $pdo;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage() . "\n");
    }
}