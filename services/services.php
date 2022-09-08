<?php
if (!defined('ALLOW_ENTRY')) die('Access denied!');

require_once "config.php";
require_once "connection_to_db.php";

require_once "services/UserService.php";
require_once "services/PositionService.php";

$userService = new UserService($mysqli);
$positionService = new PositionService($mysqli);
