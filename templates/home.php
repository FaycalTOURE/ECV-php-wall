<?php

if(isset($_POST['submit']) && isset($_POST)){
    $user = $userManager->getUser($_POST['email']);
    if($user && $_POST['password'] === $user['password']){
        redirect_to('Location: index.php/?action=post&user=' .$_POST['email']);
    }else{
        $message = 'E-mail ou mot de passe incorrecte.';
    }
}

$title = $title_header;

?>

<?php ob_start() ?>
<form method="post" name="loginForm" class="needs-validation" novalidate>
    <div class="form-group">
        <label for="exampleInputEmail1">E-mail address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <? if ($message) : ?>
            <small id="emailHelp" class="form-text text-muted"><?= $message ?></small>
        <? endif; ?>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Connexion</button>
    <a href="?action=createAccount">Créer un compte</a>
</form>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>