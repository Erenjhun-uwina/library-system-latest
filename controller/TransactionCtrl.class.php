<?php

class TransactionCtrl extends Control{

    public function __construct() {
        parent::__construct('transactions');
    }
    
    public function create(string $borrower,string $book, string $date, string $code){ 
        parent::_create('`Borrower`, `Book`, `Date`, `Code`',func_get_args());
    }
}