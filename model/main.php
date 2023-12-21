<?php
require_once 'Book.php';

try {
    
    $dsn = 'mysql:host=51.158.59.186;dbname=oc;charset=utf8mb4;port=14301';
    $username = 'phppex';
    $password = 'Supermotdepasse!42';

    $pdo = new PDO($dsn, $username, $password);

    
    $book = new Book($pdo);

    if (isset($_GET['title'])) {
       
        $searchTitle = $_GET['title'];
        $foundBook = $book->getBookByTitle($searchTitle);

        if ($foundBook) {
           
            echo 'Titre : ' . $foundBook['title'] . '<br>';
            echo 'Auteur : ' . $foundBook['author'] . '<br>';
            echo 'Type : ' . $foundBook['types'] . '<br>';
            
        } else {
            echo 'Livre non trouvé.';
        }
    } else {
        
        $books = $book->getAllBooks();

        if ($books) {
            foreach ($books as $b) {
                echo 'Title: ' . $b['title'] . '<br>';
                echo 'Author: ' . $b['author'] . '<br>';
                echo 'Type: ' . $b['types'] . '<br>';
                echo '<hr>';
            }
        } else {
            echo 'Aucun livre trouvé.';
        }
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage() . "\n");
}
?>
