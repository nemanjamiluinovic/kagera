<?php
require_once 'services/BaseService.php';
require_once 'models/User.php';

class UserService extends BaseService {
    public function getAll() {
        $users = array();

        $sql = "SELECT
        user.user_id,
        user.first_name,
        user.last_name,
        position.position,
        type.user_type,
        user.gender,
        user.picture_path,
        user.cv_path
        FROM
        user INNER JOIN position ON user.position_id = position.position_id
        INNER JOIN type ON type.type_id = user.type_id ";


        $result = $this->db()->query($sql);

        while ($row = $result->fetch_assoc()) {
            $u = new User($row['user_id'],$row['first_name'],$row['last_name'],$row['position'],$row['user_type'],$row['gender'],$row['picture_path'],$row['cv_path']);
            array_push($users,$u);
        }

        return $users;
    }

    public function add($fname, $lname, $pos, $gender, $imgFileArray, $cvFileArray, &$error) {
        $error = null;

        if ($cvFileArray["type"] != "application/pdf") {
            $error = 'CV file type is invalid.';
            return false;
        } 
        
        if (!($imgFileArray["type"] == "image/jpg" || $imgFileArray["type"] == "image/png")) {
            $error = 'Picture file type is invalid.';
            return false;
        }

        $img = htmlspecialchars($imgFileArray['name']);
        $cv = htmlspecialchars($cvFileArray['name']);

        $sql = "
        INSERT INTO user (first_name, last_name, position_id, gender, picture_path, cv_path)
        VALUES ('".$fname."','".$lname."','".$pos."','".$gender."','".$img."','".$cv."')
        ";

        $procedure = "CALL add_new_user_to_partners('".$fname."','".$lname."')";

        if ($this->db()->query($sql) === TRUE) {
            $u = $this->db()->insert_id;
            move_uploaded_file($imgFileArray['tmp_name'],"users/picture/$u+$img");
            move_uploaded_file($cvFileArray['tmp_name'],"users/cv/$u+$cv");

            $this->db()->query($procedure);

            return true;
        } else {
            $error = $this->db()->error;
            return false;
        }
    }
}
