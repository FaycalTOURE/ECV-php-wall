<?php
    $title = $title_header;
?>

<?php ob_start() ?>
<? if ($message) : ?>
    <div class="alert alert-success" role="alert"><?= $message ?></div>
<? endif; ?>
<div class="d-flex flex-row">
    <h4 class="mr">
        Welcome <?= $user['firstname'] . ' ' .  $user['lastname']  ?>
    </h4>
    <div>
        <form method="post">
            <input type="text" name="post">
            <button class="btn btn-primary" name="submit" type="submit">ajouter !</button>
        </form>
    </div>
</div>
<div class="list-group">
    <? foreach ($posts as $post) : ?>
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex flex-column w-100">
                <h5 class="mb-1"></h5>
                <small><?= $post['date'] ?></small>
                <?= $post['text'] ?>
            </div>
            <div class="flex">
                <? if($user['id'] === $post['user_id']): ?>
                    <a href="?action=editPost&id=<?= $post['id'] ?>&user=<?= $user['email'] ?>" class="btn btn-link">Modifier</a>
                    <a href="?action=deletePost&id=<?= $post['id'] ?>&user=<?= $user['email'] ?>" class="btn btn-danger">Supprimer</a>
                <? endif; ?>
            </div>
        </a>
    <? endforeach; ?>
</div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>