<?php

class BookCtrl extends Control
{   

    public function __construct() {
        parent::__construct("books");
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
    
}
