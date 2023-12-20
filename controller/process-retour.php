<?php
// controller/process_retour.php

require_once '../model/database.php';

try {
    // Utiliser la fonction de connexion à la base de données
    $pdo = connectToDatabase();

    // Récupérer les données du formulaire
    $borrowId = isset($_POST['returned_book']) ? htmlspecialchars($_POST['returned_book']) : null;

    // Récupérer le book_id et le title de l'emprunt
    $empruntInfo = getEmpruntInfo($pdo, $borrowId);
    $bookId = $empruntInfo['book_id'];
    $title = $empruntInfo['title'];

    // Mettre à jour le statut du livre dans la table "books" à "disponible"
    $updateBookStatusQuery = "UPDATE books SET status = 'disponible' WHERE id = ?";
    $stmt = $pdo->prepare($updateBookStatusQuery);
    $stmt->execute([$bookId]);

    // Supprimer l'entrée correspondante dans la table "borrows"
    $deleteBorrowQuery = "DELETE FROM borrows WHERE id = ?";
    $stmt = $pdo->prepare($deleteBorrowQuery);
    $stmt->execute([$borrowId]);

    // Rediriger l'utilisateur vers une page de confirmation ou une autre action
    exit();
} catch (PDOException $e) {
    echo "Erreur lors du traitement du retour : " . $e->getMessage() . "\n";
}
?>
