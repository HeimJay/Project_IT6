<?php

include "../Database/db_connect.php";


if(isset($_POST['addBTN'])){

    try{


        $sql = "INSERT INTO suppliers(sFname,sLname,sContactNum ,company_name) VALUES(?,?,?,?)";
        $do = $conn->prepare($sql);
        $do->bind_param("ssss",$_POST['Sfname'], $_POST['Slname'], $_POST['conNum'], $_POST['Scname']);
    
        $do->execute();
        $do->close();
        $conn->close();
    
        header("location: ../Admin_Interface/Suppliers_Interface.php");
    
    
    
    } catch(\Exception $e){
        $conn->close();
        die($e);
    }
    exit();
}

if(isset($_POST['deleteBTN'])){
    try{

        $sql = "DELETE FROM suppliers WHERE supplier_ID=?";
        $do = $conn->prepare($sql);
        $do->bind_param("i",$_POST['id']);
    
        $do->execute();
        $do->close();
        $conn->close();
    
        header("location: ../Admin_Interface/Suppliers_Interface.php");
    
    
    
    } catch(\Exception $e){
        $conn->close();
        die($e);
    }
    exit();
}




?>