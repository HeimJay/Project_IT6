

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <img src="../Images/document.png" style="width: 10%; height: auto" alt="dashboard.png">
                <h1>Return List</h1>
            </div>

        </div>
        <div class="view-content-div">
            <div class="row w-100 m-0" style="height: 500px;">
                <div class="col col-12">

                    
                    <form action="" method="post">
                        <div class="row">
                            <div class="col col-5 mt-2">
                                <input type="text" name="searchVal" id="searchVal" placeholder="Search" class="form-control">
                            </div>
                            <div class="col col-2 mt-2">
                                
                                <button type="submit" name="empSearchBTN" class="btn btn-success">Search</button>
                                
                            </div>
                            <div class="col col-2"></div>
                        
                            <div class="col col-3 text-center">
                                <a href="../Operations/do_Retun.php" class="btn btn-danger">Return Item</a>
                            </div>
                        
                        </div>
                    </form>



                    <div class="row" style="height: 450px; overflow-y:auto;">
                        <div class="col col-12">
                            <?php
                                include "../Database/db_connect.php";

                                
                                $sql;

                                if(isset($_POST['empSearchBTN'])){
                                    $sValue = $_POST['searchVal'];

                                    $sql = "SELECT * FROM retuns_view WHERE item_name LIKE '%$sValue%' OR
                                                                            category LIKE '%$sValue%' OR
                                                                            return_date LIKE '%$sValue%' OR
                                                                            e_Name LIKE '%$sValue%'";

                                    

                                }else{
                                    $sql = "SELECT * FROM retuns_view";
                                }

                                try{

                                    
                                    $result = $conn->query($sql);

                                    if($result->num_rows >0){
                                        while($rows = $result->fetch_assoc()){            
                        
                            ?>

                            
                            <div class="row mt-2 py-2 justify-content-center" style="background-color: rgb(216, 79, 79); color:white; border-radius: 10px;">
                                <div class="col col-5">
                                    <Strong>Item Name: </Strong>
                                    <span><?php echo $rows['item_name'] ?></span> <br>
                                    <strong>Category #: </strong>
                                    <span><?php echo $rows['category'] ?></span> <br>
                                    <strong>Qty: </strong>
                                    <span><?php echo $rows['return_quantity'] ?></span>
                                </div>
                                <div class="col col-5">
                                    <Strong>Return Date: </Strong>
                                    <span><?php echo $rows['return_date'] ?></span> <br>
                                    <strong>Employee: </strong>
                                    <span><?php echo $rows['e_Name'] ?></span> <br>
                                </div>
                                <div class="col col-2">
                                    <form action="" method="POST">
                                        <input type="text" name="returnID" hidden value="<?php echo $rows['return_ID'] ?>">
                                        <input type="text" name="stockID" hidden value="<?php echo $rows['stock_ID'] ?>">
                                        <button type="submit" class="btn btn-success mt-3" name="deleteBTN"><i class="bi bi-trash"></i> DELETE</button>
                                    </form>

                                </div>
                            </div>
                       

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