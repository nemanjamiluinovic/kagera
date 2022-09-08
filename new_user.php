<?php

if ($_FILES["cv"]["type"] == "application/pdf" && ($_FILES["picture"]["type"] == "image/jpg" || $_FILES["picture"]["type"] == "image/png")){
	
require "connection_to_db";

$img = $_FILES['picture']['name'];
$cv = $_FILES['cv']['name'];

$sql = "
INSERT INTO user (first_name, last_name, position_id, gender, picture_path, cv_path)
VALUES ('".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['position']."','".$_POST['gender']."','".$img."','".$cv."')
";

$procedure = "CALL add_new_user_to_partners('".$_POST['first_name']."','".$_POST['last_name']."')";



if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";

    $result = $mysqli->query("SELECT MAX(user.user_id) AS last_user FROM user");
    $row = $result->fetch_assoc();
    $u = $row['last_user'];
    move_uploaded_file($_FILES['picture']['tmp_name'],"users/picture/$u+$img");
    move_uploaded_file($_FILES['cv']['tmp_name'],"users/cv/$u+$cv");

    $mysqli->query($procedure);
 } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  
 $mysqli->close();

 header('Location: index.php');
}else{
	die ("this type of file cannot be uploaded");}

?>