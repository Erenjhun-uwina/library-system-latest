<?php


class AdminView extends AdminCtrl{

    public function username(int $id)
    {
        $admin  = $this->select_data("Id = ?",$id)->fetch_assoc();
        echo $admin['Username'];
    }
}                                                              