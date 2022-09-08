<?php
if (!defined('ALLOW_ENTRY')) die('Access denied!');

class BaseService {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    protected function db() {
        return $this->db;
    }
}
