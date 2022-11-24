<?php

class TransactionView extends TransactionCtrl{
    

    public function transaction(string $id){

        $transanctions = $this->select_data("Borrower = ?", $id);
        while($row = $transanctions->fetch_assoc()){
            echo $row['Code']."<br>";
        }
    }
}
