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

function post($user = null, $db){
    $title_header = 'Derniers posts';
    $userManager = new UserManager($db);
    $postManager = new PostsManager($db);
    $user = $userManager->getUser($user);
    $posts = $postManager->getPosts(new UserClass($user));
    $message = null;
    require 'templates/post.php';
}

function editPost(){

}

function deletePost(){

}

function redirect_to($url){
    header($url);
    exit();
}