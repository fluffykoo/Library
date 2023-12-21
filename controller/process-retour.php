<?php


require_once '../model/database.php';

try {
   
    $pdo = connectToDatabase();

    
    $borrowId = isset($_POST['returned_book']) ? htmlspecialchars($_POST['returned_book']) : null;

   
    $empruntInfo = getEmpruntInfo($pdo, $borrowId);
    $bookId = $empruntInfo['book_id'];
    $title = $empruntInfo['title'];

    
    $updateBookStatusQuery = "UPDATE books SET status = 'disponible' WHERE id = ?";
    $stmt = $pdo->prepare($updateBookStatusQuery);
    $stmt->execute([$bookId]);

    $deleteBorrowQuery = "DELETE FROM borrows WHERE id = ?";
    $stmt = $pdo->prepare($deleteBorrowQuery);
    $stmt->execute([$borrowId]);

    
    exit();
} catch (PDOException $e) {
    echo "Erreur lors du traitement du retour : " . $e->getMessage() . "\n";
}
?>
