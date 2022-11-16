<?php

class UserCtrl extends Control
{   
    
    public function __construct() {
        parent::__construct("users");
    }

    public function create(string $FN, string $LN, string $Student_no, string $Pass, string $Grade_sec, string $Email, $Contact_no)
    {
        try {
            $this->open();

            $query = "INSERT INTO `users`(`FN`, `LN`, `Student_no`, `Password`, `Grade_sec`, `Email`, `Contact_no`) VALUES (?,?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sssssss", $FN, $LN, $Student_no, $Pass, $Grade_sec, $Email, $Contact_no);
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
