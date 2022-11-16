<?php

class AdminCtrl extends Control
{   
    public function __construct() {
        $this->default_db = "admins";
    }

   

    // public function create(string $uname, string $pword)
    // {
    //     try {
    //         $this->open();

    //         $query = "INSERT INTO `admins`('username', 'password') VALUES (?,?)";
    //         $stmt = $this->conn->prepare($query);
    //         $stmt ->bind_param("ss",$uname,$pword,);
    //         $stmt ->execute();

    //         $last_id = $this->conn->insert_id;

    //         $this->kill();
    //         return $last_id;
    //     } catch (Exception $err) {

    //         $this->kill();
    //         throw $err;
    //     }
    // }



    // public function delete($id)
    // {
    //     try {
    //         $this->open();
    //         $query = $this->conn->prepare("
    //         DELETE FROM `admins` WHERE `id` = ? "); 
    //         $query->bind_param("s", $id);
    //         $query->execute();


    //         $this->kill();

    //     } catch (Exception $err) {

    //         $this->kill();
    //         throw $err;
    //     }
    // }

}
