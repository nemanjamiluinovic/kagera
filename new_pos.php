<?php
  require_once "services/services.php";
  $positionName = filter_input(INPUT_POST, 'post', FILTER_SANITIZE_ENCODED, FILTER_FLAG_ENCODE_HIGH);
  $positionDescription = filter_input(INPUT_POST, 'des', FILTER_SANITIZE_ENCODED, FILTER_FLAG_ENCODE_HIGH);
  $res = $positionService->add($positionName, $positionDescription, $error);
  if ($res) {
    echo "New record created successfully";
  } else {
    echo "Error adding a new position!<br>Error: " . $error;
  }

  header('Location: add_user.php');
