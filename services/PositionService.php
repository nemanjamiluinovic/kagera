<?php
require_once 'services/BaseService.php';
require_once 'models/User.php';

class PositionService extends BaseService {
    public function getAll() {
        $positions = array();

        $sql="
        SELECT
        position.position_id,
        position.position
        FROM
        position
        ";

        $result = $this->db()->query($sql);

        while ($row = $result->fetch_assoc()) {
            array_push($positions,$row);
        }

        return $positions;
    }

    public function add($positionName, $positionDescription, &$error) {
        $error = null;

        $sql = "
        INSERT INTO position (position, description)
        VALUES ('".$positionName."','".$positionDescription."')
        ";

        if ($this->db()->query($sql) === TRUE) {
            return true;
        } else {
            $error = $this->db()->error;
            return false;
        }
    }
}
