<?php
include '../Database/db_connect.php';


try {

    $get_id = $_POST['sba'];

    $sql = "DELETE FROM vulcanizing WHERE Supplier_ID=?";
    $smt = $conn->prepare($sql);
    $smt->bind_param('i', $get_id);

    $smt->execute();
    $smt->close();
    $conn->close();

    header('location: ../Admin_Interface/Stocks_Interface.php');
} catch (\Exception $e) {
    $conn->close();
    die($e);
}
