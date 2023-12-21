<?php


try {
   
    $dsn = 'mysql:host=51.158.59.186;dbname=oc;charset=utf8mb4;port=14301';
    $username = 'phppex';
    $password = 'Supermotdepasse!42';

    $pdo = new PDO($dsn, $username, $password);


    $newUsername = isset($_POST['newUsername']) ? htmlspecialchars($_POST['newUsername']) : null;
    $newPassword = isset($_POST['newPassword']) ? htmlspecialchars($_POST['newPassword']) : null;

   
    $insertQuery = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->execute([$newUsername, $newPassword]);

    echo "Nouvel utilisateur ajouté dans la base de données.\n";
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage() . "\n";
}
?>

