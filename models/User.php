<?php
class User {
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
