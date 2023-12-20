<!-- view/login.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        <!-- Formulaire d'inscription -->
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
