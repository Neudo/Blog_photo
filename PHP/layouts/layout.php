<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/sass/reset.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Anton&family=Mitr:wght@500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Palanquin:wght@300&display=swap" rel="stylesheet">
        <link href="assets/sass/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <link rel="stylesheet" href="https://unpkg.com/flickity-fullscreen@1/fullscreen.css">
        <script src="assets/script/main.js" defer></script>
    </head>
    <body>
        <?php require_once ('partials/header.php'); ?>
        
        <?php 
        if($page != '404'){
            require_once ('partials/menu.php'); 
        }
        ?>

        <?php if(isset($_SESSION['message'])):?>
            <?= $_SESSION['message']; ?>
        <?php endif; ?>


        <main>
            <?php require_once($view); ?>
        </main>
        <?php require_once('partials/footer.php'); ?>
    </body>
</html>