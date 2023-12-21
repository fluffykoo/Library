<?php
// Inclure le fichier de base de données
include_once 'model/database.php';

// Utilisez la fonction connectToDatabase à la place
$pdo = connectToDatabase();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprunter/Retourner un livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
        }

        h1 {
            color: #ff8c66;
        }

        .container {
            margin-top: 50px;
        }

        .custom-form {
            background-color: #ffffff;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        label {
            color: #666666;
        }

        input, select {
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #ff8c66;
            border-color: #ff8c66;
            color: #ffffff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #e57e59;
            border-color: #e57e59;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Emprunter un livre</h1>

            <form action="controller/process-emprunt.php" method="post" class="custom-form">
                <label for="book">Sélectionner un livre :</label>
                <select id="book" name="book" required>
                    <?php
                    $availableBooks = fetchAvailableBooks($pdo);
                    foreach ($availableBooks as $book) {
                        echo "<option value='" . $book['id'] . "'>" . $book['title'] . "</option>";
                    }
                    ?>
                </select>
                <br>

                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
                <br>

                <label for="user_id">ID Utilisateur :</label>
                <input type="text" id="user_id" name="user_id" required>
                <br>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <br>

                <input type="submit" value="Emprunter">
            </form>
        </div>

        <div class="col-md-6">
            <h1>Retourner un livre</h1>

            <form action="controller/process-retour.php" method="post" class="custom-form">
                <label for="returned_book">Sélectionner un livre à retourner :</label>
                <select id="returned_book" name="returned_book" required>
                    <?php
                    $borrowedBooks = fetchBorrowedBooks($pdo);
                    foreach ($borrowedBooks as $borrowedBook) {
                        echo "<option value='" . $borrowedBook['id'] . "'>" . $borrowedBook['title'] . "</option>";
                    }
                    ?>
                </select>
                <br>

                <input type="submit" value="Retourner">
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eaFVdiwyHlI0o8aT6XtCkXPEx3M3U5P4b7ckPxP6QFfT5EBVljjdQPO8Lr+3Zkp7" crossorigin="anonymous"></script>
</body>
</html>

