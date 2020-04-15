<!-- templates/show.php -->
<?php $title = $title_header ?>

<?php ob_start() ?>
<h4>
    Welcome <?= $user['firstname'] . ' ' .  $user['lastname']  ?>
</h4>
<div class="list-group">
    <? foreach ($posts as $post) : ?>
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"></h5>
                <small><?= $post['date'] ?></small>
                <?= $post['text'] ?>
                <small><?= $post['user_id'] ?></small>
                <? if($user['id'] === $post['user_id']): ?>
                    <a href="?action=editPost&id=<?= $post['id'] ?>" class="btn btn-primary">Modifier</a>
                    <a href="?action=deletePost&id=<?= $post['id'] ?>" type="button" class="btn btn-danger">Supprimer</a>
                <? endif; ?>
            </div>
        </a>
    <? endforeach; ?>
</div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>