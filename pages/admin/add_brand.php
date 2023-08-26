<?php
include_once '../../include.php';

$selectCountry = $DB->prepare('SELECT * FROM country ORDER BY nameCountry ASC');
$selectCountry->execute();
$selectCountry = $selectCountry->fetchAll();

$valid = true;

if (!empty($_POST)) {
    extract($_POST);

    if (isset($_POST['addBrand'])) {

        if (isset($_FILES['imgBrand']) && !empty($_FILES['imgBrand'])) {
            $extensionValides = array('jpg', 'png', 'jpeg', 'webp');

            $upload_Brand = strtolower(substr(strrchr($_FILES['imgBrand']['name'], '.'), 1));

            if (in_array($upload_Brand, $extensionValides)) {

                $dossierBrand = '../../../img/brands/' . $nomBrand;
                $dossierLogoBrand = $dossierBrand . '/logo';
                $dossierCarsBrands = $dossierBrand . '/cars';

                if (!is_dir($dossierBrand)) {
                    mkdir($dossierBrand);
                }
                if (!is_dir($dossierLogoBrand)) {
                    mkdir($dossierLogoBrand);
                }
                if (!is_dir($dossierCarsBrands)) {
                    mkdir($dossierCarsBrands);
                }

                $chemin_imgBrand = $dossierLogoBrand . '/' . $_FILES['imgBrand']['name'];

                $res_livretFamille = move_uploaded_file($_FILES['imgBrand']['tmp_name'], $chemin_imgBrand);

                if (is_readable($chemin_imgBrand)) {
                    $valid = true;
                } else {
                    $valid = false;
                }
            } else {
                $valid = false;
                echo 'Mauvais format de fichier';
            }
        } else {
            $valid = false;
            echo 'Image brand pas mis';
        }

        if ($valid) {
            $insertBDD = $DB->prepare("INSERT INTO brands (nomBrand, imgBrand, anneeBrand, idCountry) VALUES(?, ?, ?, ?)");
            $insertBDD->execute([$nomBrand, $_FILES['imgBrand']['name'], $anneeBrand, $country]);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="style/panel.css">

    <title>TheWikiCrew | Ajouter une marque</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <h1>Ajouter une marque</h1>
        <input type="text" autofocus name="nomBrand" placeholder="Nom de la marque">

        <input type="number" name="anneeBrand" placeholder="Année de création">

        <select name="country">
            <option value="none" hidden>Choisir le pays</option>
            <?php foreach ($selectCountry as $country) { ?>
                <option value="<?= $country['idCountry'] ?>"><?= $country['nameCountry'] ?></option>
            <?php } ?>
        </select>

        <input type="file" id="image" name="imgBrand">
        <img id="img" src="img/no-image-selected.png" alt="No image selected" class="no_image">

        <input type="submit" class="submit_btn" name="addBrand" value="Ajouter la marque">
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const dropZone = document.getElementById("img");
            const imgPreview = document.getElementById("img");
            const input = document.getElementById("image");

            dropZone.addEventListener("dragover", (e) => {
                e.preventDefault();
                dropZone.classList.add("drag-over");
            });

            dropZone.addEventListener("dragleave", () => {
                dropZone.classList.remove("drag-over");
            });

            dropZone.addEventListener("drop", (e) => {
                e.preventDefault();
                dropZone.classList.remove("drag-over");

                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    const imageFile = files[0];
                    if (imageFile.type.startsWith("image/")) {
                        const imageURL = URL.createObjectURL(imageFile);
                        imgPreview.src = imageURL;
                        input.files = files;
                    }
                }
            });

            input.addEventListener("change", (e) => {
                if (input.files[0])
                    imgPreview.src = URL.createObjectURL(input.files[0]);
            });
        });
    </script>

    <script src="../../javascript/changeTheme.js"></script>
</body>

</html>