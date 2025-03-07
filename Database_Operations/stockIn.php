<?php
    include '../Database/db_connect.php';


    try {

        $s_item = $_POST['selected_item'];

        $s_emp = $_POST['selected_employee'];
        $s_supp = $_POST['selected_supplier'];
        $qty = $_POST['qty'];
        $date = $_POST['date'];

        $sql = "INSERT INTO stock_ins(stock_ID, supplier_ID, arrived_quantity, arrival_date, employee_ID) VALUES(?,?,?,?,?)";
        $smt = $conn->prepare($sql);
        $smt->bind_param('iiisi', $s_item, $s_supp, $qty, $date, $s_emp);

        $smt->execute();
        $smt->close();
        $conn->close();

        header('location: ../Admin_Interface/Stocks_Interface.php');
    } catch (\Exception $e) {
        $conn->close();
        die($e);
    }
