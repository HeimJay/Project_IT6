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

            $check_emp = "SELECT eFname, eLname FROM employees WHERE eFname ='$fname' AND eLname='$lname' ";
            $check_do = $conn->query($check_emp);
            
            if($check_do->num_rows > 0){
                echo "<script>
                    alert('Name is Already in Use');
                    window.location.href = '../Operations/do_addEmployee.php';
                </script>";
                exit();
            }

            $check_emp_usr = "SELECT e_username FROM employees WHERE e_username ='$uname' ";
            $check_do_usr = $conn->query($check_emp_usr);
            
            if($check_do_usr->num_rows > 0){
                echo "<script>
                    alert('Username is Already in Use');
                    window.location.href = '../Operations/do_addEmployee.php';
                </script>";
                exit();
            }

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

    if(isset($_POST['editEmpBTN'])){

        try{
            $empID = $_POST['empID'];

            $fname = $_POST['eFname'];
            $lname = $_POST['eLname'];
            $address = $_POST['eAddress'];
            $cont = $_POST['eContact'];
            $position = $_POST['ePosition'];
            $uname = $_POST['eUname'];
            $passwrd = $_POST['ePass'];

            $sql = "UPDATE employees SET eFname=?, eLname=?, emp_position=?, eAddress=?, eContactNum=?, e_username=?, e_password=? WHERE employee_ID='$empID' ";
            $do = $conn->prepare($sql);
            $do->bind_param("sssssss", $fname, $lname, $position, $address, $cont, $uname, $passwrd);

            $do->execute();
            $do->close();
            $conn->close();

            echo "<script>
                alert('Edited: ". $fname ."');
                window.location.href='../Admin_Interface/ItemList_Interface.php';
            </script>";

        }catch(\Exception $e){
            $conn->close();
            die($e);
        }
        exit();
    }



?>