<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    include_once('../include.php');

    //---- [ Importation des cartes ] ----//
    include_once '../pages/views/card.php';

    $nomActivityForm = $_POST['request'];

    $selectAllActivitiesFromCategory = $DB->prepare("SELECT * FROM activities INNER JOIN categories ON categories.idCategory = activities.catActivity WHERE activities.idCategory = ? ORDER BY nomActivity ASC");
    $selectAllActivitiesFromCategory->execute([$_POST['id_brand']]);
    $selectAllActivitiesFromCategory = $selectAllActivitiesFromCategory->fetchAll();

    $resBrands = $DB->prepare('SELECT * FROM brands INNER JOIN country ON country.idCountry = brands.idCountry WHERE idBrand = ?');
    $resBrands->execute([$_POST['id_brand']]);
    $resBrands = $resBrands->fetch();

    $resBrandsSearch = $DB->prepare("SELECT * FROM cars INNER JOIN brands ON cars.idBrand = brands.idBrand WHERE brands.idBrand = ? AND cars.nomCar LIKE ?");
    $resBrandsSearch->execute([$_POST['id_brand'], '%' . $nomActivityForm . '%']);

    if (empty($_POST['request'])) {
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
    } else {
        foreach ($resBrandsSearch as $car) {

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
    }
?>