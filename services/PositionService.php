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

        $sql = "INSERT INTO position (position, description) VALUES (?, ?)";

        $prep = $this->db()->prepare($sql);
        $prep->bind_param("ss", $positionName, $positionDescription);

        $res = $prep->execute();

        if ($res) {
            return $prep->insert_id;
        } else {
            $error = $this->db()->error;
            return false;
        }
    }
}
