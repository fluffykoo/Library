<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $username = $_POST['username'];
    $password = $_POST['password'];


    $connexionReussie = true; 

    if ($connexionReussie) {
        
        $username = htmlspecialchars($username);
        header("Location: ../view/user-info.php?username=$username");
        exit();
    } else {
        
        echo "La connexion a échoué. Veuillez réessayer.";
    }
}
?>
