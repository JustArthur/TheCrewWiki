<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    include_once '../include.php';
    include_once '../pages/views/card.php';

    $id_cat = $_POST['request'];

    $resBrands = $DB->prepare('SELECT * FROM brands INNER JOIN country ON country.idCountry = brands.idCountry ORDER BY brands.nomBrand ASC');
    $resBrands->execute();
    $resBrands = $resBrands->fetchAll();

    $resCountry = $DB->prepare("SELECT * FROM brands INNER JOIN country ON brands.idCountry = country.idCountry WHERE country.nameCountry = ?");
    $resCountry->execute([$id_cat]);

    if ($_POST['request']== 'Tous les pays') {
        foreach ($resBrands as $brand) {

            $link = "cars?id_brand=" . $brand['idBrand'];
            $img = "../../img/brands/" . $brand['nomBrand'] . "/logo/" . $brand['imgBrand'];
            $imgFlag = "../../img/flags/" . $brand['flagCountry'];
            $nomBrand = $brand['nomBrand'];
            if ($brand['anneeBrand'] != 0) { $date = $brand['anneeBrand']; } else { $date = "?"; }
        
            brandCard($link, $img, $imgFlag, $nomBrand, $date);
        }
    }

    else {
        foreach ($resCountry as $brand) {
            
            $link = "cars?id_brand=" . $brand['idBrand'];
            $img = "../../img/brands/" . $brand['nomBrand'] . "/logo/" . $brand['imgBrand'];
            $imgFlag = "../../img/flags/" . $brand['flagCountry'];
            $nomBrand = $brand['nomBrand'];
            if ($brand['anneeBrand'] != 0) { $date = $brand['anneeBrand']; } else { $date = "?"; }
        
            brandCard($link, $img, $imgFlag, $nomBrand, $date);
        }
    }
?>