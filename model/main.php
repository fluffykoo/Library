<?php
require_once 'Book.php';

try {
    // Connexion à la base de données
    $dsn = 'mysql:host=127.0.0.1;dbname=pdoOumou;charset=utf8mb4;port=8889';
    $username = 'root';
    $password = 'root';
    $pdo = new PDO($dsn, $username, $password);

    // Création d'une instance de la classe Book
    $book = new Book($pdo);

    if (isset($_GET['title'])) {
        // Si un titre est fourni dans la recherche
        $searchTitle = $_GET['title'];
        $foundBook = $book->getBookByTitle($searchTitle);

        if ($foundBook) {
            // Affichez les informations sur le livre recherché
            echo 'Titre : ' . $foundBook['title'] . '<br>';
            echo 'Auteur : ' . $foundBook['author'] . '<br>';
            echo 'Type : ' . $foundBook['types'] . '<br>';
            // Ajoutez d'autres propriétés au besoin
        } else {
            echo 'Livre non trouvé.';
        }
    } else {
        // Affichage de tous les livres
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
