<?php
    $positionName = filter_input(INPUT_POST, 'pos');
    $positionDescription = filter_input(INPUT_POST, 'des');
    $res = $positionService->add($positionName, $positionDescription, $error);
    $message = '';
    if ($res) {
        header('Location: ?action=users-add-form');
    } else {
        $message = "Error adding a new position!<br>Error: " . $error;
    }
