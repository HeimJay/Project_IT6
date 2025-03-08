<?php
    include "../Database/header.html";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Stocks</title>
    <link rel="stylesheet" href="style_adminInterface.css">

    <style>

        .view-content-div {
            position: absolute;
            top: 160px;
            left: 345px;
            width: 75%;
            height: 75%;
            display: flex;

            background-color: rgb(211, 206, 206);
            margin-top: 5 auto;
            margin: 0 auto;
            border-radius: 10px;
            padding-left: 22px;
            padding-top: 10px;
        }

        .function-buttons {
            position: absolute;
            right: 40px;
            top: 103px;
            width: 500px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            
            border-radius: 10px;
            padding: 1px;
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
                <img src="../Images/procurement.png" class="p-1" style="width: 25%; height: auto" alt="procurement.png">Product List</a>
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
                <img src="../Images/ready-stock.png" class="p-1" style="width: 12%; height: auto" alt="dashboard.png">
                <h1>Stocks</h1>

                <form action="" method="post">

                    <div class="row ms-5 w-100" style="height: 70px;">

                        <div class="col col-8 mt-3" >
                           <input type="text" name="sSearch" placeholder="Search" class="form-control">
                        </div>
                        <div class="col col-2 mt-3">
                            <button type="submit" name="stockSearchBTN" class="btn btn-success">Search</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!-- FUNCTION TOOLS -->

        <div class="row justify-content-around align-items-center text-center function-buttons" style="height: 50px;">
            <div class="col col-5 p-0 m-0" style="background-color: rgb(216, 79, 79); height:40px; border-radius:5px;">
                <a href="../Operations/do_stockIn.php" class="btn btn-danger" style="height: 40px; width:210px;">Stock In</a>
                
            </div>
            <div class="col col-5 p-0 m-0" style="background-color: rgb(216, 79, 79); height:40px; border-radius:10px;">
                <a href="../Operations/do_addStock.php" class="btn btn-danger" style="height: 40px; width:210px;">Add Stock</a>
            </div>
        </div>

       

        


        <div class="view-content-div">
            <!-- Content goes here -->

            <div class="row  w-100" style="height: 490px;">
                
                <div class="col col-12">
                    <!--HEADER-->
                    <div class="row text-center align-items-center" style="background-color:rgb(216, 79, 79); border-radius:10px; color: white; height:70px;">
                        <div class="col col-2">
                            <h4>Item Name:</h4>
                        </div>
                        <div class="col col-2">
                            <h4>Category:</h4>
                        </div>
                        <div class="col col-2">
                            <h4>Unit Price:</h4>
                        </div>
                        <div class="col col-2">
                            <h4>Price:</h4>
                        </div>
                        <div class="col col-2">
                            <h4>In Stock:</h4>
                        </div>
                        
                        <div class="col col-2">
                            <h4>Action:</h4>
                        </div>
                    </div>


                </div>

                
                <div class="col col-12">
                    
                    <!--BODY-->
                    <div class="row " style="height: 400px; overflow:auto;">
                        <div class="col col-12">

                            <?php
                                include "../Database/db_connect.php";

                                $sql;

                                if(isset($_POST['stockSearchBTN'])){

                                    $sValue = $_POST['sSearch'];

                                    $sql = "SELECT * FROM stocks WHERE item_name LIKE '%$sValue%' OR
                                                                            category LIKE '%$sValue%'";

                                }else{
                                    $sql = "SELECT * FROM stocks";
                                }

                                try{
                                    
                                    $do = $conn->query($sql);

                                    if($do->num_rows > 0){
                                        while($rows = $do->fetch_assoc()){


                            ?>

                                <form action="../Operations/do_edit_stock.php" method="get">
                                    <div class="row text-center align-items-center mt-2" style="height:50px; background-color:rgb(216, 79, 79); border-radius: 10px; color:white; ">
                                        
                                            <div class="col col-2">
                                                <span><?php echo $rows['item_name'] ?></span>
                                            </div>
                                            <div class="col col-2">
                                                <span><?php echo $rows['category'] ?></span>
                                            </div>
                                            <div class="col col-2">
                                                <span><?php echo $rows['price'] ?></span>
                                            </div>
                                            <div class="col col-2">
                                                <span><?php echo $rows['selling_price'] ?></span>
                                            </div>
                                            <div class="col col-2">
                                                <span><?php echo $rows['stock_quantity'] ?></span>
                                            </div>
                                            <div class="col col-2">
                                                <input type="text" hidden name="id" value="<?php echo $rows['stock_ID'] ?>">
                                                <button type="submit" class="btn btn-success" style="width: 45px; height: 45px;"><i class="bi bi-gear-fill"></i></button>
                                            
                                            </div>
                                        
                                    </div>
                                </form>


                            <?php
                            
                                        }
                                    }else{
                                        echo "
                                            <div class='row mt-2 py-2 justify-content-center'>
                                                <div class='col col-5 text-center'>
                                                <Strong>No Result</Strong>
                                                </div>
                                            </div>
                                            ";
                                    }

                                }catch(\Exception $e){
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