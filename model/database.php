
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
function getBookDetails($title) {
    $pdo = connectToDatabase();
    $query = "SELECT * FROM books WHERE title = :title";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function fetchAvailableBooks($pdo)
{
    $sql = "SELECT * FROM books WHERE status = 'disponible'";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function fetchBorrowedBooks($pdo)
{
    $sql = "SELECT borrows.id, books.title FROM borrows JOIN books ON borrows.book_id = books.id";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getEmpruntInfo($pdo, $borrowId) {
    $query = "SELECT * FROM borrows WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$borrowId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getTitleFromBookId($pdo, $bookId) {
    $query = "SELECT title FROM books WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$bookId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $result['title'];
}


?>
