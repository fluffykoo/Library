<?php
// controller/process-login.php

// Traitement de la connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Effectuez le traitement de connexion ici
    // ...

    // Exemple de logique de connexion réussie (à remplacer par votre propre logique)
    $connexionReussie = true; // À remplacer par votre propre logique de connexion

    // Si la connexion réussit, redirigez vers user-info.php avec le nom d'utilisateur
    if ($connexionReussie) {
        // Assurez-vous de valider/sécuriser les données avant de les utiliser dans l'URL
        $username = htmlspecialchars($username);
        header("Location: ../view/user-info.php?username=$username");
        exit();
    } else {
        // Gérez le cas où la connexion échoue (par exemple, afficher un message d'erreur)
        echo "La connexion a échoué. Veuillez réessayer.";
    }
}
?>
