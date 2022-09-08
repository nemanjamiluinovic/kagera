<?php
  require_once "services/services.php";
  $res = $positionService->add($_POST['pos'], $_POST['des'], $error);
  if ($res) {
    echo "New record created successfully";
  } else {
    echo "Error adding a new position!<br>Error: " . $error;
  }

  header('Location: add_user.php');
