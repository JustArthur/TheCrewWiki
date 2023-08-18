<?php
    include_once('../include.php');

    $page = $_POST['page'];
    $limit = 9;
    $offset = ($page - 1) * $limit;

    $sql = $DB->prepare('SELECT * FROM brands INNER JOIN country ON country.idCountry = brands.idCountry ORDER BY brands.nomBrand ASC LIMIT :offset, :limit');
    $sql->bindValue(':offset', $offset, PDO::PARAM_INT);
    $sql->bindValue(':limit', $limit, PDO::PARAM_INT);
    $sql->execute();

    $output = '';

    if ($sql->rowCount() > 0) {
        while ($row = $sql->fetch()) {
            if ($row['anneeBrand'] != 0) { $annee = $row['anneeBrand']; } else { $annee = '?';}
            $output .= '<a href="#" class="card">
            <div class="card-content">
                <div class="card-image">
                    <img src="../img/brands/' . $row['nomBrand'] . '/logo/' . $row['imgBrand'] .'">
                </div>
                <div class="card-info-wrapper">
                    <div class="card-info">
                        <img src="../img/flags/' . $row['flagCountry'] .'" class="flag">
                        <div class="card-info-title">
                            <h3>' . $row['nomBrand'] .'</h3>
                            <h4>Créer en ' . $annee .'</h4>
                        </div>
                    </div>
                </div>
            </div>
        </a>';
        }
    }

    echo $output;
?>
