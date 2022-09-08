<?php
    require_once "services/services.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kagera</title>

    <link rel="stylesheet" href="style/style.css">

    <script type="text/javascript" src="js/jQuery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/fancyTable.js"></script>
</head>
<body>
    <div id="add">
        <button class="button" onClick="window.open('add_user.php');">
        <span class="icon">ADD NEW USER</span>
        </button>
    </div>
    <table id="sampleTable">
        <thead>
            <tr>
                <td>First name</td>
                <td>Last name</td>
                <td>position</td>
                <td>type</td>
                <td>details</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = $userService->getAll();
            foreach ($users as $u){
                $u->print_in_table();
            }
            ?>
        </tbody>
    </table>
</body>
</html>