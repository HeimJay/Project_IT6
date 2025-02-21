<?php
include '../Database/db_connect.php';


try {

    $sname = $_POST['sname'];
    $iname = $_POST['iname'];
    $qty = $_POST['qty'];
    $category = $_POST['category'];
    $oprice = $_POST['oprice'];
    $adate = $_POST['adate'];

    $sql = "INSERT INTO vulcanizing(Supplier_Name,Item_Name,Category,Quantity,SR_Price,Arrival_Date) VALUES(?,?,?,?,?,?)";
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
