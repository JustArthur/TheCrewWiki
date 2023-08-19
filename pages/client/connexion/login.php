<?php
    include_once '../../../include.php';

    if(!empty($_SESSION['utilisateur'])) {
        header('Location: ../../../index');
        exit();
    }

    $email = '';
    $erreur = '';


    if(!empty($_POST)) {
        extract($_POST);
        if(isset($_POST['connexion'])) {
            [$erreur, $email] = $_CONNEXION->connexion_user($email, $password);
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../style/login_register.css">

    <title>Document</title>
</head>

<body>
    <div class="container">

        <main>
            <div class="content">
                <form method="POST">
                    <h1>Se connecter</h1>

                    <?php if(isset($erreur)) { ?><p style="color: red;" class="erreur"><?= $erreur ?></p> <?php } ?>

                    <input required type="text" value="<?= $email ?>" name="email" placeholder="Votre adresse-mail">
                    <input required type="password" name="password" placeholder="Votre mot de passe">

                    <input type="submit" name="connexion" value="Connexion à mon compte">

                    <p>Vous n'avez pas de compte ? <a href="register">Créer un compte</a></p>
                </form>
            </div>
        </main>

    </div>
</body>

</html>