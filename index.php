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

<?php

class User{
    
    public $id;
    public $f_name;
    public $l_name;
    public $position;
    public $type;
    public $gender;
    public $picture;
    public $cv;

    function __construct($id,$f_name,$l_name,$position,$type,$gender,$picture,$cv){
        $this->id = $id;
        $this->f_name = $f_name;
        $this->l_name = $l_name;
        $this->position = $position;
        $this->type = $type;
        $this->gender = $gender;
        $this->picture = $picture;
        $this->cv = $cv;
    }

    function get_id(){
        return $this->id;
    }
    function get_f_name(){
        return $this->f_name;
    }
    function get_l_name(){
        return $this->l_name;
    }
    function get_position(){
        return $this->position;
    }
    function get_type(){
        return $this->type;
    }
    function get_gender(){
        return $this->gender;
    }
    function get_picture(){
        return $this->picture;
    }
    function get_cv(){
        return $this->cv;
    }
    
    function print_in_table(){
        echo "<tr><td>";
        echo $this->f_name;
        echo "</td>";
        echo "<td>";
        echo $this->l_name;
        echo "</td>";
        echo "<td>";
        echo $this->position;
        echo "</td>";
        echo "<td>";
        echo $this->type;
        echo "</td>";
        echo "<td>";
        echo "<form action='user_details.php' method='post'>";
        echo "<input type='hidden' name='f_name' value='$this->f_name'>";
        echo "<input type='hidden' name='l_name' value='$this->l_name'>"; 
        echo "<input type='hidden' name='position' value='$this->position'>";
        echo "<input type='hidden' name='type' value='$this->type'>";
        echo "<input type='hidden' name='gender' value='$this->gender'>"; 
        echo "<input type='hidden' name='picture' value='$this->picture'>"; 
        echo "<input type='hidden' name='cv' value='$this->cv'>";
        echo "<input type='hidden' name='id' value='$this->id'>";
        echo "<input class='button2' type='submit' value='details'></form>";
        echo "</td>";
        echo "</tr>";
    }

}

$users = array();

require "connection_to_db.php";

$sql = "SELECT
user.user_id,
user.first_name,
user.last_name,
position.position,
type.user_type,
user.gender,
user.picture_path,
user.cv_path
FROM
user INNER JOIN position ON user.position_id = position.position_id
INNER JOIN type ON type.type_id = user.type_id ";


$result = $mysqli -> query($sql);




while ($row = $result->fetch_assoc()) {
    $u = new User($row['user_id'],$row['first_name'],$row['last_name'],$row['position'],$row['user_type'],$row['gender'],$row['picture_path'],$row['cv_path']);
    array_push($users,$u);

}


?>


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
            
            foreach ($users as $u){
                $u->print_in_table();
            }
            

            ?>

        </tbody>
    </table>
    
</body>
</html>