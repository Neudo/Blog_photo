<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="./assets/sass/reset.css" rel="stylesheet">
        <link href="./assets/sass/admin.css" rel="stylesheet">
    </head>
    <body>
        <?php require_once ('partials/header.php'); ?>
        <?php if(isset($_GET['page'])):?>
            <?php require_once ('partials/menu.php'); ?>
        <?php endif; ?>
    


        <?php if(isset($_SESSION['message'])):?> 
            <p class="succes"><?= $_SESSION['message']; ?></p>
        <?php endif; ?>
        <?php if(isset($_SESSION['error'])):?> 
            <p class="error"> <?= $_SESSION['error']; ?></p>
        <?php endif; ?>


        <main>
            <?php require_once($view); ?>
        </main>
    </body>
    <script src="https://cdn.tiny.cloud/1/70bt1iuu0fg16xu3wshagcsi6ip9vks1yxlomgq2ukxyemy9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector: '.tinymce', skin: 'oxide-dark',});</script>
</html>