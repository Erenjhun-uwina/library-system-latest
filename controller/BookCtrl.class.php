<?php

class BookCtrl extends Control
{   
    public function __construct() {
        parent::__construct("books");
    }

    public function create(string $title, string $author, string $daterelease, string $genre, string $coverimg, string $publiher, string $language):int
    {   
        return parent::_create('`Title`, `Author`, `Date_release`, `Genre`, `Cover_img`, `Publisher`, `Language`',func_get_args());
    }
}
