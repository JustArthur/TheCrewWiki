<?php

    include_once('../include.php');

    $resCategory = $DB->prepare('SELECT * FROM categories ORDER BY nameCategory ASC');
    $resCategory->execute();
    $resCategory = $resCategory->fetchAll();

    $tabCategory = array();

    foreach ($resCategory as $category) {
        $tabCategory[] = $category['nameCategory'];
    }

    echo json_encode($tabCategory);
?>