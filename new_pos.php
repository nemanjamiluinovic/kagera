<?php
require "connection_to_db.php";

$sql = "
INSERT INTO position (position, description)
VALUES ('".$_POST['pos']."','".$_POST['des']."')
";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
  
  $mysqli->close();

  header('Location: add_user.php');

?>