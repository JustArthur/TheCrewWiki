<?php

    include_once '../../../../include.php';

    if(empty($_SESSION['utilisateur'])) {
        header('Location: ' . ROOT_PATH);
        exit();
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../../style/mainStyle.css">

    <link rel="stylesheet" href="../../../../style/sidebarStyle.css">

    <title>Document</title>
</head>
<body>
    <?php include_once '../../../../pages/views/sidebar.php' ?>
</body>
</html>