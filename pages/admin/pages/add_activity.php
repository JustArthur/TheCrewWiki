<?php
    include_once '../../../include.php';

    $selecCategories = $DB->prepare('SELECT * FROM categories ORDER BY nameCategory ASC');
    $selecCategories->execute();
    $selecCategories = $selecCategories->fetchAll();

    $valid = true;

    if (!empty($_POST)) {
        extract($_POST);

        if (isset($_POST['addActivity'])) {

            if (isset($_FILES['imgActivity']) && !empty($_FILES['imgActivity'])) {
                $extensionValides = array('jpg', 'png', 'jpeg', 'webp');

                $upload_Activity = strtolower(substr(strrchr($_FILES['imgActivity']['name'], '.'), 1));

                if (in_array($upload_Activity, $extensionValides)) {

                    $activityName = $DB->prepare('SELECT nameCategory FROM categories WHERE idCategory = ?');
                    $activityName->execute([$category]);
                    $activityName = $activityName->fetch();

                    $dossierCategory = '../../../img/activities/' . $activityName['nameCategory'];

                    if(!is_dir($dossierCategory)) { mkdir($dossierCategory); }

                    $chemin_imgActivity = $dossierCategory . '/' . $_FILES['imgActivity']['name'];

                    $res_Activity = move_uploaded_file($_FILES['imgActivity']['tmp_name'], $chemin_imgActivity);

                    if (is_readable($chemin_imgActivity)) {
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
                $insertBDD = $DB->prepare("INSERT INTO activities (nomActivity, catActivity, imgActivity) VALUES(?, ?, ?);");
                $insertBDD->execute([$nomActivity, $category, $_FILES['imgActivity']['name']]);
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

    <link rel="stylesheet" href="../style/panel.css">

    <title>Admin | Activités</title>
</head>

<body>
    <main>
        <form method="POST" enctype="multipart/form-data">
            <h1>Ajouter une activité</h1>
            <input type="text" autofocus name="nomActivity" placeholder="Nom de l'activité">

            <select name="category">
                <option value="none" hidden>Choisir la catégorie</option>
                <?php foreach ($selecCategories as $category) { ?>
                    <option value="<?= $category['idCategory'] ?>"><?= $category['nameCategory'] ?></option>
                <?php } ?>
            </select>

            <input type="file" id="image" name="imgActivity">
            <img id="img" src="../img/no-image-selected.png" alt="No image selected" class="no_image">

            <input type="submit" class="submit_btn" name="addActivity" value="Ajouter la voiture">
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