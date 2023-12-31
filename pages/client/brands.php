<?php

include_once '../../include.php';

$resBrands = $DB->prepare('SELECT * FROM brands INNER JOIN country ON country.idCountry = brands.idCountry ORDER BY brands.nomBrand ASC');
$resBrands->execute();
$resBrands = $resBrands->fetchAll();

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
    <link rel="stylesheet" href="../../style/cardStyle.css">

    <link rel="stylesheet" href="../../style/sidebarStyle.css">

    <title>TheWikiCrew | Marques</title>
</head>

<body>
    <?php include_once '../views/sidebar.php' ?>

    <main>
        <div class="content">
            <div class="title">Liste des marques</div>

            <p class="desc big">Liste de toutes les marques présentes en jeu.</p>

            <form id="formulaire" action="" class="search_form">
                <div class="search">
                    <i class="uil uil-search"></i>
                    <input spellcheck="false" type="text" placeholder="Rechercher une marque">
                </div>
            </form>

            <form action="">
                <div class="wrapper">
                    <div class="select-btn">
                        <span>Sélectionner un pays</span>
                        <i class="uil uil-angle-down"></i>
                    </div>
                    <div class="content">
                        <div class="search">
                            <i class="uil uil-search"></i>
                            <input type="text" placeholder="Rechercher un pays">
                        </div>
                        <ul id="paysSelect" class="options"></ul>
                    </div>
                </div>
            </form>


            <ul class="list-card" id="cards">
                <?php
                //---- [ Importation des cartes ] ----//
                include_once '../views/card.php';

                foreach ($resBrands as $brand) {

                    $link = "cars?id_brand=" . $brand['idBrand'];
                    $img = "../../img/brands/" . $brand['nomBrand'] . "/logo/" . $brand['imgBrand'];
                    $imgFlag = "../../img/flags/" . $brand['flagCountry'];
                    $nomBrand = $brand['nomBrand'];
                    if ($brand['anneeBrand'] != 0) {
                        $date = $brand['anneeBrand'];
                    } else {
                        $date = '?';
                    }

                    brandCard($link, $img, $imgFlag, $nomBrand, $date);
                }

                ?>
            </ul>
        </div>
    </main>

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
    <script src="../../javascript/searchCountrySelect.js"></script>
    <script src="../../javascript/searchBrands.js"></script>
</body>

</html>