<?php

include_once '../../include.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="../../style/mainStyle.css">

    <link rel="stylesheet" href="../../style/sidebarStyle.css">

    <title>TheWikiCrew | Activités</title>
</head>

<body>
    <div class="container">
        <?php include_once '../views/sidebar.php' ?>

        <main>
            <div class="content">
                <div class="title">Liste des activités</div>

                <p class="desc big">Liste de toutes les activités présenteq en jeu.</p>

                <form id="formulaire" action="" class="search_form">
                    <div class="search">
                        <i class="uil uil-search"></i>
                        <input spellcheck="false" type="text" placeholder="Rechercher une activité">
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>

</html>