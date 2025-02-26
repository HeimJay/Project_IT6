<?php

include "../Database/db_connect.php";

try{


    $sql = "INSERT INTO suppliers(s_fname,s_lname,company_name) VALUES(?,?,?)";
    $do = $conn->prepare($sql);
    $do->bind_param("sss",$_POST['sfname'], $_POST['slname'], $_POST['cname']);

    $do->execute();
    $do->close();
    $conn->close();

    header("location: ../Admin_Interface/Suppliers_Interface.php");



} catch(\Exception $e){
    $conn->close();
    die($e);
}


?>