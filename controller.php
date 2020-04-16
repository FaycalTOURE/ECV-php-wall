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

function addPost($user = null, $db, $post){
    $postManager = new PostsManager($db);
    $userManager = new UserManager($db);

    $user = $userManager->getUser($user);
    $user = new UserClass($user);
    $post = new PostsClass(['text' => $post, 'user_id' => $user]);

    $postManager->addPost($post, $user);
    redirect_to('Location: index.php/?action=post&user=' .$user->getEmail());
}

function editPost($user = null, $db){

}

function deletePost($user = null, $db, $id){
    $postManager = new PostsManager($db);
    $postManager->deletePost($id);
    redirect_to('Location: index.php/?action=post&user=' .$user);
}

function redirect_to($url){
    header($url);
    exit();
}