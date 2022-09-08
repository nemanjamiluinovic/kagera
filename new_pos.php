<?php
  require_once "services/services.php";
  $positionName = filter_input(INPUT_POST, 'pos');
  $positionDescription = filter_input(INPUT_POST, 'des');
  $res = $positionService->add($positionName, $positionDescription, $error);
  if ($res) {
    header('Location: add_user.php');
  } else {
    echo "Error adding a new position!<br>Error: " . $error;
  }
