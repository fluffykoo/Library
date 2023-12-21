<?php


require_once('../model/database.php');

try {
  
    $pdo = connectToDatabase();

    
    $bookId = isset($_POST['book']) ? htmlspecialchars($_POST['book']) : null;
    $username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : null;
    $userId = isset($_POST['user_id']) ? htmlspecialchars($_POST['user_id']) : null;
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null;


    if ($bookId) {
        
        $bookTitle = getTitleFromBookId($pdo, $bookId);

        
        $insertCommandeQuery = "INSERT INTO borrows (book_id, title, user_id, username, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($insertCommandeQuery);
        $stmt->execute([$bookId, $bookTitle, $userId, $username, $password]);

        $updateBookStatusQuery = "UPDATE books SET status = 'indisponible, ce livre est déja emprunté' WHERE id = ?";
        $stmtUpdate = $pdo->prepare($updateBookStatusQuery);
        $stmtUpdate->execute([$bookId]);

        header("Location: ?page=confirmation_emprunt");
        exit();
    } else {
        
        echo "Erreur: Le livre n'est pas spécifié.";
    }
} catch (PDOException $e) {
    echo "Erreur lors du traitement de l'emprunt : " . $e->getMessage() . "\n";
}
?>
