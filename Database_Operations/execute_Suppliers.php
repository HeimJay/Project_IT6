<?php

    include "../Database/db_connect.php";

    if(isset($_POST['addBTN'])){

        try{
            
            $fname = $_POST['Sfname'];
            $lname = $_POST['Slname'];

            $check_emp = "SELECT sFname, sLname FROM suppliers WHERE sFname ='$fname' AND sLname='$lname' ";
            $check_do = $conn->query($check_emp);
            
            if($check_do->num_rows > 0){
                echo "<script>
                    alert('Name is Already in Use');
                    window.location.href = '../Operations/do_addSuppliers.php';
                </script>";
                exit();
            }

            $sql = "INSERT INTO suppliers(sFname,sLname,sContactNum ,company_name) VALUES(?,?,?,?)";
            $do = $conn->prepare($sql);
            $do->bind_param("ssss",$_POST['Sfname'], $_POST['Slname'], $_POST['conNum'], $_POST['Scname']);
        
            $do->execute();
            $do->close();
            $conn->close();
        
            echo "<script>
                alert('Added Successfully');
                window.location.href='../Admin_Interface/Suppliers_Interface.php';
                </script>";
              
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
            $do->bind_param("i",$_POST['deleteSuppID']);
        
            $do->execute();
            $do->close();
            $conn->close();
        
            echo "<script>
                alert('Deleted Successfully');
                window.location.href='../Admin_Interface/Suppliers_Interface.php';
                </script>";    
        
        } catch(\Exception $e){
            $conn->close();
            die($e);
        }
        exit();
    }

    if(isset($_POST['sEditSaveBTN'])){
        try{   

            $sID = $_POST['sID'];

            $sql = "UPDATE suppliers SET sFname=?,sLname=?,sContactNum=?,company_name=? WHERE supplier_ID='$sID'";
            $do = $conn->prepare($sql);
            $do->bind_param("ssss",$_POST['Sfname'], $_POST['Slname'], $_POST['conNum'], $_POST['Scname']);
        
            $do->execute();
            $do->close();
            $conn->close();

            echo "<script>
                alert('Edited Successfully');
                window.location.href='../Admin_Interface/Suppliers_Interface.php';
                </script>";
            
        } catch(\Exception $e){
            $conn->close();
            die($e);
        }
        exit();
    }
?>