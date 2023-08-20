<?php

    include_once '../../include.php';

    $resActivities = $DB->prepare('SELECT * FROM activities ORDER BY nomActivity ASC');
    $resActivities->execute();
    $resActivities = $resActivities->fetchAll();

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
    <link rel="stylesheet" href="../../style/searchInput.css">
    <link rel="stylesheet" href="../../style/selectStyle.css">
    <link rel="stylesheet" href="../../style/sidebarStyle.css">
    <link rel="stylesheet" href="../../style/cardStyle.css">

    <title>TheWikiCrew | Activités</title>
</head>

<body>
    <div class="container">
        <?php include_once '../views/sidebar.php' ?>

        <main>
            <div class="content">
                <div class="title">Liste des activités</div>

                <p class="desc big">Liste de toutes les activités présentes en jeu.</p>


                <form id="formulaire" action="" class="search_form">
                    <div class="search">
                        <i class="uil uil-search"></i>
                        <input spellcheck="false" type="text" placeholder="Rechercher une activité">
                    </div>
                </form>


                <form action="">
                    <div class="wrapper">
                        <div class="select-btn">
                            <span>Sélectionner une catégorie</span>
                            <i class="uil uil-angle-down"></i>
                        </div>
                        <div class="content">
                            <div class="search">
                                <i class="uil uil-search"></i>
                                <input type="text" placeholder="Rechercher une catégorie">
                            </div>
                            <ul id="paysSelect" class="options"></ul>
                        </div>
                    </div>
                </form>

                <ul class="list-card" id="cards">
                    <?php 
                        //---- [ Importation des cartes ] ----//
                        include_once '../views/card.php';

                        foreach ($resActivities as $activity) {

                            $link = "activity?id_activity=" . $activity['idActivity'];
                            $img = "../../img/brands/" . $activity['nomActivity'] . "/logo/" . $activity['imgActivity'];
                            $imgFlag = "../../img/flags/" . $activity['imgActivity'];
                            $nomActivity = $activity['nomActivity'];
                        
                            ActivityCard($link, $img, $imgFlag, $nomActivity);
                        }
                        
                    ?>
                </ul>
            </div>
        </main>
    </div>

    <script>
        //-- Pour la compatibilité KeyPass et éviter le enter du submit si l'utilisateur n'as pas rempli les 3 champs ----------------
        const desacForm = document.getElementById('formulaire');

        desacForm.addEventListener('keydown', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
            }
        });
    </script>

    <script src="../../javascript/overCardEffect.js"></script>
    <script src="../../javascript/searchCategorySelect.js"></script>
    <script src="../../javascript/searchCategory.js"></script>

</body>

</html>