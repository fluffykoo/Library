<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: /index.php?page=login");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez l'ID du livre à emprunter depuis le formulaire
    $bookId = $_POST['book_id'];

    // Connexion à la base de données
    $pdo = connectToDatabase();

    // Mettez à jour le statut du livre dans la base de données
    $updateQuery = "UPDATE books SET status = 'emprunté' WHERE id = :book_id";
    $stmt = $pdo->prepare($updateQuery);
    $stmt->bindParam(':book_id', $bookId, PDO::PARAM_INT);
    $stmt->execute();

    // Enregistrez les détails de l'emprunt dans une autre table si nécessaire

    // Redirigez l'utilisateur vers la page du catalogue
    header("Location: catalogue.php");
    exit();
}
?>
