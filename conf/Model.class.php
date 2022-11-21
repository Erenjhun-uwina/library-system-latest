<?php

class Model
{
    protected $conn;
    protected $default_db;

    public function __construct(string $default_db)
    {
        $this->default_db = $default_db;
    }
     
    public function open()
    {
        $db_server = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "library";
        $this->conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
        if ($this->conn->connect_error) return die("connnection error: " . $this->conn->connect_error);
    }

    public function kill()
    {
        $this->conn->close();
    
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

    public function update(string $fields, string $where, $vals)
    {
        try {
            $this->open();

        
            $vals = gettype($vals)=='array'?$vals:[$vals];
            $params = $vals;

            $query = $this->conn->prepare("UPDATE ".$this->default_db." SET $fields WHERE $where");

            $query->bind_param(str_repeat('s', count($vals)), ...$params);
            $query->execute();
            $this->kill();
        } catch (Exception $err) {
            $this->kill();
            throw $err;
        }
    }

    public function delete(string  $where,$vals)
    {
        try {
            $this->open();

            $vals = gettype($vals)=="array"?$vals:[$vals];

            $query = $this->conn->prepare("
            DELETE FROM ".$this->default_db." WHERE $where");
            $query->bind_param("s",...$vals);
            $query->execute();

            $this->kill();
        } catch (Exception $err) {

            $this->kill();
            throw $err;
        }
    }

}


