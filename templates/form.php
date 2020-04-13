<!-- templates/show.php -->
<?php $title = $title_header ?>

<?php
    if (isset($_POST['submit']) && isset($_POST)) {

        foreach ($_POST as $key => $line){
            $_POST[$key] = trim($line);
        }

        // New with class to prevent
        $current_user= new UserClass($_POST);
        $userManager->addUser($current_user);
    }
?>

<?php ob_start() ?>
<form method="post" name="clientForm" class="needs-validation" novalidate>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="firstname">Nom</label>
            <input type="text" class="form-control"  name="firstname" id="firstname" value="<? if(isset($user['firstname'])) : ?><?=trim($user['firstname']); ?> <? endif; ?>" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="lastname">Prénom</label>
            <input type="text" class="form-control" name="lastname" id="lastname" value="<? if(isset($user['lastname'])) : ?> <?= trim($user['lastname']); ?> <? endif; ?>" required>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" placeholder="******" class="form-control"  name="password" id="password" value="<? if(isset($user['password'])) : ?><?=trim($user['password']); ?> <? endif; ?>" required>
                </div>
                <div>
                    <label for="password1"></label>
                    <input type="password" placeholder="******" class="form-control" name="password1" id="password1" value="<? if(isset($user['password1'])) : ?> <?= trim($user['password1']); ?> <? endif; ?>" required>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" name="submit" type="submit">M'enregistrer !</button>
</form>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>