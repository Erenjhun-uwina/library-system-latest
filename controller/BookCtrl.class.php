<?php

class BookCtrl extends Model
{   

    public function select_data(String $where, $val)
    {
        try {
            $this->open();

            $val = (gettype($val) == "array") ? $val : array($val);

            $query = "SELECT * FROM `books` WHERE $where";
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

    public function create(string $title, string $author, string $daterelease, string $genre, string $coverimg, string $publiher, string $language)
    {
        try {
            $this->open();
            $query = $this->conn->prepare("
            INSERT INTO `books`(`Title`, `Author`, `Date_release`, `Genre`, `Cover_img`, `Publisher`, `Language`) 
            VALUES (?,?,?,?,?,?,?)");

            $query->bind_param("sssssss", $title, $author, $daterelease, $genre, $coverimg, $publiher, $language);
            $query->execute();
            $last_id = $this->conn->insert_id;

            $this->kill();
            return $last_id;
        } catch (Exception $err) {

            $this->kill();
            throw $err;
        }
    }


    public function update(string $title, string $author, string $daterelease, string $genre, string $coverimg, string $publiher, string $language, $id)

    {
        try {
            $this->open();
            $query = $this->conn->prepare("
            UPDATE `books` SET `Title`=?,`Author`=?,`Date_release`=?, `Genre`=?, `Cover_img`=?,`Publisher`=?, `Language`=?  WHERE `Id` = ? ");

            $query->bind_param("ssssssss", $title, $author, $daterelease, $genre, $coverimg, $publiher, $language, $id);
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
                DELETE FROM `books` WHERE  `Id` = ? ");

            $query->bind_param("s", $id);
            $query->execute();

            $this->kill();
        } catch (Exception $err) {

            $this->kill();
            throw $err;
        }
    }
}
