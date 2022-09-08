<?php if (!defined('ALLOW_ENTRY')) die('Access denied!'); ?>

<div id="detail">
    <span>First name: </span> <?php echo htmlspecialchars($_POST["f_name"]); ?><br>
    <span>Last name: </span> <?php echo htmlspecialchars($_POST["l_name"]); ?><br>
    <span>Position: </span> <?php echo htmlspecialchars($_POST["position"]); ?><br>
    <span>Type: </span> <?php echo htmlspecialchars($_POST["type"]); ?><br>
    <span>Gender: </span> <?php echo htmlspecialchars($_POST["gender"]); ?><br>

    <button class="button2" onClick="<?php echo $img ?>">
        <span class="icon">Open picture</span>
    </button>

    <br>

    <button class="button2" onClick="<?php echo $cv ?>">
        <span class="icon">Open cv</span>
    </button>

    <br>

    <button class="button3" onClick="location.href = '?';">
        <span class="icon">back to all user</span>
    </button>
</div>
