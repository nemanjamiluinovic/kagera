<?php
    define('ALLOW_ENTRY', TRUE);
    require_once "services/services.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kagera</title>

        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <?php require_once 'actions/router.php'; ?>

        <script type="text/javascript" src="js/jQuery.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/fancyTable.js"></script>
    </body>
</html>
