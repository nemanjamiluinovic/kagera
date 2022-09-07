<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div id="detail">
    <?php
    echo '<span>First name: </span>'.$_POST["f_name"];
    echo '</br><span>Last name: </span>'.$_POST["l_name"];
    echo '</br><span>position: </span>'.$_POST["position"].'';
    echo '</br><span>type: </span>'.$_POST["type"];
    echo '</br><span>gender: </span>'.$_POST["gender"];

    $img = "window.open('users/picture/".$_POST['id']."+".$_POST['picture']."');";
    $cv = "window.open('users/cv/".$_POST['id']."+".$_POST['cv']."');";

    
    
?>
    </br><button class="button2" onClick="<?php echo $img ?>">
        <span class="icon">Open picture</span>
    </button>
    </br><button class="button2" onClick="<?php echo $cv ?>">
        <span class="icon">Open cv</span>
    </button>
    </br><button class="button3" onClick="location.href = 'index.php';">
        <span class="icon">back to all user</span>
        </button>
    </div>
</body>
</html>