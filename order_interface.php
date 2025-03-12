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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="userStyle.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .item-row {
            background-color: white; /* Change this to your desired background color */
            border-radius: 10px;
            color: black; /* Change this to your desired text color */
            margin-bottom: 10px; /* Add some space between rows */
        }
    </style>
</head>

<body>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Sidebar -->
            <div class="col-3 bg-danger text-white p-3">
                <div class="text-center">
                    <img src="../Images/Vulcanizing.png" class="img-fluid rounded-circle mb-2" style="width: 70%;">
                    <h5>3G Tires Parts and Vulcanizing Shop</h5>
                </div>

                <div class="mt-3">
                    <div class="border p-1 rounded text-center">
                        <h4>Welcome, <?php echo $row['cFname'] ?></h4>
                    </div>

                    <div class="mt-3">
                        <a href="user_account.php" class="nav-link text-white rounded-pill btn btn-outline-dark">Account</a>
                    </div>

                    <div class="mt-3">
                        <a href="history_order.php" class="nav-link text-white rounded-pill btn btn-outline-dark">View Order/s History</a>
                    </div>

                    <div class="mt-3">
                        <form action="function.php" method="POST">
                            <button type="submit" name="signoutBTN" class="btn btn-dark w-100">Sign out</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-9 p-4">
                <form action="order_interface.php" method="post" class="d-flex justify-content-between align-items-center mb-4">
                    <h1><img src="../Images/document.png" width="40"> Item List:</h1>
                    <div class="d-flex">
                        <input type="text" name="sSearch" class="form-control me-2">
                        <button class="btn btn-success" type="submit" name="stockSearch">Search</button>
                    </div>
                </form>

                <div class="card border-danger">
                    <div class="card-header bg-danger text-white text-center">
                        <h5>Item List</h5>
                    </div>
                    <div class="card-body overflow-auto" style="max-height: 400px;">
                        <div class="row text-center align-items-center mb-2" style="background-color:rgb(216, 79, 79); border-radius:10px; color: white;">
                            <div class="col-3"><h4>Item Name:</h4></div>
                            <div class="col-2"><h4>Category:</h4></div>
                            <div class="col-2"><h4>Price:</h4></div>
                            <div class="col-2"><h4>In Stock:</h4></div>
                            <div class="col-3"><h4>Action:</h4></div>
                        </div>

                        <?php
                            $sql;

                            if(isset($_POST['stockSearch'])){
                                $sValue = $_POST['sSearch'];

                                $sql = "SELECT * FROM stocks WHERE item_name LIKE '%$sValue%' OR category LIKE '%$sValue%'";
                            }else{
                                $sql = "SELECT * FROM stocks";
                            }

                            try{
                                $do = $conn->query($sql);

                                if($do->num_rows > 0){
                                    while($rows = $do->fetch_assoc()){
                        ?>
                            <form action="place_order.php" method="POST">
                                <div class="row text-center align-items-center mb-2 item-row">
                                    <div class="col-3"><?php echo $rows['item_name'] ?></div>
                                    <div class="col-2"><?php echo $rows['category'] ?></div>
                                    <div class="col-2">₱ <?php echo $rows['selling_price'] ?></div>
                                    <div class="col-2"><?php echo $rows['stock_quantity'] ?></div>
                                    <div class="col-3">
                                        <input type="text" hidden name="id" value="<?php echo $rows['stock_ID'] ?>">
                                        <button type="submit" class="btn btn-success"><i class="bi bi-cart-dash"></i></button>
                                    </div>
                                </div>
                            </form>
                        <?php
                                    }
                                } else{
                                    echo "<div class='text-center text-danger'><strong>No Result</strong></div>";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>