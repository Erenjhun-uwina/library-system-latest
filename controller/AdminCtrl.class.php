<?php

class AdminCtrl extends Model
{
    public function select_data(String $where, $val)
    {
        try {
            $this->open();

            $val = (gettype($val) == "array") ? $val : array($val);


            $query = "SELECT * FROM `admins` WHERE $where";
            $stmt = $this->conn->prepare($query);

            $stmt->bind_param(str_repeat('s', count($val)), ...$val);
            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            $this->kill();

            return $result;
        } catch (Exception $err) {
            $this->kill();
            throw $err;
        }
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



    public function update()
    {
        try {
            $this->open();


            $args = func_get_args();

            $field = array_shift($args);
            $val = $args;
            $query = $this->conn->prepare("UPDATE `admins` SET $field WHERE `Id` =? ");

            $query->bind_param(str_repeat('s', count($val)), ...$val);
            $query->execute();
            $this->kill();
        } catch (Exception $err) {
            $this->kill();
            throw $err;
        }
    }


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
