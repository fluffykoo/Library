<!-- view/catalogue.php -->

<?php
require_once 'model/Book.php';
require_once 'model/database.php';
include 'search.php';


// Connexion à la base de données
$pdo = connectToDatabase();

// Création d'une instance de la classe Book
$book = new Book($pdo);

// Vérifiez s'il y a un type spécifié dans l'URL
$bookType = isset($_GET['types']) ? $_GET['types'] : null;

// Obtenez les livres en fonction du type spécifié ou de tous les livres
$books = $bookType ? $book->getBooksByType($bookType) : $book->getAllBooks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Catalogue des Livres</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Catalogue des Livres</h1>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            if ($books) {
                foreach ($books as $b) {
                    echo '<div class="col">';
                    echo '  <div class="card h-100">';
                    
                    // Assurez-vous que la clé 'id' existe avant de l'utiliser
                    $id = isset($b['id']) ? $b['id'] : 'ID non disponible';
                
                    echo '    <img src="' . $b['image_url'] . '" class="card-img-top" alt="Book Cover">';
                    echo '    <div class="card-body">';
                    echo '      <h5 class="card-title">' . $b['title'] . '</h5>';
                    echo '      <p class="card-text">Author: ' . $b['author'] . '</p>';
                    echo '      <p class="card-text">Type: ' . $b['types'] . '</p>';
                    echo '      <p class="card-text">Status: ' . $b['status'] . '</p>';
                    echo '      <a href="#" class="btn btn-primary">Résumé</a>';

                    echo "<a href='?page=emprunter'>Emprunter</a>";
                    
                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="alert alert-warning">Aucun livre trouvé.</p>';
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eaFVdiwyHlI0o8aT6XtCkXPEx3M3U5P4b7ckPxP6QFfT5EBVljjdQPO8Lr+3Zkp7" crossorigin="anonymous"></script>
</body>
</html>


