<!-- templates/layout.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <? if($title_header) : ?>
        <header class="container-fluid">
           <div class="container">
               <h1><?= $title_header ?></h1>
           </div>
        </header>
    <? endif; ?>
    <main class="container">
        <?= $content ?>
    </main>
</body>
</html>