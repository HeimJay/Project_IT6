<?php
    include "../Database/db_connect.php";

    if(isset($_POST['addEmpBTN'])){
        // USED BY (Operations/do_addEmployee.php)

        try{
            $fname = $_POST['eFname'];
            $lname = $_POST['eLname'];
            $address = $_POST['eAddress'];
            $cont = $_POST['eContact'];
            $position = $_POST['ePosition'];
            $uname = $_POST['eUname'];
            $passwrd = $_POST['ePass'];

            $sql = "INSERT INTO employees(eFname, eLname, emp_position, eAddress, eContactNum, e_username, e_password) VALUES (?,?,?,?,?,?,?) ";
            $do = $conn->prepare($sql);
            $do->bind_param("sssssss", $fname, $lname, $position, $address, $cont, $uname, $passwrd);

            $do->execute();
            $do->close();
            $conn->close();

            echo "<script>
                alert('Added Employee');
                window.location.href='../Admin_Interface/ItemList_Interface.php';
            </script>";

        }catch(\Exception $e){
            $conn->close();
            die($e);
        }
        exit();

    }



?>