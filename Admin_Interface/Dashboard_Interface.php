<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style_adminInterface.css">
</head>

<?php
    include "../Database/db_connect.php";
    session_start();

    $emp_ID = $_SESSION['emp_login_ID'];

    try{
        $sql = "SELECT * FROM employees WHERE employee_ID='$emp_ID'";
        $do = $conn->query($sql);
        
        $empRow = $do->fetch_assoc();

    } catch(\Exception $e){
        die($e);
    }

?>

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
                <img src="../Images/dashboard.png" class="p-1" style="width: 8%; height: auto" alt="dashboard.png">
                <h1>Welcome, <?php echo $empRow['e_Name'] ?></h1>
            </div>

        </div>
        <div class="view-content-div">
            <div class="row border ms-0 justify-content-around" style="height: 530px; width: 1150px;">
                <div class="col col-6">


                    
                    <div class="row border p-1" style="height: 265px;">

                        <div class="col col-12">
                            <div class="row text-center align-items-center justify-content-center" style="height: 40px;">
                                <div class="col col-5 border" style="height: 35px; background-color: rgb(216, 79, 79); border-radius:10px;">
                                <h4 style="padding-top: 4px; color:white;">Recent Orders</h4>
                                </div>
                            </div>

                            <div class="row border" style="height: 220px; overflow:auto;">
                                <div class="col col-12">

                                    <?php
                                        include "../Database/db_connect.php";

                                        $cDate = date("Y-m-d");

                                        try{
                                            $sql = "SELECT * FROM orders_view WHERE order_date='$cDate' ";
                                            $do = $conn->query($sql);

                                            if($do->num_rows > 0){
                                                while($rows = $do->fetch_assoc()){


                                    ?>

                                        
                                        <div class="row align-items-center mt-2" style="height:50px; background-color:rgb(216, 79, 79); border-radius: 10px; color:white; ">
                                            
                                            <div class="col col-6">
                                                <span><strong>Name: </strong><?php echo $rows['c_name'] ?></span> <br>
                                                <span><strong>Item: </strong><?php echo $rows['item_name'] ?></span>
                                            </div>
                                            <div class="col col-6">
                                                <span><strong>Qty: </strong><?php echo $rows['order_quantity'] ?></span> <br>
                                                <span><strong>Date: </strong><?php echo $rows['order_date'] ?></span>
                                            </div>
                        
                                        </div>
                                    


                                    <?php
                                    
                                                }
                                            }else{
                                                echo "
                                                    <div class='row mt-2 py-2 justify-content-center'>
                                                        <div class='col col-5 text-center' style='background-color: rgb(216, 79, 79); border-radius:10px;color:white;'>
                                                        <Strong>No Current Orders</Strong>
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
                    <div class="row border p-1" style="height: 265px;">

                        <div class="col col-12">
                            <div class="row text-center align-items-center justify-content-center" style="height: 40px;">
                                <div class="col col-5 border" style="height: 35px; background-color: rgb(216, 79, 79); border-radius:10px;">
                                <h4 style="padding-top: 4px; color:white;">Stock In</h4>
                                </div>
                            </div>

                            <div class="row border" style="height: 220px; overflow:auto;">
                                <div class="col col-12">

                                    <?php
                                        include "../Database/db_connect.php";

                                        $cDate = date("Y-m-d");

                                        try{
                                            $sql = "SELECT * FROM stock_in_views ORDER BY arrival_date DESC ";
                                            $do = $conn->query($sql);

                                            if($do->num_rows > 0){
                                                while($rows = $do->fetch_assoc()){


                                    ?>

                                        
                                        <div class="row align-items-center mt-2" style="background-color:rgb(216, 79, 79); border-radius: 10px; color:white; ">
                                            
                                            <div class="col col-6">
                                                <span><strong>Employee Name:</strong></span> <br>
                                                <span>  <?php echo $rows['e_Name'] ?></span> <br>

                                                <span><strong>Supplier Name:</strong></span> <br>
                                                <span>  <?php echo $rows['s_Name'] ?></span> <br>

                                                <span><strong>Contact #:</strong></span> <br>
                                                <span>  <?php echo $rows['sContactNum'] ?></span> <br>

                                                
                                            </div>
                                            <div class="col col-6">

                                                <span><strong>Company:</strong></span> <br>
                                                <span>  <?php echo $rows['company_name'] ?></span> <br>

                                                <span><strong>Item:</strong></span> <br>
                                                <span>  <?php echo $rows['item_name'] ?></span> <br>

                                                <span><strong>Qty:</strong></span>
                                                <span>  <?php echo $rows['arrived_quantity'] ?></span> <br>

                                                <span><strong>Arrived Date:</strong></span> <br>
                                                <span>  <?php echo $rows['arrival_date'] ?></span> 
                                                
                                            </div>
                        
                                        </div>
                                    


                                    <?php
                                    
                                                }
                                            }else{
                                                echo "
                                                    <div class='row mt-2 py-2 justify-content-center'>
                                                        <div class='col col-5 text-center' style='background-color: rgb(216, 79, 79); border-radius:10px;color:white;'>
                                                        <Strong>No Current Orders</Strong>
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
                <div class="col col-6">

                    <div class="row border text-center align-items-center justify-content-center" style="height: 70px;">
                        <div class="col col-5 border" style="height: 50px; background-color: rgb(216, 79, 79); border-radius:10px;">
                            <h4 style="padding-top: 10px; color:white;">Low Stock Alert</h4>
                        </div>
                    </div>

                    <div class="row border p-1" style="height: 460px; overflow:auto;">
                        <div class="col col-12">

                            <?php
                                include "../Database/db_connect.php";


                                try{
                                    $sql = "SELECT * FROM stocks WHERE stock_quantity < 10";
                                    $do = $conn->query($sql);

                                    if($do->num_rows > 0){
                                        while($rows = $do->fetch_assoc()){


                            ?>

                                
                                <div class="row text-center align-items-center mt-2" style="height:50px; background-color:rgb(216, 79, 79); border-radius: 10px; color:white; ">
                                    
                                    <div class="col col-4">
                                        <span><strong>Name: </strong><?php echo $rows['item_name'] ?></span>
                                    </div>
                                    <div class="col col-5">
                                        <span><strong>Category: </strong><?php echo $rows['category'] ?></span>
                                    </div>
                                    <div class="col col-3">
                                        <span><strong>In Stock: </strong><?php echo $rows['stock_quantity'] ?></span>
                                    </div>
                                    
                                </div>
                            


                            <?php
                            
                                        }
                                    }else{
                                        echo "
                                            <div class='row mt-2 py-2 justify-content-center'>
                                                <div class='col col-5 text-center'>
                                                <Strong>No Low In Stock</Strong>
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