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
    echo '<span>First name: </span>'.htmlspecialchars($_POST["f_name"]);
    echo '</br><span>Last name: </span>'.htmlspecialchars($_POST["l_name"]);
    echo '</br><span>position: </span>'.htmlspecialchars($_POST["position"]);
    echo '</br><span>type: </span>'.htmlspecialchars($_POST["type"]);
    echo '</br><span>gender: </span>'.htmlspecialchars($_POST["gender"]);

    $img = "window.open('users/picture/".htmlspecialchars($_POST['id'])."+".htmlspecialchars($_POST['picture'])."');";
    $cv = "window.open('users/cv/".htmlspecialchars($_POST['id'])."+".htmlspecialchars($_POST['cv'])."');";
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
