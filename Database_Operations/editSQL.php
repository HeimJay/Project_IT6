<?php
include '../Database/db_connect.php';


try {

    $get_id = $_POST['id'];

    $sname = $_POST['sname'];
    $iname = $_POST['iname'];
    $qty = $_POST['qty'];
    $category = $_POST['category'];
    $oprice = $_POST['oprice'];
    $adate = $_POST['adate'];

    $sql = "UPDATE vulcanizing SET Supplier_Name=?,Item_Name=?,Category=?,Quantity=?,SR_Price=?,Arrival_Date=? WHERE Supplier_ID=" . $get_id;
    $smt = $conn->prepare($sql);
    $smt->bind_param('sssids', $sname, $iname, $category, $qty, $oprice, $adate);

    $smt->execute();
    $smt->close();
    $conn->close();

    header('location: ../Admin_Interface/Stocks_Interface.php');
} catch (\Exception $e) {
    $conn->close();
    die($e);
}
