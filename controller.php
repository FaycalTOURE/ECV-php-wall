<?php

function home($db){
    $title_header = 'BIENVENUE SUR LE WALL !';
    $userManager = new UserManager($db);
    $message = null;
    require 'templates/home.php';
}

function createAccount($db){
    $title_header = 'Création de compte';
    $userManager = new UserManager($db);
    $message = null;
    require 'templates/form.php';
}

function post($user = null, $db, $currentMessage = null){
    $title_header = 'Derniers posts';
    $userManager = new UserManager($db);
    $postManager = new PostsManager($db);
    $user = $userManager->getUser($user);
    $posts = $postManager->getPosts(new UserClass($user));
    $message = $currentMessage;
    require 'templates/post.php';
}

function editPost($user = null, $db){

}

function deletePost($user = null, $db, $id){
    $postManager = new PostsManager($db);
    $postManager->deletePost($id);
    post($user, $db, 'Votre post à bien été supprimmé !');
}

function redirect_to($url){
    header($url);
    exit();
}