<?php
require_once "services/services.php";

$fname = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_ENCODED, FILTER_FLAG_ENCODE_HIGH);
$lname = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_ENCODED, FILTER_FLAG_ENCODE_HIGH);
$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_ENCODED, FILTER_FLAG_ENCODE_HIGH);
$gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH); // Samo ASCII

$res = $userService->add($fname, $lname, $position, $gender, $_FILES['picture'], $_FILES['cv'], $error);

if ($res) {
   header('Location: index.php');
} else {
   die ("Error: " . $error);
}
