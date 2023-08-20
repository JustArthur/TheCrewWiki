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
            $img = "../../img/activities/" . $activity['nameCategory'] . "/" . $activity['imgActivity'];
            $imgFlag = "../../img/categories/" . $activity['flagCategory'];
            $nomActivity = $activity['nomActivity'];
            $cat = $activity['nameCategory'];
                        
            ActivityCard($link, $img, $imgFlag, $nomActivity, $cat);
        }
    }

    else {
        foreach ($resCategory as $category) {

            $link = "activity?id_activity=" . $category['idActivity'];
            $img = "../../img/activities/" . $category['nameCategory'] . "/" . $category['imgActivity'];
            $imgFlag = "../../img/categories/" . $category['flagCategory'];
            $nomActivity = $category['nomActivity'];
            $cat = $category['nameCategory'];
                        
            ActivityCard($link, $img, $imgFlag, $nomActivity, $cat);
        }
    }
?>