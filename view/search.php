<!-- search.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de livres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h1>Recherche de livres</h1>
    <form action="model/main.php" method="get">
        <label for="title">Entrez le titre du livre à rechercher :</label>
        <input type="text" name="title" id="title" required>
        <input type="submit" value="Rechercher">
    </form>
    <!-- Ajoutez ce code à l'endroit où vous voulez afficher le modal dans votre fichier HTML -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- En-tête du modal -->
            <div class="modal-header">
                <h4 class="modal-title">Détails du livre</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Contenu du modal -->
            <div class="modal-body">
                <?php if ($foundBook) : ?>
                    <p>Titre : <?= $foundBook['title'] ?></p>
                    <p>Auteur : <?= $foundBook['author'] ?></p>
                    <p>Type : <?= $foundBook['types'] ?></p>
                    <!-- Ajoutez d'autres propriétés au besoin -->
                <?php else : ?>
                    <p>Livre non trouvé.</p>
                <?php endif; ?>
            </div>

            <!-- Pied du modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>

        </div>
    </div>
</div>

<script>
    // Vérifiez si le livre a été trouvé et affichez le modal en conséquence
    <?php if ($foundBook) : ?>
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('myModal'));
            myModal.show();
        });
    <?php endif; ?>
</script>

</body>
</html>
