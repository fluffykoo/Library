<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Informations de l'Utilisateur</h2>
        <?php
        // Afficher les informations de l'utilisateur
        if (isset($_GET["username"])) {
            $username = htmlspecialchars($_GET["username"]);
            echo "<p>Nom d'utilisateur : $username</p>";
        } else {
            echo "<p>Aucune information d'utilisateur disponible.</p>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eaFVdiwyHlI0o8aT6XtCkXPEx3M3U5P4b7ckPxP6QFfT5EBVljjdQPO8Lr+3Zkp7" crossorigin="anonymous"></script>
</body>
</html>