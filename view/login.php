<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f5f5; /* Couleur de fond neutre */
            font-family: 'Arial', sans-serif; /* Police de caractères élégante */
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #ff8c66; /* Couleur de titre chaleureuse */
        }

        form {
            background-color: #ffffff; /* Fond du formulaire */
            border: 1px solid #e1e1e1; /* Bordure légère du formulaire */
            border-radius: 8px; /* Coins arrondis du formulaire */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Légère ombre du formulaire */
            padding: 20px;
            margin-bottom: 20px;
        }

        label {
            color: #666666; /* Couleur de texte grise pour les étiquettes */
        }

        .btn-primary {
            background-color: #ff8c66; /* Couleur de fond du bouton */
            border-color: #ff8c66; /* Couleur de bordure du bouton */
            color: #ffffff; /* Couleur du texte pour le bouton */
            cursor: pointer; /* Curseur pointer pour indiquer la possibilité de clic */
        }

        .btn-primary:hover {
            background-color: #e57e59; /* Couleur de fond du bouton au survol */
            border-color: #e57e59; /* Couleur de bordure du bouton au survol */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Connexion</h2>
                <form action="../controller/process-login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur :</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe :</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Inscription</h2>
                <form action="../controller/process-registration.php" method="post">
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">Nouveau nom d'utilisateur :</label>
                        <input type="text" class="form-control" id="newUsername" name="newUsername" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Nouveau mot de passe :</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eaFVdiwyHlI0o8aT6XtCkXPEx3M3U5P4b7ckPxP6QFfT5EBVljjdQPO8Lr+3Zkp7" crossorigin="anonymous"></script>
</body>
</html>
