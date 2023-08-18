<?php
    class Inscription {
        private $erreur;
        private $valid;

        public function inscription_user($identifiant, $email, $password, $conf_password) {

            $username = (String) htmlspecialchars($identifiant,ENT_QUOTES);
            $email = (String) htmlspecialchars($email,ENT_QUOTES);
            $password = (String) htmlspecialchars($password,ENT_QUOTES);
            $conf_password = (String) htmlspecialchars($conf_password,ENT_QUOTES);


            $this->erreur = (String) "";
            $this->valid = (boolean) true;


            if(isset($username) && isset($email)) {
                $verif_user_exsite = getUserIdByEmail($email);
                $verif_user_exsite = $verif_user_exsite->fetch();

                if(isset($verif_user_exsite['idUser'])) {
                    $this->valid = false;
                    $this->erreur = "L'adresse mail est déjà utilisé";
                }

                if (strlen($password) < 12) {
                    $this->valid = false;
                    $this->erreur = "Le mot de passe fait moins de 12 caractères ou ne correspond pas aux attentes";
                }
            
                if (!preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^a-zA-Z0-9]/', $password)) {
                    $this->valid = false;
                    $this->erreur = "Le mot de passe fait moins de 12 caractères ou ne correspond pas aux attentes";
                }

                if($password <> $conf_password) {
                    $this->valid = false;
                    $this->erreur = "Les mots de passe sont différents.";
                }



                if($this->valid) {
                    $crypt_password = password_hash($password, PASSWORD_BCRYPT);

                    insertUser($username, $email, $crypt_password);

                    userLogInSession($email);

                    header('Location: ' . ROOT_PATH . 'index');
                    exit();
                }
            }


            return [$this->erreur, $identifiant, $email];
        }
    }
?>