<?php
    include_once '../include.php';

    $infoCar = $DB->prepare(
        "SELECT * FROM cars
        INNER JOIN brands
        ON cars.idBrand = brands.idBrand
        INNER JOIN country
        ON country.idCountry = brands.idCountry
        WHERE idCar = ?
    ");

    $infoCar->execute([$_GET['id_car']]);
    $infoCar = $infoCar->fetch();

    $resBrands = $DB->prepare('SELECT * FROM brands INNER JOIN country ON country.idCountry = brands.idCountry WHERE idBrand = ?');
    $resBrands->execute([$infoCar['idBrand']]);
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
                <div class="title"><?= $infoCar['nomCar'] ?></div>

                <img class="carImg" src="../img/brands/<?= $infoCar['nomBrand'] ?>/cars/<?= $infoCar['imgCar'] ?>" alt="">
            </div>
        </main>

    </div>
</body>
</html>