<?php
    if (!defined('ALLOW_ENTRY')) die('Access denied!');

    $fname = filter_input(INPUT_POST, 'first_name');
    $lname = filter_input(INPUT_POST, 'last_name');
    $position = filter_input(INPUT_POST, 'position');
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH); // Samo ASCII

    $res = $userService->add($fname, $lname, $position, $gender, $_FILES['picture'], $_FILES['cv'], $error);
    $message = '';
    if ($res) {
        header('Location: index.php');
    } else {
        $message = $error;
    }
