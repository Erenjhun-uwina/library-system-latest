<?php

class StaffCtrl extends Control
{
    public function __construct()
    {
        parent::__construct("staffs");
    }

    public function create(string $fn, string $ln, string $username, string $pass): int
    {
        return parent::_create("`FN`, `LN`, `Username` , `Password`", func_get_args());
    }
}
