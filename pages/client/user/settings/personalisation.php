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

    <link rel="stylesheet" href="<?= ROOT_PATH ?>style/mainStyle.css">
    <link rel="stylesheet" href="<?= ROOT_PATH ?>style/sidebarStyle.css">
    <link rel="stylesheet" href="<?= ROOT_PATH ?>pages/style/personalisation.css">

    <title>TheWikiCrew | Personnalisation du compte</title>
</head>
<body>
    <?php include_once '../../../../pages/views/sidebar.php' ?>

    <div class="theme-selector">
        <img src="icon/light_yellow.png" class="theme-option" id="theme-light-yellow" onclick="changeTheme('light-yellow')">
        <img src="icon/dark_yellow.png" class="theme-option" id="theme-dark-yellow" onclick="changeTheme('dark-yellow')">
        <img src="icon/light_blue.png" class="theme-option" id="theme-light-blue" onclick="changeTheme('light-blue')">
        <img src="icon/dark_blue.png" class="theme-option" id="theme-dark-blue" onclick="changeTheme('dark-blue')">
    </div>

    <div class="content">
        
    </div>
</body>
</html>