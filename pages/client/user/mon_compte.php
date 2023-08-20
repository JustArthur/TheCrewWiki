<?php

    include_once '../../../include.php';

    if(empty($_SESSION['utilisateur'])) {
        header('Location: ../../../index');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,1,0" />

    <link rel="stylesheet" href="../../style/mon_compte.css">
    <link rel="stylesheet" href="../../../style/cardStyle.css">
    
    <link rel="stylesheet" href="../../../style/sidebarStyle.css">

    <title>TheWikiCrew | Compte de <?= $_SESSION['utilisateur'][1] ?></title>
</head>

<body>
    <div class="container">
        <?php include_once '../../views/sidebar.php' ?>

        <main>
            <h1>Mon compte WikiCrew</h1>

            <ul class="list-card" id="cards">
                <?php
                    //---- [ Importation des cartes ] ----//
                    include_once '../../views/card.php';

                    userCard('settings/personalisation', 'edit', 'Personnalisation', 'Personnalise ton compte à ta guise');
                    userCard('settings/garage', 'garage', 'Garage', 'Montre aux autres personnes ta collection de véhicules');
                    userCard('settings/friends', 'person_add', 'Amis', 'Ajoute des amis, vois leurs avancements dans le jeu');
                    userCard('settings/security', 'security', 'Sécurité', 'Sécurise ton compte pour combattre les méchants');
                    userCard('settings/confidentiality', 'lock', 'Confidentialité', 'Gére la confidentialité de ton compte');
                    userCard('settings/send_data', 'database', 'Données personnelle', 'Fait une demande de récupération de tes données, conforme au RGPD');
                    
                    if($_SESSION['utilisateur'][3] == 3) {
                        userCard('../../admin/panel', 'admin_panel_settings', 'Administrateur', 'Accède au panel administrateur');
                    }
                    
                    userCard('../../src/deconnexion', 'logout', 'Déconnexion', 'Déconnecte toi de ton compte');

                ?>
            </ul>
        </main>

    </div>

    <script src="../../../javascript/overCardEffect.js"></script>
</body>

</html>