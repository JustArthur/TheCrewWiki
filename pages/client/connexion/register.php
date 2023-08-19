<?php
    include_once '../../../include.php';

    if(!empty($_SESSION['utilisateur'])) {
        header('Location: ../../../index');
        exit();
    }

    $identifiant = '';
    $email = '';
    $erreur = '';

    if(!empty($_POST)) {
        extract($_POST);
        if(isset($_POST['inscription'])) {
            [$erreur, $identifiant, $email] = $_INSCRIPTION->inscription_user($identifiant, $email, $password, $conf_password);
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="../../../style/login_register.css">

    <title>Document</title>
</head>

<body>
    <div class="container">

        <main>
            <div class="content">
                <form method="POST">
                    <h1>S'inscrire</h1>

                    <?php if(isset($erreur)) { ?><p style="color: red;" class="erreur"><?= $erreur ?></p> <?php } ?>

                    <input required type="text" value="<?= $identifiant ?>" name="identifiant" placeholder="Votre identifiant">

                    <input required type="email" value="<?= $email ?>" name="email" placeholder="Votre adresse-mail">

                    <input required type="password" name="password" placeholder="Votre mot de passe">
                    <input required type="password" name="conf_password" placeholder="Confirmer votre mot de passe">

                    <div class="info_pass">
                        <span class="material-symbols-outlined icon">info</span>
                        Le mot de passe doit comporter au minimum 12 caractères avec Minuscule(s), Majuscule(s), Chiffre(s), Caractère(s) spécial/spéciaux
                    </div>

                    <a href="faq">Pourquoi demandons-nous ces informations ?</a>

                    <input type="submit" name="inscription" value="Créer mon compte">

                    <p>Vous avez déjà un compte ? <a href="login">Se connecter</a></p>
                </form>
            </div>
        </main>

    </div>
</body>

</html>