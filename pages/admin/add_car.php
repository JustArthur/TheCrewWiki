<?php
    include_once '../../include.php';

    $selecBrands = $DB->prepare('SELECT * FROM brands ORDER BY nomBrand ASC');
    $selecBrands->execute();
    $selecBrands = $selecBrands->fetchAll();

    $valid = true;

    $price_buck = 0;
    $price_cc = 0;

    if (!empty($_POST)) {
        extract($_POST);

        if (isset($_POST['addBrand'])) {

            if (isset($_FILES['imgBrand']) && !empty($_FILES['imgBrand'])) {
                $extensionValides = array('jpg', 'png', 'jpeg', 'webp');

                $upload_Brand = strtolower(substr(strrchr($_FILES['imgBrand']['name'], '.'), 1));

                if (in_array($upload_Brand, $extensionValides)) {

                    $brandName = $DB->prepare('SELECT nomBrand FROM brands WHERE idBrand = ?');
                    $brandName->execute([$country]);
                    $brandName = $brandName->fetch();

                    $dossierBrand = '../../../img/brands/' . $brandName['nomBrand'];
                    $dossierCarBrand = $dossierBrand . '/cars';

                    if(!is_dir($dossierCarBrand)) { mkdir($dossierCarBrand); }

                    $chemin_imgBrand = $dossierCarBrand . '/' . $_FILES['imgBrand']['name'];

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
                $type = array();

                switch($type_car) {
                    case 1:
                        $type = array(1, 0 , 0);
                        break;
                    case 2:
                        $type = array(0, 1, 0);
                        break;

                    case 3:
                        $type = array(0, 0, 1);
                        break;

                    default:
                        $type = array(0, 0, 0);
                }

                $insertBDD = $DB->prepare("INSERT INTO cars (nomCar, anneeCar, imgCar, summitReward, battlepassReward, iconReward, buckPrice, crewCreditPrice, idBrand) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);");
                $insertBDD->execute([$nomBrand, $anneeBrand, $_FILES['imgBrand']['name'], $type[0], $type[1], $type[2], $price_buck, $price_cc, $country]);
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

    <title>Document</title>
</head>

<body>
    <main>
        <form method="POST" enctype="multipart/form-data">
            <h1>Ajouter un voiture à une marque</h1>
            <input type="text" autofocus name="nomBrand" placeholder="Nom de la voiture">

            <input type="number" name="anneeBrand" placeholder="Année de sortie">

            <select name="country">
                <option value="none" hidden>Choisir la marque</option>
                <?php foreach ($selecBrands as $brand) { ?>
                    <option value="<?= $brand['idBrand'] ?>"><?= $brand['nomBrand'] ?></option>
                <?php } ?>
            </select>

            <select name="type_car" onchange="toggleInputs()">
                <option value="none" hidden>Type de voiture</option>
                <option value=0>Voiture Achetable</option>
                <option value=1>Voiture Summit</option>
                <option value=2>Voiture Battle Pass</option>
                <option value=3>Voiture Icone</option>
            </select>

            <input type="number" id="inputPrice_buck" name="price_buck" placeholder="Prix en Buck" style="display: none;">
            <input type="number" id="inputPrice_cc" name="price_cc" placeholder="Prix en Crew Credit" style="display: none;">

            <input type="file" id="image" name="imgBrand">
            <img id="img" src="img/no-image-selected.png" alt="No image selected" class="no_image">

            <input type="submit" class="submit_btn" name="addBrand" value="Ajouter la voiture">
        </form>
    </main>

    <script>
        function toggleInputs() {
            var selectedValue = document.getElementsByName("type_car")[0].value;
            var inputPrice_buck = document.getElementById("inputPrice_buck");
            var inputPrice_cc = document.getElementById("inputPrice_cc");

            if (selectedValue === "0") {
                inputPrice_buck.style.display = "block";
                inputPrice_cc.style.display = "block";
            } else {
                inputPrice_buck.style.display = "none";
                inputPrice_cc.style.display = "none";
            }
        }

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
</body>

</html>