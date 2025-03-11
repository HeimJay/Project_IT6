<?php
    include "../Database/db_connect.php";
    include "../Database/header.html";

    session_start();

    $custID = $_SESSION['login_ID'];
    $custName = $_SESSION['custName'];


    $id = $_POST['id'];
    try{
        $sql = "SELECT * FROM stocks WHERE stock_ID='$id' ";
        $do = $conn->query($sql);

        $row = $do->fetch_assoc();

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
                    <div class="col col-10 border mt-3 py-2">
                    <span><h4 style="color: white;">Welcome, <?php echo $custName ?></h4></span>
                    </div>

                    <div class="col col-10 mt-3">
                        <a href="user_account.php" class="rounded-pill btn btn-danger w-100">Account</a>
                    </div>

                    <div class="col col-10 mt-3">
                        <a href="order_interface.php" class="rounded-pill btn btn-danger w-100">Order</a>
                    </div>

                    <div class="col col-10 mt-3">
                        <a href="history_order.php" class="rounded-pill btn btn-danger w-100">View Order/s History</a>
                    </div>

                    <div class="col col-10 mt-3">
                        <form action="function.php" method="POST">
                            <button type="submit" name="signoutBTN" class="rounded-pill btn btn-danger w-100">Sign out</button>

                        </form>
                        
                    </div>

                </div>

            </div>

            <!-- PANEL -->
            <div class="col col-9">

                <!-- HEADER -->
                <div class="row  mt-3 mx-4 justify-content-center" style="height: 70px; background-color: rgb(216, 79, 79); border-radius:10px;">
                    <div class="col col-3 " style="color:white; height: 70px;" >
                        <h2 class="pt-3 text-center">Order Item:</h2>
                    </div>


                </div>

                <!-- FUNCTIONS/TOOLS -->
                <div class="row border mx-4 mt-2" style="height: 50px;">
                    <div class="col">
                        <h1>functions here!!!</h1>
                    </div>
                </div>

                <!-- BODY -->
                <div class="row border mx-4 mt-2" style="height: 530px;">
                    <div class="col col-12">

                        <form action="order_function.php" method="POST">
                            <div class="row border">
                                <div class="col col-3">
                                    <label for="iname"><h4>Item Name:</h4></label>
                                    <input type="text"   readonly name="iname" class="form-control" value="<?php echo $row['item_name'] ?>">
                                </div>
                                <div class="col col-2">
                                    <label for="sqty"><h4>In Stock:</h4></label>
                                    <input type="text"  readonly name="sqty" class="form-control" value="<?php echo $row['stock_quantity'] ?>">
                                </div>
                                <div class="col col-2">
                                    <label for="price"><h4>Price:</h4></label>
                                    <input type="text"   readonly name="price" class="form-control" value="<?php echo $row['selling_price'] ?>">
                                </div>
                                <div class="col col-1"> 
                                    <label for="pqty"><h4>Qty:</h4></label>
                                    <input type="text" name="pqty" required class="form-control" placeholder="Qty">
                                </div>
                                <div class="col col-2">
                                    <label for="odate"><h4>Date:</h4></label>
                                    <input type="date" name="odate" required class="form-control">
                                </div>
                                <div class="col col-2">
                                    <label for="odate"><h4>Employee:</h4></label>
                                    <select name="selected_employee" id="selected_employee" class="form-select">

                                        <option value="">None</option>
                                        <?php
                                            include "../Database/db_connect.php";
                                            $sql = "SELECT * FROM employees";
                                            $do = $conn->query($sql);
                                            while($row = $do->fetch_assoc()){
                                                echo '<option value="' . $row['employee_ID'] . '"> '. $row['e_Name'] . ' </option>';
                                            }
                                        ?>

                                    </select>
                                </div>

                            </div>
                            <div class="row border">
                                <div class="col col-12 mt-4">
                                    <input type="text" name="custID" hidden value="<?php echo $custID ?>">
                                    <input type="text" name="stockID" hidden value="<?php echo $id ?>">
                                    <button type="submit" name="placeOrderBTN" class="btn btn-success w-100">Place Order</button>
                                </div>
                                <div class="col col-12 mt-4">
                                    <a href="order_interface.php"  class="btn btn-success w-100">Cancel</a>
                            
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>


</html>