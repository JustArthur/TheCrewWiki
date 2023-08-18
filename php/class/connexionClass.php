<?php
    class Connexion {
        private $erreur;
        private $valid;

        public function connexion_user($email, $password) {

            $email = (string) htmlspecialchars($email, ENT_QUOTES);
            $password = (string) htmlspecialchars($password, ENT_QUOTES);

            $this->erreur = (string) "";
            $this->valid = (bool) true;

            $verif_password = getPassword($email);
            $verif_password = $verif_password->fetch();

            if (isset($verif_password['passwordUser'])) {
                if (!password_verify($password, $verif_password['passwordUser'])) {
                    $this->valid = false;
                    $this->erreur = 'L\'adresse-mail ou le mot de passe est incorect.';
                }
            } else {
                $this->valid = false;
                $this->erreur = 'L\'adresse-mail ou le mot de passe est incorect.';
            }

            if ($this->valid) {
                userLogInSession($email);

                header('Location: ' . ROOT_PATH . 'index');
                exit();
            }

            return [$this->erreur, $email];
        }
    }
?>