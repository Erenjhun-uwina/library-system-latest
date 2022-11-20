<?php

class UserCtrl extends Control
{

    public function __construct()
    {
        parent::__construct("users");
    }

    public function create(string $fn, string $ln, string $studno, string $pass, string $grade_sec, string $email, string $contact): int
    {
        return parent::_create("`FN`, `LN`, `Student_no`, `Password`, `Grade_sec`, `Email`, `Contact_no`", func_get_args());
    }
}
