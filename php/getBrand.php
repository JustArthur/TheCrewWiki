<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    include_once('../include.php');

    $nomBrandForm = $_POST['request'];

    $resBrands = $DB->prepare('SELECT * FROM brands INNER JOIN country ON country.idCountry = brands.idCountry ORDER BY brands.nomBrand ASC');
    $resBrands->execute();
    $resBrands = $resBrands->fetchAll();

    $resBrandsSearch = $DB->prepare("SELECT * FROM brands INNER JOIN country ON brands.idCountry = country.idCountry WHERE nomBrand LIKE ?");
    $resBrandsSearch->execute([$nomBrandForm . '%']);

    if (empty($_POST['request'])) {
        foreach ($resBrands as $brand) { ?>
            <a href="cars?id_brand=<?= $brand['idBrand'] ?>" class="card">
                <div class="card-content">
                    <div class="card-image">
                        <img src="../../img/brands/<?= $brand['nomBrand'] ?>/logo/<?= $brand['imgBrand'] ?>">
                    </div>
                    <div class="card-info-wrapper">
                        <div class="card-info">
                            <img src="../../img/flags/<?= $brand['flagCountry'] ?>" class="flag">
                            <div class="card-info-title">
                                <h3><?= $brand['nomBrand'] ?></h3>
                                <h4>Créer en <?php if ($brand['anneeBrand'] != 0) { echo $brand['anneeBrand']; } else { echo '?'; } ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php }
        }

    else {
        foreach ($resBrandsSearch as $country) { ?>
            <a href="cars?id_brand=<?= $country['idBrand'] ?>" class="card">
                <div class="card-content">
                    <div class="card-image">
                        <img src="../../img/brands/<?= $country['nomBrand'] ?>/logo/<?= $country['imgBrand'] ?>">
                    </div>
                    <div class="card-info-wrapper">
                        <div class="card-info">
                            <img src="../../img/flags/<?= $country['flagCountry'] ?>" class="flag">
                            <div class="card-info-title">
                                <h3><?= $country['nomBrand'] ?></h3>
                                <h4>Créer en <?php if ($country['anneeBrand'] != 0) { echo $country['anneeBrand']; } else { echo '?'; } ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php }
    }
?>