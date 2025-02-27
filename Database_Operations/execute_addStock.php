<?php
    include "../Database/db_connect.php";

    try{
        $sql = "INSERT INTO stock_ins(supplier_ID, item_name, arrived_quantity, category, original_price, arrival_date, employee_ID) VALUES (?,?,?,?,?,?,?)";
        $do = $conn->prepare($sql);
        $do->bind_param("isisisi", $_POST['selected_supplier'], $_POST['iname'], $_POST['aqty'], $_POST['category'], $_POST['sprice'], $_POST['date'], $_POST['selected_employee']);

        $do->execute();
        $do->close();
        $conn->close();

        header("location: ../Admin_Interface/Stocks_Interface.php");

    }catch(\Exception $e){
        $conn->close();
        die($e);
    }


?>