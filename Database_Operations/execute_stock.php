<?php
    include "../Database/db_connect.php";

    if(isset($_POST['addStockBTN'])){
        try{

            $iname = $_POST['iname'];
            $category = $_POST['category'];
            $price = $_POST['price'];

            $check_stock = "SELECT item_name FROM stocks WHERE item_name ='$iname' ";
            $check_do = $conn->query($check_stock);
            
            if($check_do->num_rows > 0){
                echo "<script>
                    alert('Item Already In Stock');
                    window.location.href = '../Operations/do_addStock.php';
                </script>";
                exit();
            }
    
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

    if(isset($_POST['deleteStockBTN'])){

        $delID = $_POST['delete_id'];

        try{
            $sql = "DELETE FROM stocks WHERE stock_ID=?";
            $do = $conn->prepare($sql);
            $do->bind_param("i", $delID);

            $do->execute();
            $do->close();
            $conn->close();

            echo "<script>
            alert('DELETED:');
            window.location.href = '../Admin_Interface/Stocks_Interface.php';
            </script>";

        }catch(\Exception $e){

            $conn->close();
            die($e);
        }
        exit();

    }


?>