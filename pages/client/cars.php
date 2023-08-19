<?php

    include_once '../../include.php';

    //---- [ Importation des cartes ] ----//
    include_once '../views/card.php';

    $selectAllCarsFromBrand = $DB->prepare("SELECT * FROM cars INNER JOIN brands ON cars.idBrand = brands.idBrand WHERE cars.idBrand = ? ORDER BY nomCar ASC");
    $selectAllCarsFromBrand->execute([$_GET['id_brand']]);
    $selectAllCarsFromBrand = $selectAllCarsFromBrand->fetchAll();

    $resBrands = $DB->prepare('SELECT * FROM brands INNER JOIN country ON country.idCountry = brands.idCountry WHERE idBrand = ?');
    $resBrands->execute([$_GET['id_brand']]);
    $resBrands = $resBrands->fetch();

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
    <link rel="stylesheet" href="../../style/cardStyle.css">

    <link rel="stylesheet" href="../../style/sidebarStyle.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php include_once '../views/sidebar.php' ?>

        <main>
            <div class="content">
                <div class="title">Liste des véhicules de la marque <?= $resBrands['nomBrand'] ?></div>

                <p class="desc big">Liste de tout les véhicules.</p>

                <form id="formulaire" action="" class="search_form">
                    <div class="search">
                        <i class="uil uil-search"></i>
                        <input spellcheck="false" type="text" id="<?= $_GET['id_brand'] ?>" placeholder="Rechercher un modèle">
                    </div>
                </form>

                <ul class="list-card cars" id="cards">
                    <?php
                        foreach ($selectAllCarsFromBrand as $car) {

                            $summit = $car['summitReward'] == 1 ? 'summit' : '';
                            $text_summit = $summit ? "<h4>Voiture d'un Summit</h4>" : "<h4 style='display: none'></h4>";

                            $battlepass = $car['battlepassReward'] == 1 ? 'battlePass' : '';
                            $text_battlepass = $battlepass ? "<h4>Voiture d'un Motorpass</h4>" : "<h4 style='display: none'></h4>";

                            $icon = $car['iconReward'] != 0 ? "icon" : '';
                            $text_icon = $icon ? "<h4>Voiture de l'icone {$car['iconReward']}</h4>" : "<h4 style='display: none'></h4>";

                            $buckPrice = $car['buckPrice'] != 0 ? number_format($car['buckPrice'], 0, ',', ' ') : '';
                            $crewCreditPrice = $car['crewCreditPrice'] != 0 ? number_format($car['crewCreditPrice'], 0, ',', ' ') : '';

                            $text_price = '';

                            if ($buckPrice != '' && $crewCreditPrice != '') {
                                $text_price = "<h4>{$buckPrice} | {$crewCreditPrice}</h4>";
                            } else {
                                $text_price = "<h4 style='display: none'></h4>";
                            }

                            $link = "pages/car_info?id_car=" . $car['idCar'];
                            $img = "../../img/brands/" . $car['nomBrand'] . "/cars/" . $car['imgCar'];
                            $imgFlag = "../../img/flags/" . $resBrands['flagCountry'];
                            $title = $car['nomCar'];
                            if ($car['anneeBrand'] != 0) { $date = $car['anneeBrand']; } else { $date = '?'; }

                            carCard($link, $img, $imgFlag, $title, $date, $summit, $battlepass, $icon, $text_summit, $text_battlepass, $text_icon, $text_price);

                        }

                    ?>
                </ul>
            </div>
        </main>
    </div>

    <script>
        const desacForm = document.getElementById('formulaire');

        desacForm.addEventListener('keydown', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
            }
        });
    </script>

    <script src="../../javascript/overCardEffect.js"></script>
    <script src="../../javascript/searchCar.js"></script>
</body>

</html>