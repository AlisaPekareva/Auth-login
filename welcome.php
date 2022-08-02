<?php
// start the session
<?php ob_start() ?>


    <h1><?= $user['name'] ?></h1>
    <div class="date"><?= $user['id'] ?></div>
    <div class="date"><?= $user['surname'] ?></div>
    <div class="body">
        <?= $user['age'] ?>
    </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        
        <title>Welcome </title>
      
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Привет!  Это главная страница сайта для авторизованного пользователя</h1>
                </div>
                <p>
                    <a href="logout.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Выйти</a>
                </p>
            </div>
        </div>
    </body>
</html>