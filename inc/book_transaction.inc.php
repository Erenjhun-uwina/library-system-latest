<?php

require_once "../autoloader.php";

$type = $_POST['type'];
$code = $_POST["$type" . "_code"];

$bctrl = new BookCtrl;
$tctrl = new TransactionCtrl;

$transaction = get_transaction();

if ($transaction) {
    $t_id = $transaction['Id'];
    $t_status = $transaction['Status'];
}


function get_transaction()
{
    global $tctrl, $code, $type;

    $transaction = $tctrl->select_data("Code=?", $code)->fetch_assoc();

    if ($transaction) return $transaction;
    return false;
}


function return_book()
{
    global $bctrl, $code, $t_id, $t_status;


    // $bctrl->update("", "", "");

    if ($t_id) {
        if ($t_status == 'returned') {
            // update books available amount
            // update transactions   status and date_returned

            return;
        };

        echo "Something went wrong:\n";
        return;
    }
    echo "Invalid return code";
}

function lend_book()
{
    global $bctrl, $tctrl, $code;

    // udpate books available amount
    // update transactions borrower, status and date_borrowed

    // $bctrl->update("", "", "");
    echo "lend a book";
}
