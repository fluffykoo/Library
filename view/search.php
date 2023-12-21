<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de livres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
        }

        .container {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ff8c66;
        }

        form {
            margin-top: 20px;
            background-color: #ffffff;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 80%; /* Adjust the width as needed */
            margin: 0 auto;
        }

        label {
            color: #666666;
        }

        input[type="text"] {
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
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #e57e59;
            border-color: #e57e59;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue dans votre bibliothèque préférée !</h1>
        <p>Détendez-vous et explorez notre collection de livres.</p>

        <form action="model/main.php" method="get">
            <label for="title">Rechercher un livre :</label>
            <input type="text" name="title" id="title" required>
            <input type="submit" value="Rechercher">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eaFVdiwyHlI0o8aT6XtCkXPEx3M3U5P4b7ckPxP6QFfT5EBVljjdQPO8Lr+3Zkp7" crossorigin="anonymous"></script>
</body>
</html>

