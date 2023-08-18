<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    include_once('../include.php');

    //Récupère l'id du menu Dropdown
    $nomBrandForm = $_POST['request'];

    $selectAllCarsFromBrand = $DB->prepare("SELECT * FROM cars INNER JOIN brands ON cars.idBrand = brands.idBrand WHERE cars.idBrand = ? ORDER BY nomCar ASC");
    $selectAllCarsFromBrand->execute([$_POST['id_brand']]);
    $selectAllCarsFromBrand = $selectAllCarsFromBrand->fetchAll();

    $resBrands = $DB->prepare('SELECT * FROM brands INNER JOIN country ON country.idCountry = brands.idCountry WHERE idBrand = ?');
    $resBrands->execute([$_POST['id_brand']]);
    $resBrands = $resBrands->fetch();

    $resBrandsSearch = $DB->prepare("SELECT * FROM cars INNER JOIN brands ON cars.idBrand = brands.idBrand WHERE cars.nomCar LIKE ?");
    $resBrandsSearch->execute(['%' . $nomBrandForm . '%']);

    //S'il récupère 0 alors il le fait sans filtre
    if (empty($_POST['request'])) {
        foreach ($selectAllCarsFromBrand as $car) {

            switch($car['summitReward']) {
                case 1:
                    $summit = "summit";
                    $text_summit = "<h4>Voiture d'un Summit</h4>";
                    break;

                default:
                    $summit = "";
                    $text_summit = "<h4 style='display: none'></h4>";
                    break;
            }

            switch($car['battlepassReward']) {
                case 1:
                    $battlepass = "battlePass";
                    $text_battlepass = "<h4>Voiture d'un Motorpass</h4>";
                    break;

                default:
                    $battlepass = "";
                    $text_battlepass = "<h4 style='display: none'></h4>";
                    break;
            }

            switch($car['iconReward']) {
                case 0:
                    $icon = "";
                    $text_icon = "<h4 style='display: none'></h4>";
                    break;

                default:
                    $icon = "icon";
                    $text_icon = "<h4>Voiture de l'icone " . $car['iconReward'] . "</h4>";
                    break;
            }

            switch($car['buckPrice']) {
                case 0:
                    $buckPrice = "";
                    break;
                
                default:
                    $buckPrice = $car['buckPrice'];
                    $buckPrice = number_format($buckPrice, 0, ',', ' ');
            }

            switch($car['crewCreditPrice']) {
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
        <?php }
    }

    //Sinon il chercher par rapport à l'id de la categorie
    else {
        foreach ($resBrandsSearch as $car) {

            switch($car['summitReward']) {
                case 1:
                    $summit = "summit";
                    $text_summit = "<h4>Voiture d'un Summit</h4>";
                    break;

                default:
                    $summit = "";
                    $text_summit = "<h4 style='display: none'></h4>";
                    break;
            }

            switch($car['battlepassReward']) {
                case 1:
                    $battlepass = "battlePass";
                    $text_battlepass = "<h4>Voiture d'un Motorpass</h4>";
                    break;

                default:
                    $battlepass = "";
                    $text_battlepass = "<h4 style='display: none'></h4>";
                    break;
            }

            switch($car['iconReward']) {
                case 0:
                    $icon = "";
                    $text_icon = "<h4 style='display: none'></h4>";
                    break;

                default:
                    $icon = "icon";
                    $text_icon = "<h4>Voiture de l'icone " . $car['iconReward'] . "</h4>";
                    break;
            }


            switch($car['buckPrice']) {
                case 0:
                    $buckPrice = "";
                    break;
                
                default:
                    $buckPrice = $car['buckPrice'];
                    $buckPrice = number_format($buckPrice, 0, ',', ' ');
            }

            switch($car['crewCreditPrice']) {
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
        <?php }
    }
?>