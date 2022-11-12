<?php

class UserView extends UserCtrl{

    public function full_name($id)
    {
        $user  = $this->select_data("Id = ?",$id)->fetch_assoc();
        echo $user['FN']." ".$user['LN'];
    }


    public function Username($id)
    {
        $user  = $this->select_data("Id = ?",$id)->fetch_assoc();
        echo $user['Student_no'];
    }
}                                                              