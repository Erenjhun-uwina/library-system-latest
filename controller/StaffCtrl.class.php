<?php

class StaffCtrl extends Model
{

    public function select_data(String $where, $val)
    {
        try {
            $this->open();

            $val = (gettype($val) == "array") ? $val : array($val);

            $query = "SELECT * FROM `staffs` WHERE $where";
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



    public function update(string $FN, string $LN, string $Pass, $Uname, $id)
    {
        try {
            $this->open();
            $query = $this->conn->prepare("
            UPDATE `staffs` SET `FN`=?,`LN`=?,,`Password`=?,`Username`=? WHERE `Id` =? ");

            $query->bind_param("sssss", $FN, $LN, $Pass, $Uname, $id);
            $query->execute();

            $this->kill();
        } catch (Exception $err) {

            $this->kill();
            throw $err;
        }
    }

    public function delete($id)
    {
        try {
            $this->open();
            $query = $this->conn->prepare("
            DELETE FROM `staffs` WHERE `id` = ? ");
            $query->bind_param("s", $id);
            $query->execute();


            $this->kill();
        } catch (Exception $err) {

            $this->kill();
            throw $err;
        }
    }
}
