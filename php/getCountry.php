<?php

    include_once('../include.php');

    $resCountry = $DB->prepare('SELECT * FROM country ORDER BY nameCountry ASC');
    $resCountry->execute();
    $resCountry = $resCountry->fetchAll();

    $tabCountry = array();

    foreach ($resCountry as $country) {
        $tabCountry[] = $country['nameCountry'];
    }

    echo json_encode($tabCountry);
?>