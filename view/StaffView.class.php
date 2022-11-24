<?php

class StaffView extends StaffCtrl{

    public function full_name($id)
    {
        $staff  = $this->select_data("Id = ?",$id)->fetch_assoc();
        echo $staff['FN']." ".$staff['LN'];
        
    }

    public  function username($id)
    {

        $staff  = $this->select_data("Id = ?",$id)->fetch_assoc();
        echo $staff['Usernane'];


    }
}                                                              