<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once('../include.php');

$nomBrandForm = $_POST['request'];

$selectAllCarsFromBrand = $DB->prepare("SELECT * FROM cars INNER JOIN brands ON cars.idBrand = brands.idBrand WHERE cars.idBrand = ? ORDER BY nomCar ASC");
$selectAllCarsFromBrand->execute([$_POST['id_brand']]);
$selectAllCarsFromBrand = $selectAllCarsFromBrand->fetchAll();

$resBrands = $DB->prepare('SELECT * FROM brands INNER JOIN country ON country.idCountry = brands.idCountry WHERE idBrand = ?');
$resBrands->execute([$_POST['id_brand']]);
$resBrands = $resBrands->fetch();

$resBrandsSearch = $DB->prepare("SELECT * FROM cars INNER JOIN brands ON cars.idBrand = brands.idBrand WHERE cars.nomCar LIKE ?");
$resBrandsSearch->execute(['%' . $nomBrandForm . '%']);

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

?>
        <a href="car_info?id_car=<?= $car['idCar'] ?>" class="card <?= $summit . $battlepass . $icon ?>">
            <div class="card-content">
                <div class="card-image">
                    <img src="../../img/brands/<?= $car['nomBrand'] ?>/cars/<?= $car['imgCar'] ?>">
                </div>
                <div class="card-info-wrapper">
                    <div class="card-info">
                        <img src="../../img/flags/<?= $resBrands['flagCountry'] ?>" class="flag">
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

    ?>
        <a href="car_info?id_car=<?= $car['idCar'] ?>" class="card <?= $summit . $battlepass . $icon ?>">
            <div class="card-content">
                <div class="card-image">
                    <img src="../../img/brands/<?= $car['nomBrand'] ?>/cars/<?= $car['imgCar'] ?>">
                </div>
                <div class="card-info-wrapper">
                    <div class="card-info">
                        <img src="../../img/flags/<?= $resBrands['flagCountry'] ?>" class="flag">
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