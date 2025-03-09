<?php
    include "../Database/header.html";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Orders List</title>
    
    <link rel="stylesheet" href="style_adminInterface.css">
   
    <style>

        .view-content-div {
            position: absolute;
            top: 160px;
            left: 345px;
            width: 75%;
            height: 75%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            background-color: rgb(211, 206, 206);
            margin-top: 5 auto;
            margin: 0 auto;
            border-radius: 10px;
            padding: 10px;
        }

    </style>
</head>

<body>
    <div class="full-page-div">
        <div class="side-page-div">
            <div class="logo-container">
                <img src="../Images/Vulcanizing.png" style="width: 60%; height: auto;" alt="Vulcanizing.png">
                <h5 class="text-center" style="margin-left: 10px;">3G Tires Parts and Vulcanizing Shop</h5>
            </div>
            <!--Dashboard-->
            <a href="Dashboard_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/dashboard.png" class="p-1" style="width: 20%; height: auto" alt="dashboard.png">Dashboard</a>
            <a href="Stocks_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/ready-stock.png" class="p-1" style="width: 25%; height: auto" alt="ready-stock.png">Stocks</a>
            <a href="ProductList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/procurement.png" class="p-1" style="width: 25%; height: auto" alt="procurement.png">Orders List</a>
            <a href="Suppliers_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/wholesale.png" class="p-1" style="width: 23%; height: auto" alt="wholesale.png">Suppliers</a>

            <!--Maintenance-->
            <h3 class="m-5 mb-0">Maintenance</h3>
            <a href="ItemList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/list-items.png" class="p-1" style="width: 20%; height: auto" alt="list-items.png">Employees</a>
            <a href="ReturnList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/document.png" class="p-1" style="width: 25%; height: auto" alt="document.png">Return List</a>

            <!--Sign-Out-->
            <form action="../User_Interface/function.php" method="post">
                <button type="submit" name="signoutBTN" class="btn btn-dark rounded-pill mx-auto d-flex align-items-center justify-content-center mt-5" style="width: 65%; height: 42px;">
                    <img src="../Images/logout.png" style="width: 20%; height: auto" alt="logout.png">Sign Out
                </button>
            </form>
        </div>
        <div class="main-content-div mt-3">
            <div class="dashboard-header">
                <img src="../Images/procurement.png" class="p-1" style="width: 22%; height: auto" alt="dashboard.png">
                <h1>Orders List</h1>
                
            </div>

        </div>
        <div class="view-content-div">
            <div class="row w-100 m-0" style="height: 500px;">
                <div class="col col-12">

                    <form action="" method="post">
                        <div class="row mx-0 align-items-center justify-content-center " style="height: 70px;">
 
                            <div class="col col-5 mt-2 p-1 border" style="background-color: rgb(216, 79, 79); border-radius:50px;">
                                <input type="text" name="sSearch" placeholder="Search" class="form-control rounded-pill border border-dark">
                            </div>
                            <div class="col col-1 mt-2 text-center border" style="background-color: rgb(216, 79, 79); border-radius:10px; padding-left: 8px; padding-top: 5px; padding-bottom: 5px;">
                                <button type="submit" name="prodSearchBTN" class="btn btn-waring"><i class="bi bi-search"></i></button>
                            </div>
    
                        </div>
                    </form>

                    <div class="row mt-1" style="height: 415px; overflow:auto;">
                        <div class="col col-12">

                            <?php
                                include "../Database/db_connect.php";

                                $sql;

                                if(isset($_POST['prodSearchBTN'])){
                                    $sValue = $_POST['sSearch'];

                                    $sql = "SELECT * FROM orders_view WHERE c_name LIKE '%$sValue%' OR
                                                                            item_name LIKE '%$sValue%' OR
                                                                            category LIKE '%$sValue%' OR
                                                                            order_date LIKE '%$sValue%'";
                                }else{
                                    $sql = "SELECT * FROM orders_view ORDER BY order_date DESC";
                                }

                                try{
                                    
                                    $result = $conn->query($sql);

                                    if($result->num_rows >0){
                                        while($rows = $result->fetch_assoc()){            
                            
                            ?>

                            
                                <div class="row border mt-1 py-2 " style="background-color: rgb(216, 79, 79); color:white; border-radius: 10px;">
                                    <div class="col col-6">
                                        <Strong>Name: </Strong>
                                        <span><?php echo $rows['c_name'] ?></span> <br>
                                        <strong>Contact #: </strong>
                                        <span><?php echo $rows['cContactNum'] ?></span> <br>
                                        <strong>Item name: </strong>
                                        <span><?php echo $rows['item_name'] ?></span> <br>
                                        <Strong>Category: </Strong>
                                        <span><?php echo $rows['category'] ?></span>
                                    </div>
                                    <div class="col col-6">
                                        <Strong>Unit Price: </Strong>
                                        <span><?php echo $rows['selling_price'] ?></span> <br>
                                        <strong>Qty: </strong>
                                        <span><?php echo $rows['order_quantity'] ?></span> <br>
                                        <strong>Total: </strong>
                                        <span><?php echo $rows['total_price'] ?></span> <br>
                                        <Strong>Date: </Strong>
                                        <span><?php echo $rows['order_date'] ?></span>
                                    </div>
                                    
                                </div>
                        

                            <?php
                                        }
                                    } else{

                                        echo "
                                            <div class='row mt-2 py-2 justify-content-center'>
                                                <div class='col col-5 text-center'>
                                                <Strong>No Result</Strong>
                                                </div>
                                            </div>
                                            ";
                                    }

                                } catch(\Exception $e){
                                    die($e);
                                }
                            ?>

                        </div>
                    </div>
                    
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>