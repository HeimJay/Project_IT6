<?php
    include "../Database/db_connect.php";

    if(isset($_POST['addStockBTN'])){
        try{

            $iname = $_POST['iname'];
            $category = $_POST['category'];
            $price = $_POST['price'];
    
            $sql = "INSERT INTO stocks(item_name, category, price) VALUES (?,?,?)";
            $do = $conn->prepare($sql);
            $do->bind_param("ssi", $iname, $category, $price);
    
            $do->execute();
            $do->close();
            $conn->close();
    
            echo "<script>
                    alert('Added Item');
                    window.location.href = '../Admin_Interface/Stocks_Interface.php';
            </script>";
    
        }catch(\Exception $e){
    
            $conn->close();
            die($e);
        }
        exit();
    }

    if(isset($_POST['editStockBTN'])){

        $editID = $_POST['edit_id'];
        $iName = $_POST['iname'];
        $sQty = $_POST['sQty'];
        $sPrice = $_POST['srPrice'];
        $cat = $_POST['category'];

        try{
            $sql = "UPDATE stocks SET item_name=?, category=?, price=?, stock_quantity=? WHERE stock_ID={$editID}";
            $do = $conn->prepare($sql);
            $do->bind_param("ssii", $iName, $cat, $sPrice, $sQty);

            $do->execute();
            $do->close();
            $conn->close();

            echo "<script>
            alert('UPDATED:');
            window.location.href = '../Admin_Interface/Stocks_Interface.php';
            </script>";

        }catch(\Exception $e){

            $conn->close();
            die($e);
        }
        exit();

    }


?>