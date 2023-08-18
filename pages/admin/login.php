<?php
    include_once '../../include.php';

    $valid = true;
    $erreur = '';

    if(!empty($_POST)) {
        extract($_POST);

        if(isset($_POST['login'])) {
            $verif_password = $DB->prepare("SELECT passwordUser FROM user WHERE identifiantUser = ?");
            $verif_password->execute([$identifiant]);
            $verif_password = $verif_password->fetch();

            if(isset($verif_password['passwordUser'])) {
                if(!password_verify($password, $verif_password['passwordUser'])) {
                    $valid = false;
                    $erreur = 'Mauvais mot de passe ou identifiant.';
                }
            } else {
                $valid = false;
                $erreur = 'Mauvais mot de passe ou identifiant.';
            }


            if($valid) {                   
                $sql = $DB->prepare("SELECT * FROM user WHERE identifiantUser = ?");
                $sql->execute([$identifiant]);
                $sql = $sql->fetch();

                $_SESSION['utilisateur'] = array(
                    htmlspecialchars($sql['idUser'], ENT_QUOTES), //0
                    htmlspecialchars($sql['identifiantUser']), //1
                    htmlspecialchars($sql['rangUser']) //2
                );

                if($_SESSION['utilisateur'][2] != 2) {
                    header('Location: ../../index');
                    exit();
                } else {
                    header('Location: pages/panel');
                    exit();
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="identifiant" placeholder="Identifiant">

        <input type="password" name="password" placeholder="Mot de passe">

        <input type="submit" name="login" value="Se connecter">
    </form>
</body>
</html>