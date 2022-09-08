<?php
class BaseService {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    protected function db() {
        return $this->db;
    }
}
