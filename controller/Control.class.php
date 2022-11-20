<?php


class Control extends Model
{
    protected $default_db;

    public function __construct(string $default_db)
    {
        $this->default_db = $default_db;
    }

    protected function _create(string $fields,$vals):int{
        try {
            $this->open();

            $vals = (gettype($vals)=='array')?$vals:[$vals];
            $len = count(explode(",",$fields));

            $query = "INSERT INTO `".$this->default_db."`($fields) VALUES (?".str_repeat(",?",$len-1).")";
            $stmt = $this->conn->prepare($query);

           
            $stmt->bind_param(str_repeat('s',$len),...$vals);
            $stmt->execute();

            $last_id = $this->conn->insert_id;

            $this->kill();
            return $last_id;

        } catch ( Exception $err) {
           $this->kill();
           throw $err;
        }
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

    public function update(string $fields, $vals , string $id)
    {
        try {
            $this->open();

        
            $vals = gettype($vals)=='array'?$vals:[$vals];
            $params = [...$vals,$id];

            $query = $this->conn->prepare("UPDATE ".$this->default_db." SET $fields WHERE `Id` =? ");

            $query->bind_param(str_repeat('s', count($vals)), ...$params);
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
