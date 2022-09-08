<?php
    if (!defined('ALLOW_ENTRY')) die('Access denied!');

    $img = "window.open('users/picture/" . htmlspecialchars($_POST['id']) . "+" . htmlspecialchars($_POST['picture']) . "');";
    $cv = "window.open('users/cv/" . htmlspecialchars($_POST['id']) . "+" . htmlspecialchars($_POST['cv']) . "');";
