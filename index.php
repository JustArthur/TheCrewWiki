<?php include_once 'include.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="./style/mainStyle.css">

    <link rel="stylesheet" href="./style/sidebarStyle.css">
    
    <title>TheWikiCrew | Introduction</title>
</head>
<body>
    <div class="container">
        <?php include_once './pages/views/sidebar.php' ?>

        <main>
            <div class="content">
                <div class="title">Introduction</div>

                <p class="desc big">Plongez dans l'univers passionnant de The Crew grâce à notre wiki complet dédié à cette licence captivante.</p>

                <img src="img/The-Crew-2-157498117.jpg" alt="">

                <p class="desc">Bienvenue dans le monde palpitant et infini de The Crew 2 ! Plongez vous dans un univers où la vitesse, la compétition et l'exploration fusionnent pour créer une expérience de jeu unique en son genre. Préparez vous à découvrir les détails les plus captivants, les astuces les plus pointues et les stratégies les plus efficaces pour exceller dans ce monde ouvert plein d'opportunités. Accrochez vous bien, car l'aventure débute ici !</p>

                <ul class="list">
                    <a href="#" class="list-item box">
                        <div class="textes">
                            <h3 class="info">The Crew 2 - Les véhicules</h3>
                            <h3 class="title">Apprenez en plus sur les véhicules du jeu</h3>
                        </div>

                        <span class="material-symbols-rounded icon">arrow_forward</span>
                    </a>

                    <a href="#" class="list-item box">
                        <div class="textes">
                            <h3 class="info">The Crew 2 - Les activités</h3>
                            <h3 class="title">Apprenez en plus sur les activités</h3>
                        </div>

                        <span class="material-symbols-rounded icon">arrow_forward</span>
                    </a>

                    <a href="#" class="list-item box">
                        <div class="textes">
                            <h3 class="info">The Crew 2 - Motorflix</h3>
                            <h3 class="title">Apprenez en plus sur l'entreprise Motorflix</h3>
                        </div>

                        <span class="material-symbols-rounded icon">arrow_forward</span>
                    </a>
                </ul>
            </div>
        </main>
    </div>
</body>
</html>