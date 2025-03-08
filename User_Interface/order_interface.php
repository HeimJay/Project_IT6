<?php
    include "../Database/header.html";
    session_start();
    $custID = $_SESSION['login_ID'];

    include "../Database/db_connect.php";
    
    try{
        $sql = "SELECT * FROM customers WHERE customer_ID='$custID'";
        $do = $conn->query($sql);
        $row = $do->fetch_assoc();

        $_SESSION['custName'] = $row['cFname'];

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
                    <div class="col col-10 border mt-3 py-2" style="border-radius:10px;">
                        <span><h4 style="color: white;">Welcome, <?php echo $row['cFname'] ?></h4></span>
                    </div>

                    <div class="col col-10 mt-3">
                        <a href="history_order.php" class="btn btn-primary w-100">View Order/s History</a>
                    </div>

                    <div class="col col-10 mt-3">
                        <form action="function.php" method="POST">
                            <button type="submit" name="signoutBTN" class="btn btn-primary w-100">Sign out</button>

                        </form>
                        
                    </div>

                </div>

            </div>

            <!-- PANEL -->
            <div class="col col-9">

                <!-- HEADER -->
                <form action="order_interface.php" method="post">
                    <div class="row  mt-3 mx-4 justify-content-center" style="height: 70px; background-color: rgb(216, 79, 79); border-radius:10px;">
                        <div class="col col-3 " style="color:white; height: 70px;" >
                            <h2 class="pt-3">Item List:</h2>
                        </div>
                        <div class="col col-5 " style="color:white; height: 70px;" >
                            <input type="text" name="sSearch" class="form-control mt-3">
                    
                        </div>
                        <div class="col col-3  pt-3" style="color:white; height: 70px;" >
                    
                            <button class="btn btn-success" type="submit" name="stockSearch">Search</button>
                        </div>
                    </div>
                </form>

                <!-- FUNCTIONS/TOOLS -->
                <div class="row mx-4 mt-1" style="height: 50px;">
                    <div class="col">
                        
                    </div>
                </div>

                <!-- BODY -->
                <div class="row mx-4 mt-2" style="height: 530px;">
                    <div class="col col-12">

                        <!-- FOR STOCKS -->
                        <div class="row text-center align-items-center" style="background-color:rgb(216, 79, 79); border-radius:10px; color: white; height:50px;">
                            <div class="col col-3">
                                <h4 class="pt-2">Item Name:</h4>
                            </div>
                            <div class="col col-2">
                                <h4 class="pt-2">Category:</h4>
                            </div>
                            
                            <div class="col col-2">
                                <h4 class="pt-2">Price:</h4>
                            </div>
                            <div class="col col-2">
                                <h4 class="pt-2">In Stock:</h4>
                            </div>
                            
                            <div class="col col-3">
                                <h4 class="pt-2">Action:</h4>
                            </div>


                            <div class="col col-12 mt-4">
                    
                                <!--BODY-->
                                <div class="row " style="height: 400px; overflow:auto;">
                                    <div class="col col-12">

                                        <?php
                                            
                                            $sql;

                                            if(isset($_POST['stockSearch'])){
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

                                            <form action="place_order.php" method="POST">
                                                <div class="row text-center align-items-center mt-2" style="height:50px; background-color:rgb(216, 79, 79); border-radius: 10px; color:white; ">
                                                    <div class="col col-3">
                                                        <span><?php echo $rows['item_name'] ?></span>
                                                    </div>
                                                    <div class="col col-2">
                                                        <span><?php echo $rows['category'] ?></span>
                                                    </div>
                                                    <div class="col col-2">
                                                        <span>₱ <?php echo $rows['selling_price'] ?></span>
                                                    </div>
                                                    <div class="col col-2">
                                                        <span><?php echo $rows['stock_quantity'] ?></span>
                                                    </div>

                                                    <div class="col col-3">
                                                        <input type="text" hidden name="id" value="<?php echo $rows['stock_ID'] ?>">
                                                        <button type="submit" class="btn btn-success" style="width: 45px; height: 45px;"><i class="bi bi-cart-dash"></i></button>
                                                        
                                                    </div>
                                                </div>
                                            </form>


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


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>


</html>