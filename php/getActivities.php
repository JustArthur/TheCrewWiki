<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    include_once('../include.php');

    //---- [ Importation des cartes ] ----//
    include_once '../pages/views/card.php';

    $nomActivityForm = $_POST['request'];

    $selectAllActivitiesFromCategory = $DB->prepare("SELECT * FROM activities INNER JOIN categories on categories.idCategory = activities.catActivity ORDER BY activities.nomActivity ASC");
    $selectAllActivitiesFromCategory->execute([$_POST['id_brand']]);
    $selectAllActivitiesFromCategory = $selectAllActivitiesFromCategory->fetchAll();

    // $resBrands = $DB->prepare('SELECT * FROM brands INNER JOIN country ON country.idCountry = brands.idCountry WHERE idBrand = ?');
    // $resBrands->execute([$_POST['id_brand']]);
    // $resBrands = $resBrands->fetch();

    $resActivitiesSearch = $DB->prepare("SELECT * FROM activities INNER JOIN categories ON activities.catActivity = categories.idCategory WHERE activities.nomActivity LIKE ?");
    $resActivitiesSearch->execute(['%' . $nomActivityForm . '%']);

    if (empty($_POST['request'])) {
        foreach ($selectAllActivitiesFromCategory as $activity) {

            $link = "activity?id_activity=" . $activity['idActivity'];
            $img = "../../img/activities/" . $activity['nameCategory'] . "/" . $activity['imgActivity'];
            $imgFlag = "../../img/categories/" . $activity['flagCategory'];
            $nomActivity = $activity['nomActivity'];
            $cat = $activity['nameCategory'];
                        
            ActivityCard($link, $img, $imgFlag, $nomActivity, $cat);

        }
    } else {
        foreach ($resActivitiesSearch as $car) {

            $link = "activity?id_activity=" . $car['idActivity'];
            $img = "../../img/activities/" . $car['nameCategory'] . "/" . $car['imgActivity'];
            $imgFlag = "../../img/categories/" . $car['flagCategory'];
            $nomActivity = $car['nomActivity'];
            $cat = $car['nameCategory'];
                        
            ActivityCard($link, $img, $imgFlag, $nomActivity, $cat);

        }
    }
