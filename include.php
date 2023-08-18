<?php
    session_start();
    define('ROOT_PATH', '/TheCrewWiki/');
    
    include_once 'database/connexionBD.php';
    include_once 'php/class/inscriptionClass.php';
    include_once 'php/class/connexionClass.php';
    
    require_once 'php/functions/functionsSQL.php';

    $_INSCRIPTION = new Inscription;
    $_CONNEXION = new Connexion;
?>