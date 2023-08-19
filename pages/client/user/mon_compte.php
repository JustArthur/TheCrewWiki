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
    <link rel="stylesheet" href="../../../style/sidebar.css">

    <title>WikiCrew | Compte de <?= $_SESSION['utilisateur'][1] ?></title>
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

                    card('settings/personalisation', 'edit', 'Personnalisations', 'Personnalise ton compte à ta guise');
                    card('settings/garage', 'garage', 'Garage', 'Montre aux autres personnes ta collection de véhicules');
                    card('settings/friends', 'person_add', 'Amis', 'Ajoute des amis, vois leurs avancements dans le jeu');
                    card('settings/security', 'security', 'Sécurité', 'Sécurise ton compte pour combattre les méchants');
                    card('settings/confidentiality', 'lock', 'Confidentialité', 'Gére la confidentialité de ton compte');
                    card('settings/send_data', 'database', 'Données personnelle', 'Fait une demande de récupération de tes données, conforme au RGPD');
                    
                    if($_SESSION['utilisateur'][3] == 3) {
                        card('../../admin/panel', 'admin_panel_settings', 'Administrateur', 'Accède au panel administrateur');
                    }
                    
                    card('../../src/deconnexion', 'logout', 'Déconnexion', 'Déconnecte toi de ton compte');

                ?>
            </ul>
        </main>

    </div>

    <script src="../../../javascript/overCardEffect.js"></script>
</body>

</html>