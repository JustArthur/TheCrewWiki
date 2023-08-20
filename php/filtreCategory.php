<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    include_once '../include.php';
    include_once '../pages/views/card.php';

    $id_cat = $_POST['request'];

    $resActivities = $DB->prepare('SELECT * FROM activities INNER JOIN categories on categories.idCategory = activities.catActivity ORDER BY activities.nomActivity ASC');
    $resActivities->execute();
    $resActivities = $resActivities->fetchAll();

    $resCategory = $DB->prepare("SELECT * FROM activities INNER JOIN categories ON categories.idCategory = activities.catActivity WHERE categories.nameCategory = ?");
    $resCategory->execute([$id_cat]);

    if ($_POST['request']== 'Toutes les catégories') {
        foreach ($resActivities as $activity) {

            $link = "activity?id_activity=" . $activity['idActivity'];
            $img = "../../img/brands/" . $activity['nomActivity'] . "/logo/" . $activity['imgActivity'];
            $imgFlag = "../../img/flags/" . $activity['imgActivity'];
            $nomActivity = $activity['nomActivity'];
        
            ActivityCard($link, $img, $imgFlag, $nomActivity);
        }
    }

    else {
        foreach ($resCategory as $category) {

            $link = "activity?id_activity=" . $category['idActivity'];
            $img = "../../img/brands/" . $category['nomActivity'] . "/logo/" . $category['imgActivity'];
            $imgFlag = "../../img/flags/" . $category['imgActivity'];
            $nomActivity = $category['nomActivity'];
        
            ActivityCard($link, $img, $imgFlag, $nomActivity);
        }
    }
?>