<?php

require_once './autoloader.php';
require_once './database.php';

require('controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'post') {
        post($_GET['user'], $db);
    }
    elseif ($_GET['action'] == 'editPost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            editPost();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'createAccount'){
        createAccount($db);
    }
}
else {
    home($db);
}