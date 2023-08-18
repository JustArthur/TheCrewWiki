<?php

    include_once '../include.php';

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

    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/all_cars.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php include_once '../views/sidebar.php' ?>

        <main>
            <div class="content">
                <div class="title">Liste des véhicules de la marque <?= $resBrands['nomBrand'] ?></div>

                <p class="desc big">Liste de tout les véhicules.</p>

                <form action="" class="search_form">
                    <div class="search">
                        <i class="uil uil-search"></i>
                        <input spellcheck="false" type="text" id="<?= $_GET['id_brand'] ?>" placeholder="Rechercher un modèle">
                    </div>
                </form>

                <ul class="list-card cars" id="cards">
                    <?php foreach ($selectAllCarsFromBrand as $car) {

                        switch ($car['summitReward']) {
                            case 1:
                                $summit = "summit";
                                $text_summit = "<h4>Voiture Summit</h4>";
                                break;

                            default:
                                $summit = "";
                                $text_summit = "<h4 style='display: none'></h4>";
                                break;
                        }

                        switch ($car['battlepassReward']) {
                            case 1:
                                $battlepass = "battlePass";
                                $text_battlepass = "<h4>Voiture BattlePass</h4>";
                                break;

                            default:
                                $battlepass = "";
                                $text_battlepass = "<h4 style='display: none'></h4>";
                                break;
                        }

                        switch ($car['iconReward']) {
                            case 0:
                                $icon = "";
                                $text_icon = "<h4 style='display: none'></h4>";
                                break;

                            default:
                                $icon = "icon";
                                $text_icon = "<h4>Voiture Icone " . $car['iconReward'] . "</h4>";
                                break;
                        }


                        switch ($car['buckPrice']) {
                            case 0:
                                $buckPrice = "";
                                break;

                            default:
                                $buckPrice = $car['buckPrice'];
                                $buckPrice = number_format($buckPrice, 0, ',', ' ');
                        }

                        switch ($car['crewCreditPrice']) {
                            case 0:
                                $crewCreditPrice = "";
                                break;

                            default:
                                $crewCreditPrice = $car['crewCreditPrice'];
                                $crewCreditPrice = number_format($crewCreditPrice, 0, ',', ' ');
                        }

                        if ($buckPrice != "" && $crewCreditPrice != "") {
                            $text_price = '<h4>' . $buckPrice . ' | ' . $crewCreditPrice . '<h4>';
                        } else {
                            $text_price = "<h4 style='display: none'></h4>";
                        }

                    ?>
                        <a href="car_info?id_car=<?= $car['idCar'] ?>" class="card <?= $summit . $battlepass . $icon ?>">
                            <div class="card-content">
                                <div class="card-image">
                                    <img src="../img/brands/<?= $car['nomBrand'] ?>/cars/<?= $car['imgCar'] ?>">
                                </div>
                                <div class="card-info-wrapper">
                                    <div class="card-info">
                                        <img src="../img/flags/<?= $resBrands['flagCountry'] ?>" class="flag">
                                        <div class="card-info-title">
                                            <h3><?= $car['nomCar'] ?></h3>
                                            <h4>Sortie en <?php if ($car['anneeCar'] != 0) { echo $car['anneeCar']; } else { echo '?'; } ?></h4>
                                            <?= $text_summit . $text_battlepass . $text_icon ?>
                                            <?= $text_price ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </ul>
            </div>
        </main>

    </div>

    <script src="../javascript/overCardEffect.js"></script>
    <script src="../javascript/searchCar.js"></script>
</body>

</html>