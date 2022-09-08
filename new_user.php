<?php
require_once "services/services.php";

$res = $userService->add($_POST['first_name'], $_POST['last_name'], $_POST['position'], $_POST['gender'], $_FILES['picture'], $_FILES['cv'], $error);

if ($res) {
   header('Location: index.php');
} else {
   die ("Error: " . $error);
}
