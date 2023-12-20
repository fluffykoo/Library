<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Page Romance</title>
    <style>
        /* Ajoutez ici vos styles spécifiques si nécessaire */
    </style>
</head>
<body>

<?php

include 'search.php';


function afficherLivresRomanceFromDatabase()
{
 
    $pdo = connectToDatabase();

    $sql = "SELECT * FROM books WHERE types = 'Romance'";
    
    try {
        $stmt = $pdo->query($sql);

        $livresRomance = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($livresRomance) {
            echo '<div class="container">';
            echo '  <h1 class="mt-5 mb-4">Livres de type "Romance"</h1>';
            echo '  <div class="row row-cols-1 row-cols-md-4 g-4">';
            foreach ($livresRomance as $livre) {
                echo '    <div class="col">';
                echo '      <div class="card h-100">';
                echo '        <img src="' . $livre['image_url'] . '" class="card-img-top" alt="Book Cover">';
                echo '        <div class="card-body">';
                echo '          <h5 class="card-title">' . $livre['title'] . '</h5>';
                echo '          <p class="card-text">Author: ' . $livre['author'] . '</p>';
                echo '          <p class="card-text">Type: ' . $livre['types'] . '</p>';
                echo '          <p class="card-text">Status: ' . $livre['status'] . '</p>';
                echo '        </div>';
                echo '      </div>';
                echo '    </div>';
            }
            echo '  </div>';
            echo '</div>';
        } else {
            echo 'Aucun livre de type "Romance" trouvé.';
        }
    } catch (PDOException $e) {
        die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
    }
}

// Appel de la fonction pour afficher les livres de type "Romance" depuis la base de données
afficherLivresRomanceFromDatabase();
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eaFVdiwyHlI0o8aT6XtCkXPEx3M3U5P4b7ckPxP6QFfT5EBVljjdQPO8Lr+3Zkp7" crossorigin="anonymous"></script>
</body>
</html>
