<?php
    include "../Database/header.html";
    session_start();
    $custID = $_SESSION['login_ID'];

    include "../Database/db_connect.php";

    try{
        $sql = "SELECT * FROM customers WHERE customer_ID='$custID'";
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();



    }catch(\Exception $e){
        die($e);
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    
    <link rel="stylesheet" href="userStyle.css">
</head>

<body>

    <div class="container-fluid vh-100">
        <div class="row h-100">

            <!-- SIDE PANEL -->
            <div class="col col-3" style="background-color: rgb(216, 79, 79);">
                <div class="logo-container">
                    <img src="../Images/Vulcanizing.png" style="width: 90px; height: 70px;" alt="Vulcanizing.png">
                    <h5 class="text-center" style="margin-left: 10px;">3G Tires Parts and Vulcanizing Shop</h5>
                </div>

                <div class="row justify-content-center">
                    <div class="col col-10 mt-3 py-2 border" style="border-radius:10px;">
                        <span><h4 style="color: white;">Welcome, <?php echo $row['cFname'] ?></h4></span>
                    </div>

                    <div class="col col-10  mt-3">
                        <a href="history_order.php" class="btn btn-primary w-100">View Order/s History</a>
                    </div>

                    <div class="col col-10  mt-3">
                        <form action="function.php" method="POST">
                            <button type="submit" name="signoutBTN" class="btn btn-primary w-100">Sign out</button>

                        </form>
                        
                    </div>

                </div>

            </div>

            <!-- PANEL -->
            <div class="col col-9">

                <!-- HEADER -->
                <form action="history_order.php" method="post">
                    <div class="row  mt-3 mx-4 justify-content-center" style="height: 70px; background-color: rgb(216, 79, 79); border-radius:10px;">
                        <div class="col col-3 " style="color:white; height: 70px;" >
                            <h2 class="pt-3">History:</h2>
                        </div>
                        <div class="col col-5 " style="color:white; height: 70px;" >
                            <input type="text" name="sSearch" class="form-control mt-3">
                           
                    
                        </div>
                        <div class="col col-2  pt-3" style="color:white; height: 70px;" >
                    
                            <button class="btn btn-success" name="histSearch">Search</button>
                        </div>
                        <div class="col col-2  pt-3" style="color:white; height: 70px;" >
                    
                            <a href="order_interface.php" class="btn btn-primary">Go Back</a>
                        </div>
                    </div>
                </form>

                <!-- FUNCTIONS/TOOLS -->
                <div class="row  mx-4 mt-2" style="height: 590px;overflow-y:auto;">
                    <div class="col col-12">
                        
                        <div class="row">
                            <div class="col col-12">
                                

                                <?php
                                    

                                    $sql;

                                    if(!empty($_POST['sSearch'])){
                                        $sValue = $_POST['sSearch'];
                                        $custID = $_SESSION['login_ID'];
    

                                        $sql = "SELECT * FROM orders_view WHERE customer_ID LIKE '$custID' AND 
                                                                                CONCAT (c_name LIKE '%$sValue%' OR
                                                                                item_name LIKE '%$sValue%' OR
                                                                                category LIKE '%$sValue%' OR
                                                                                order_date LIKE '%$sValue%')";
                                    }else{
                                        $custID = $_SESSION['login_ID'];
                                        $sql = "SELECT * FROM orders_view WHERE customer_ID='$custID' ORDER BY order_date DESC";
                                    }

                                    try{
                            
                                        $result = $conn->query($sql);

                                        if($result->num_rows >0){
                                            while($rows = $result->fetch_assoc()){            
                                
                                ?>

                            
                                    <div class="row border mt-2 py-2 " style="background-color: rgb(216, 79, 79); color:white; border-radius: 10px;">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>


</html>