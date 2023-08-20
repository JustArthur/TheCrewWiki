<?php
    include_once '../../include.php';

    if($_SESSION['utilisateur'][3] != 3) {
        header('Location: ../../index');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="style/panel.css">

    <title>Document</title>
</head>

<body>
    <main>
        <h1>The Crew 2 - Ajouter des données</h1>
        <ul class="list">
            <a href="pages/add_brand" class="list-item box">
                <div class="textes">
                    <h3 class="info">The Crew 2 - Les marques</h3>
                    <h3 class="title">Ajouter des marques dans la base de données</h3>
                </div>

                <span class="material-symbols-rounded icon">arrow_forward</span>
            </a>

            <a href="pages/add_car" class="list-item box">
                <div class="textes">
                    <h3 class="info">The Crew 2 - Les véhicules</h3>
                    <h3 class="title">Ajouter des véhicules dans la base de données</h3>
                </div>

                <span class="material-symbols-rounded icon">arrow_forward</span>
            </a>

            <a href="pages/add_activity" class="list-item box">
                <div class="textes">
                    <h3 class="info">The Crew 2 - Les activités</h3>
                    <h3 class="title">Ajouter des activités dans la base de données</h3>
                </div>

                <span class="material-symbols-rounded icon">arrow_forward</span>
            </a>
        </ul>
    </main>
</body>

</html>