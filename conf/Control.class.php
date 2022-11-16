<?php


class Control extends Model
{
    protected $default_db;

    public function __construct(string $default_db)
    {
        $this->default_db = $default_db;
    }

    public function select_data(String $where, $vals)
    {
        try {
            $this->open();

            $val = (gettype($vals) == "array") ? $vals : array($vals);


            $query = "SELECT * FROM " . $this->default_db . " WHERE $where";
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

    public function update(string $fields,string $vals)
    {
        try {
            $this->open();

            $args = func_get_args();
           
            $field = array_shift($args);
            $val = $args;

            $query = $this->conn->prepare("UPDATE ".$this->default_db." SET $field WHERE `Id` =? ");

            $query->bind_param(str_repeat('s', count($val)), ...$val);
            $query->execute();
            $this->kill();
        } catch (Exception $err) {
            $this->kill();
            throw $err;
        }
    }

    public function delete(int $id)
    {
        try {
            $this->open();
            $query = $this->conn->prepare("
            DELETE FROM ".$this->default_db." WHERE `id` = ? ");
            $query->bind_param("s", $id);
            $query->execute();

            $this->kill();
        } catch (Exception $err) {

            $this->kill();
            throw $err;
        }
    }
}
