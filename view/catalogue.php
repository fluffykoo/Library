<?php
require_once 'model/Book.php';
require_once 'model/database.php';
include 'search.php';

$pdo = connectToDatabase();

$book = new Book($pdo);

$bookType = isset($_GET['types']) ? $_GET['types'] : null;

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
    <style>
        body {
            background-color: #f5f5f5; /* Couleur de fond neutre */
            font-family: 'Arial', sans-serif; /* Police de caractères élégante */
        }

        .container {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff; /* Fond de la boîte blanche */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Légère ombre */
        }

        h1 {
            color: #ff8c66; /* Couleur de titre chaleureuse */
        }

        p {
            color: #666666; /* Couleur de texte grise */
        }

        .card {
            background-color: #ffffff; /* Fond de la carte */
            border: 1px solid #e1e1e1; /* Bordure légère */
            border-radius: 8px; /* Coins arrondis de la carte */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Légère ombre de la carte */
            margin-bottom: 20px;
            height: 100%; /* Ajustez la hauteur selon vos besoins */
        }

        .card-img-top {
            border-top-left-radius: 8px; /* Coins arrondis en haut à gauche de l'image */
            border-top-right-radius: 8px; /* Coins arrondis en haut à droite de l'image */
            height: 200px; /* Ajustez la hauteur selon vos besoins */
            object-fit: cover; /* Assure que l'image couvre complètement le conteneur */
        }

        .btn-primary,.btn-emprunter {
            background-color: #ff8c66; /* Couleur de fond du bouton Résumé */
            border-color: #ff8c66; /* Couleur de bordure du bouton Résumé */
        }

        .btn-primary:hover, .btn-emprunter:hover {
            background-color: #e57e59; /* Couleur de fond du bouton Résumé au survol */
            border-color: #e57e59; /* Couleur de bordure du bouton Résumé au survol */
        }

        .alert-warning {
            background-color: #ffe6cc; /* Couleur de fond de l'alerte Aucun livre trouvé */
            border-color: #ffd699; /* Couleur de bordure de l'alerte Aucun livre trouvé */
            color: #cc9900; /* Couleur du texte de l'alerte Aucun livre trouvé */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Catalogue des Livres</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            if ($books) {
                foreach ($books as $b) {
                    echo '<div class="col">';
                    echo '  <div class="card h-100">';
                    
                    $id = isset($b['id']) ? $b['id'] : 'ID non disponible';
                
                    echo '    <img src="' . $b['image_url'] . '" class="card-img-top" alt="Book Cover">';
                    echo '    <div class="card-body">';
                    echo '      <h5 class="card-title">' . $b['title'] . '</h5>';
                    echo '      <p class="card-text">Author: ' . $b['author'] . '</p>';
                    echo '      <p class="card-text">Type: ' . $b['types'] . '</p>';
                    echo '      <p class="card-text">Status: ' . $b['status'] . '</p>';
                    echo '      <a href="#" class="btn btn-primary">Résumé</a>';
                    echo '     <a href="?page=emprunter" class="btn btn-emprunter">Emprunter</a>';

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Catalogue des Livres</title>
    <style>
        body {
            background-color: #f5f5f5; /* Couleur de fond neutre */
            font-family: 'Arial', sans-serif; /* Police de caractères élégante */
        }

        .container {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff; /* Fond de la boîte blanche */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Légère ombre */
        }

        h1 {
            color: #ff8c66; /* Couleur de titre chaleureuse */
        }

        p {
            color: #666666; /* Couleur de texte grise */
        }

        .card {
            background-color: #ffffff; /* Fond de la carte */
            border: 1px solid #e1e1e1; /* Bordure légère */
            border-radius: 8px; /* Coins arrondis de la carte */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Légère ombre de la carte */
            margin-bottom: 20px;
            height: 100%; /* Ajustez la hauteur selon vos besoins */
        }

        .card-img-top {
            border-top-left-radius: 8px; /* Coins arrondis en haut à gauche de l'image */
            border-top-right-radius: 8px; /* Coins arrondis en haut à droite de l'image */
            height: 200px; /* Ajustez la hauteur selon vos besoins */
            object-fit: cover; /* Assure que l'image couvre complètement le conteneur */
        }

        .btn-emprunter {
            background-color: #ff725e; /* Coral color */
            border-color: #ff725e; /* Coral color */
        }

        .btn-emprunter:hover {
            background-color: #e85a4f; /* Darker coral color on hover */
            border-color: #e85a4f; /* Darker coral color on hover */
        }

        .alert-warning {
            background-color: #ffe6cc; /* Couleur de fond de l'alerte Aucun livre trouvé */
            border-color: #ffd699; /* Couleur de bordure de l'alerte Aucun livre trouvé */
            color: #cc9900; /* Couleur du texte de l'alerte Aucun livre trouvé */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Catalogue des Livres</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            foreach ($books as $b) {
                echo '<div class="col">';
                echo '  <div class="card h-100">';
                
                $id = isset($b['id']) ? $b['id'] : 'ID non disponible';
                
                    echo '    <img src="' . $b['image_url'] . '" class="card-img-top" alt="Book Cover">';
                    echo '    <div class="card-body">';
                    echo '      <h5 class="card-title">' . $b['title'] . '</h5>';
                    echo '      <p class="card-text">Author: ' . $b['author'] . '</p>';
                    echo '      <p class="card-text">Type: ' . $b['types'] . '</p>';
                    echo '      <p class="card-text">Status: ' . $b['status'] . '</p>';
                echo '      <a href="#" class="btn btn-emprunter">Emprunter</a>';
                echo '    </div>';
                echo '  </div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eaFVdiwyHlI0o8aT6XtCkXPEx3M3U5P4b7ckPxP6QFfT5EBVljjdQPO8Lr+3Zkp7" crossorigin="anonymous"></script>
</body>
</html>
