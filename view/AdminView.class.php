<?php


class AdminView extends AdminCtrl{

    public function Username($id)
    {
        $admin  = $this->select_data("Id = ?",$id)->fetch_assoc();
        echo $admin['Username'];
    }

    public function select_data($where,$val){
        return parent::select_data($where,$val);
    }
    // public function 
}                                                              