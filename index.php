<?php

require_once './autoloader.php';
require_once './database.php';

require('controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'post') {
        if(isset($_POST['post']) && strlen($_POST['post']) > 0){
            addPost($_GET['user'], $db, $_POST['post']);
        }else{
            post($_GET['user'], $db);
        }
    }
    elseif ($_GET['action'] == 'addPost') {
        addPost($_GET['user'], $db, $_POST['post']);
    }
    elseif ($_GET['action'] == 'editPost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            editPost($_GET['user'], $db, $_GET['id']);
        }
        else {
            echo 'Erreur : aucun identifiant envoyé';
        }
    }
    elseif ($_GET['action'] == 'deletePost') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            deletePost($_GET['user'], $db, $_GET['id']);
        }
        else {
            echo 'Erreur : aucun identifiant envoyé';
        }
    }
    elseif ($_GET['action'] == 'createAccount'){
        createAccount($db);
    }
}
else {
    home($db);
}