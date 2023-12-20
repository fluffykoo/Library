<?php

require_once 'database.php';

class Book
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllBooks()
    {
        $query = "SELECT * FROM books";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBookByTitle($title)
    {
        $query = "SELECT * FROM books WHERE title = :title";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getBooksByType($types)
    {
        $query = "SELECT * FROM books WHERE types = :types";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':types', $types, PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchAndDisplayBooks()
    {
        try {
            // Connexion à la base de données
            $pdo = connectToDatabase();

            // Création d'une instance de la classe Book
            $book = new Book($pdo);

            if (isset($_GET['title'])) {
                // Si un titre est fourni dans la recherche
                $searchTitle = $_GET['title'];
                $foundBook = $this->getBookByTitle($searchTitle);

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
                $books = $this->getAllBooks();

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
    }
}

?>
