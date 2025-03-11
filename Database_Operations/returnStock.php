<?php

    include "../Database/db_connect.php";

    if(isset($_POST['returnBTN'])){

        $selItem = $_POST['selected_item'];
        $selSupp = $_POST['selected_supplier'];
        $retQty = $_POST['retQty'];
        $retDate = $_POST['retDate'];
        $selEmp = $_POST['selected_employee'];

        try{

            $check = "SELECT * FROM stocks WHERE stock_ID ='$selItem' ";
            $do_check = $conn->query($check);
            $row = $do_check->fetch_assoc();

        }catch(\Exception $e){
            die($e);
        }
        $itemQty = $row['stock_quantity'];

        if(($itemQty - $retQty) >= 0 ){

            try{
            
                $sql = "INSERT INTO `returns`(stock_ID, supplier_ID, return_quantity, return_date, employee_ID) VALUES (?,?,?,?,?) ";
                $do = $conn->prepare($sql);
                $do->bind_param("iiisi", $selItem, $selSupp, $retQty, $retDate, $selEmp);
    
                $do->execute();
        
    
            }catch(\Exception $e){
                die($e);
            }
    
            try{
                $sql = "UPDATE stocks SET stock_quantity=((SELECT stock_quantity FROM stocks WHERE stock_ID=?)-(SELECT return_quantity FROM `returns` ORDER BY return_ID DESC LIMIT 1)) 
                        WHERE stock_ID=?";
    
                $do = $conn->prepare($sql);
                $do->bind_param("ii", $selItem, $selItem);
                $do->execute();
    
                $do->close();
                $conn->close();
    
                echo "<script>
                    alert('Success');
                    window.location.href='../Admin_Interface/ReturnList_Interface.php';
                </script>";
    
    
            }catch(\Exception $e){
                $conn->close();
                die($e);
            }

        }else{
            echo "<script>
                alert('Cannot Return Item | Not Enough Stock');
                window.location.href='../Admin_Interface/ReturnList_Interface.php';
                </script>";
        }
        
        





    }

?>