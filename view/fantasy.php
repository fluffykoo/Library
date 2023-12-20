<!-- view/roman.php -->
<?php
/*
<h1>Livres de type "Roman"</h1>

if (isset($romanBooks) && $romanBooks) {
    foreach ($romanBooks as $b) {
        echo 'Titre : ' . $b['title'] . '<br>';
        echo 'Auteur : ' . $b['author'] . '<br>';
        echo 'Type : ' . $b['types'] . '<br>';
        // Ajoutez d'autres propriétés au besoin
        echo '<hr>';
    }
} else {
    echo 'Aucun livre trouvé.';
}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Page Fantasy</title>
    <style>
    
    </style>
</head>
<body>

<?php


include 'search.php'; 

function afficherLivresFantasyFromDatabase()
{

    $pdo = connectToDatabase();

  
    $sql = "SELECT * FROM books WHERE types = 'Fantasy'";
    
    try {
        $stmt = $pdo->query($sql);

        $livresFantasy = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($livresFantasy) {
            echo '<div class="container">';
            echo '  <h1 class="mt-5 mb-4">Livres de type "Fantasy"</h1>';
            echo '  <div class="row row-cols-1 row-cols-md-4 g-4">';
            foreach ($livresFantasy as $livre) {
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
            echo 'Aucun livre de type "Fantasy" trouvé.';
        }
    } catch (PDOException $e) {
        die("Erreur lors de l'exécution de la requête : " . $e->getMessage());
    }
}

// Appel de la fonction pour afficher les livres de type "Fantasy" depuis la base de données
afficherLivresFantasyFromDatabase();


