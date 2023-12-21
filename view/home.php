<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> 
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

        #search-form {
            margin-top: 20px;
        }
        /* Add this to your style.css file */
#search-form {
    margin-top: 20px;
    text-align: center;
}

label {
    margin-right: 10px;
    color: #666666;
}

input[type="text"] {
    padding: 8px;
    box-sizing: border-box;
    width: 200px; /* Adjust width as needed */
}

input[type="submit"] {
    background-color: #ff8c66;
    border: 1px solid #ff8c66;
    color: #ffffff;
    padding: 8px 16px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #e57e59;
    border: 1px solid #e57e59;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue dans votre bibliothèque préférée !</h1>
        <p>Détendez-vous et explorez notre collection de livres.</p>

     
        <form action="model/main.php" method="get" id="search-form">
            <label for="title">Rechercher un livre :</label>
            <input type="text" name="title" id="title" required>
            <input type="submit" value="Rechercher">
        </form>

       
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://www.decitre.fr/media/wysiwyg/2023/12-decembre/Laur_at_du_Prix_Goncourt_2023_1224x380.png" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
              <img src="https://www.decitre.fr/media/wysiwyg/2023/12-decembre/La_r_trospective_litt_raire_de_2023_1224x380.png" class="d-block w-100" alt="Image 2">
            </div>
          
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eaFVdiwyHlI0o8aT6XtCkXPEx3M3U5P4b7ckPxP6QFfT5EBVljjdQPO8Lr+3Zkp7" crossorigin="anonymous"></script>
</body>
</html>
