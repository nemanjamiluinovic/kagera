<?php
    if (!defined('ALLOW_ENTRY')) die('Access denied!');

    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);

    $action = preg_replace('/[^a-z\\-]/', '', $action); // only a-z and - is OK

    if (!$action) {
        $action = 'users-list'; // Default action
    }

    $actionLogicPath = 'actions/' . $action . '/' . $action . '-logic.php';
    $actionViewPath  = 'actions/' . $action . '/' . $action . '-view.php';

    if (!file_exists($actionLogicPath)) {
        die('Invalid action specified!');
    }

    require_once $actionLogicPath;

    if (file_exists($actionViewPath)) {
        require_once $actionViewPath;
    }
