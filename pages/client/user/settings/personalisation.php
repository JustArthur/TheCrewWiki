<?php

include_once '../../../../include.php';

if (empty($_SESSION['utilisateur'])) {
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
    <link rel="stylesheet" href="../../../../style/personalisation.css">

    <title>TheWikiCrew | Personnalisation du compte</title>
</head>

<body>
    <?php include_once '../../../../pages/views/sidebar.php' ?>

    <main>
        <div class="content">
            <h1>Personnalisation de votre compte</h1>

            <div class="grid_custom_account">

                <div class="avatar-selector">
                    <div class="avatar-option"></div>
                    <div class="avatar-option"></div>
                    <div class="avatar-option"></div>
                </div>

                <div class="theme-selector">
                    <div class="theme-option" id="theme-light-yellow" onclick="changeTheme('light-yellow')">
                        <div class="left_circle"></div>
                        <div class="right_circle"></div>
                    </div>
                    <div class="theme-option" id="theme-dark-yellow" onclick="changeTheme('dark-yellow')">
                        <div class="left_circle"></div>
                        <div class="right_circle"></div>
                    </div>
                    <div class="theme-option" id="theme-light-blue" onclick="changeTheme('light-blue')">
                        <div class="left_circle"></div>
                        <div class="right_circle"></div>
                    </div>
                    <div class="theme-option" id="theme-dark-blue" onclick="changeTheme('dark-blue')">
                        <div class="left_circle"></div>
                        <div class="right_circle"></div>
                    </div>
                    <div class="theme-option" id="theme-light-pink" onclick="changeTheme('light-pink')">
                        <div class="left_circle"></div>
                        <div class="right_circle"></div>
                    </div>
                    <div class="theme-option" id="theme-dark-pink" onclick="changeTheme('dark-pink')">
                        <div class="left_circle"></div>
                        <div class="right_circle"></div>
                    </div>
                    <div class="theme-option" id="theme-light-orange" onclick="changeTheme('light-orange')">
                        <div class="left_circle"></div>
                        <div class="right_circle"></div>
                    </div>
                    <div class="theme-option" id="theme-dark-orange" onclick="changeTheme('dark-orange')">
                        <div class="left_circle"></div>
                        <div class="right_circle"></div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>

</html>