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
    <title>Emprunter un livre</title>
    <!-- Incluez vos feuilles de style et autres éléments de tête -->
</head>
<body>

<h1>Emprunter/Retourner un livre</h1>

<!-- Formulaire pour Emprunter -->
<form action="controller/process-emprunt.php" method="post">
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

<!-- Formulaire pour Retourner -->
<form action="controller/process-retour.php" method="post">
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

</body>
</html>
