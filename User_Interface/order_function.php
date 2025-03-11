<?php
    include "../Database/db_connect.php";
    
    if(isset($_POST['placeOrderBTN'])){
        //USED BY (User_Interface/place_order.php)

        $custID = $_POST['custID'];
        $stockID = $_POST['stockID'];

        $sqty = $_POST['sqty'];
        $pqty = $_POST['pqty'];
        $odate = $_POST['odate'];
        $se = $_POST['selected_employee'];


        if(($sqty - $pqty) >= 0 ){

            try{

                $sql = "INSERT INTO orders(stock_ID, order_quantity, order_date, employee_ID, customer_ID) VALUES (?,?,?,?,?)";
                $do = $conn->prepare($sql);
                $do->bind_param("iisii", $stockID, $pqty, $odate, $se ,$custID);
                $do->execute();
    
                
    
    
            }catch(\Exception $e){
                
                die($e);
            }
    
    
    
            try{
                $sql = "UPDATE stocks SET stock_quantity=((SELECT stock_quantity FROM stocks WHERE stock_ID=?)-(SELECT order_quantity FROM orders ORDER BY order_ID DESC LIMIT 1)) 
                        WHERE stock_ID=?";
    
                $do = $conn->prepare($sql);
                $do->bind_param("ii", $stockID, $stockID);
                $do->execute();
    
                $do->close();
                $conn->close();
    
                echo "<script>
                    alert('Placed Order');
                    window.location.href='order_interface.php';
                </script>";
    
    
            }catch(\Exception $e){
                $conn->close();
                die($e);
            }
            
        }else{
            echo "<script>
            alert('Error | Not Enough Stock');
            window.location.href='order_interface.php';
            </script>";
            exit();

        }

        

        


    }



?>