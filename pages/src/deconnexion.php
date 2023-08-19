<?php
    include_once '../../include.php';

    session_destroy();
    
    header('Location: ' . ROOT_PATH . 'index');
    exit;
?>