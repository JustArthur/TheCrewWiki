<?php
    function insertUser($username, $email, $crypt_password) {
        $DBB = new connexionDB();
        $DB = $DBB->DB();

        $username = htmlspecialchars($username, ENT_QUOTES);
        $email = htmlspecialchars($email, ENT_QUOTES);

        $sql = $DB->prepare("INSERT INTO user (identifiantUser, emailUser, passwordUser) VALUES(?, ?, ?);");
        $sql->execute([$username, $email, $crypt_password]);

        return $sql;
    }

    function userLogInSession($email) {
        $DBB = new connexionDB();
        $DB = $DBB->DB();

        $email = htmlspecialchars($email, ENT_QUOTES);

        $sql = $DB->prepare("SELECT * FROM user WHERE emailUser = ?");
        $sql->execute([$email]);
        $sql = $sql->fetch();

        $_SESSION['utilisateur'] = array(
            htmlspecialchars($sql['idUser'], ENT_QUOTES), //0
            htmlspecialchars($sql['identifiantUser'], ENT_QUOTES), //1
            htmlspecialchars($sql['emailUser'], ENT_QUOTES), //2
            htmlspecialchars($sql['rangUser'], ENT_QUOTES) //3
        );

        return $sql;
    }

    function getUserIdByEmail($email) {
        $DBB = new connexionDB();
        $DB = $DBB->DB();

        $email = htmlspecialchars($email, ENT_QUOTES);

        $sql = $DB->prepare("SELECT idUser FROM user WHERE emailUser = ?");
        $sql->execute([$email]);

        return $sql;
    }

    function getPassword($email) {
        $DBB = new connexionDB();
        $DB = $DBB->DB();

        $email = htmlspecialchars($email, ENT_QUOTES);

        $sql = $DB->prepare("SELECT passwordUser FROM user WHERE emailUser = ?");
        $sql->execute([$email]);

        return $sql;
    }
?>