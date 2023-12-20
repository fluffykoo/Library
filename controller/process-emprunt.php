<?php
// controller/process_emprunt.php

require_once('../model/database.php');

try {
    // Utiliser la fonction de connexion à la base de données
    $pdo = connectToDatabase();

    // Récupérer les données du formulaire
    $bookId = isset($_POST['book']) ? htmlspecialchars($_POST['book']) : null;
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : null;
    $userId = isset($_POST['user_id']) ? htmlspecialchars($_POST['user_id']) : null;
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null;

    // Vérifier si $bookId est défini avant de l'utiliser
    if ($bookId) {
        // Récupérer le titre du livre
        $bookTitle = getTitleFromBookId($pdo, $bookId);

        // Ajouter ici la logique pour traiter l'emprunt du livre
        $insertCommandeQuery = "INSERT INTO borrows (book_id, title, user_id, username, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($insertCommandeQuery);
        $stmt->execute([$bookId, $bookTitle, $userId, $username, $password]);

        // Mettre à jour le statut du livre dans la table books
        $updateBookStatusQuery = "UPDATE books SET status = 'indisponible, ce livre est déja emprunté' WHERE id = ?";
        $stmtUpdate = $pdo->prepare($updateBookStatusQuery);
        $stmtUpdate->execute([$bookId]);

        // Rediriger l'utilisateur vers une page de confirmation ou une autre action
        header("Location: ?page=confirmation_emprunt");
        exit();
    } else {
        // Gérer le cas où $bookId n'est pas défini
        echo "Erreur: Le livre n'est pas spécifié.";
    }
} catch (PDOException $e) {
    echo "Erreur lors du traitement de l'emprunt : " . $e->getMessage() . "\n";
}
?>
