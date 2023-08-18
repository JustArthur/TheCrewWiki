<?php

    include_once '../include.php';

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

    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/all_cars.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php include_once '../views/sidebar.php' ?>

        <main>
            <div class="content">
                <div class="title">Liste des marques</div>

                <p class="desc big">Liste de toute les marques présente en jeux.</p>

                <form action="" class="search_form">
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
                    <?php foreach ($resBrands as $brand) { ?>
                        <a href="brand?id_brand=<?= $brand['idBrand'] ?>" class="card">
                            <div class="card-content">
                                <div class="card-image">
                                    <img src="../img/brands/<?= $brand['nomBrand'] ?>/logo/<?= $brand['imgBrand'] ?>">
                                </div>
                                <div class="card-info-wrapper">
                                    <div class="card-info">
                                        <img src="../img/flags/<?= $brand['flagCountry'] ?>" class="flag">
                                        <div class="card-info-title">
                                            <h3><?= $brand['nomBrand'] ?></h3>
                                            <h4>Créer en <?php if ($brand['anneeBrand'] != 0) { echo $brand['anneeBrand']; } else { echo '?'; } ?></h4>
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
    <script src="../javascript/searchCountrySelect.js"></script>
    <script src="../javascript/searchCountry.js"></script>
</body>

</html>