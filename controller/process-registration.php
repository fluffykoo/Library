<?php
// controller/process-registration.php

try {
    // Connexion à la base de données
    $dsn = 'mysql:host=127.0.0.1;dbname=pdoOumou;charset=utf8mb4;port=8889';
    $username = 'root';
    $password = 'root';
    $pdo = new PDO($dsn, $username, $password);

    // Récupérez les données du formulaire
    $newUsername = isset($_POST['newUsername']) ? htmlspecialchars($_POST['newUsername']) : null;
    $newPassword = isset($_POST['newPassword']) ? htmlspecialchars($_POST['newPassword']) : null;

    // Utilisation de la requête préparée pour l'opération CREATE
    $insertQuery = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->execute([$newUsername, $newPassword]);

    echo "Nouvel utilisateur ajouté dans la base de données.\n";
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage() . "\n";
}
?>

