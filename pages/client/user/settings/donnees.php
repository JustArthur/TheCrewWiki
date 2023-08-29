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

    <title>TheWikiCrew | Données personnelles</title>
</head>

<body>
    <?php include_once '../../../../pages/views/sidebar.php' ?>

    <main>
        <div class="content">
            <h1>Protection des Données Personnelles</h1>

            <p>Bienvenue sur <strong>TheWikiCrew</strong> ! Nous sommes dévoués à fournir une plateforme où les joueurs peuvent partager leurs connaissances et leurs expériences sur divers sujets. La protection de vos données personnelles est l'une de nos plus hautes priorités. Voici comment nous gérons et protégeons vos informations :</p>

            <h2>Collecte Minimale</h2>
            <p>Lorsque vous interagissez avec le wiki, nous collectons uniquement les informations nécessaires pour maintenir le bon fonctionnement de la plateforme. Cela peut inclure votre nom d'utilisateur et votre adresse e-mail (si vous choisissez de vous inscrire), ainsi que les contributions que vous apportez au wiki.</p>

            <h2>Utilisation des Données</h2>
            <p>Vos données personnelles sont utilisées exclusivement pour les besoins du wiki. Nous ne vendons ni ne partageons vos informations avec des tiers à des fins de marketing ou de publicité.</p>

            <h2>Sécurité des Données</h2>
            <p>Nous prenons des mesures strictes pour assurer la sécurité de vos données personnelles. Nos serveurs sont protégés par des mesures de sécurité avancées pour prévenir tout accès non autorisé. De plus, nous utilisons des protocoles de chiffrement pour garantir que vos données sont transmises de manière sécurisée.</p>

            <h2>Contrôle sur Vos Données</h2>
            <p>Vous avez le contrôle sur vos données personnelles. Vous pouvez modifier ou supprimer vos contributions au wiki à tout moment. Si vous décidez de fermer votre compte, vos informations seront supprimées de nos systèmes, à l'exception des données nécessaires à la continuité des opérations du wiki.</p>

            <h2>Consentement</h2>
            <p>En utilisant le wiki, vous consentez à la collecte et à l'utilisation de vos données personnelles conformément à cette politique. Si vous avez des préoccupations concernant vos données, n'hésitez pas à nous contacter pour obtenir des éclaircissements.</p>

            <p>Nous sommes engagés à maintenir un environnement sûr et respectueux pour tous les membres de la communauté. Si vous avez des questions supplémentaires sur notre politique de protection des données personnelles, veuillez consulter notre page dédiée à la confidentialité ou nous contacter directement.</p>

            <p>L'équipe TheWikiCrew</p>

            <a class="data" href="">Faire une demande de récupération</a>
        </div>
    </main>
</body>

</html>