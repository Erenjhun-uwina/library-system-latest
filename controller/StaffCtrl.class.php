<?php

class StaffCtrl extends Control
{
    public function __construct() {
        parent::__construct("staffs");
    }

    public function create(string $FN, string $LN, string $Pass, $Uname)
    {
        try {
            $this->open();

            $query = "INSERT INTO `staffs`(`FN`, `LN`, `Password`, `Username`) VALUES (?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssss", $FN, $LN, $Pass, $Uname);
            $stmt->execute();

            $last_id = $this->conn->insert_id;

            $this->kill();
            return $last_id;
        } catch (Exception $err) {

            $this->kill();
            throw $err;
        }
    }

}
