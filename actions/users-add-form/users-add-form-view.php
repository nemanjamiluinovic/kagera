<?php if (!defined('ALLOW_ENTRY')) die('Access denied!'); ?>

<form action="?action=users-add" method="post" enctype="multipart/form-data" id="user">
    <label for="first_name">First name:</label><br>
    <input type="text" name="first_name" class="input_text" pattern="[a-zA-ZšđčćžŠĐČĆŽ][a-zA-ZšđčćžŠĐČĆŽ ]{2,}" required><br>

    <label for="last_name">Last name:</label><br>
    <input type="text" name="last_name" class="input_text" pattern="[a-zA-ZšđčćžŠĐČĆŽ][a-zA-ZšđčćžŠĐČĆŽ ]{2,}" required><br>

    <label for="gender">Gender:</label><br>
    <input type="radio" name="gender" value="male">Male<br>
    <input type="radio" name="gender" value="female">Female<br>

    <label for="position">Position:</label><br>
    <select name="position" id="selector" pattern="[a-zA-ZšđčćžŠĐČĆŽ][a-zA-ZšđčćžŠĐČĆŽ ]{2,}" required>
        <?php
        foreach ($positions as $row) {
            echo "<option value='".htmlspecialchars($row['position_id'])."'>".htmlspecialchars($row['position'])."</option>";
        };
        ?>
        <option value="add">add new position</option>
    </select><br>

    <label for="picture">Picture:</label><br>
    <input type="file" name="picture" accept="image/jpg, image/png"><br>

    <label for="cv">CV:</label><br>
    <input type="file" name="cv" accept="application/pdf"><br><br>

    <input class="button" type="submit" value="ADD">

    <button class="button3" onClick="window.close();">
    <span class="icon">Cancel</span>
    </button>
</form>

<div class="loginPopup">
    <div class="formPopup" id="popupForm">
        <form action="?action=positions-add" method="post" class="formContainer">
            <h2>Add new position</h2>
            <label for="position">
            </label>
            <input type="text" id="pos" placeholder="position name" name="pos" pattern="[a-zA-ZšđčćžŠĐČĆŽ][a-zA-ZšđčćžŠĐČĆŽ ]{2,}" required>
            <label for="des">
            </label>
            <input type="textarea" id="des" placeholder="position description" name="des" pattern="[a-zA-ZšđčćžŠĐČĆŽ][a-zA-ZšđčćžŠĐČĆŽ ]{2,}" required>
            <button type="submit" class="btn">Add</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
        </form>
    </div>
</div>

<script src="js/add_positon.js"></script>
