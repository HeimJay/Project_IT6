<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Edit Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'Aileron';
            src: url('path/to/aileron-regular.woff2') format('woff2'),
                url('path/to/aileron-regular.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Aileron', sans-serif;
            margin: 0;
            height: 100vh;
        }

        .full-page-div {
            position: relative;
            width: 100%;
            height: 100%;
            background-color: white;
            display: flex;
        }

        .side-page-div {
            position: absolute;
            width: 20%;
            height: 100%;
            background-color: rgb(216, 79, 79);
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            flex-direction: column;
            padding: 20px;
        }

        .main-content-div {
            position: absolute;
            left: 345px;
            width: 75%;
            height: 11%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            background-color: rgb(216, 79, 79);
            margin-top: 3 auto;
            margin: 0 auto;
            border-radius: 10px;
            padding: 10px;
        }

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

        .add-button {
            position: absolute;
            right: 40px;
            top: 103px;
            width: 10%;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(216, 79, 79);
            border-radius: 10px;
            padding: 1px;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .btn-danger {
            font-family: 'Aileron', sans-serif;
            font-size: 23px;
            border: 2px solid black;
            color: white;
            background-color: rgb(216, 79, 79);
        }

        .btn-danger:hover,
        .btn-danger:focus {
            color: black;
            background-color: white;
            border-color: black;
        }

        .btn-dark:hover,
        .btn-dark:focus {
            color: red;
            background-color: white;
            border-color: black;
        }

        .form-control {
            border: 2px solid red;
        }

        h5,
        h3 {
            font-weight: bold;
            color: white;
        }

        .dashboard-header {
            display: flex;
            align-items: center;
        }

        .dashboard-header h1 {
            font-weight: bold;
            color: white;
            margin-left: 10px;
            margin-bottom: 0px;
        }

        .add {
            display: flex;
            position: absolute;
            text-align: center;
            justify-content: center;
            right: 21px;
            top: 425px;
            width: 44%;
            border-radius: 5px;
            border-color: rgb(216, 79, 79);
        }

        .cancel {
            display: flex;
            position: absolute;
            text-align: center;
            justify-content: center;
            left: 56px;
            top: 425px;
            width: 44%;
            height: 40px;
            border-radius: 5px;
            background-color: black;
            color: white;
            text-decoration: none;
        }

        .cancel:hover,
        .cancel:focus {
            color: red;
            background-color: white;
            border-color: black;
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
            <a href="../Admin_Interface/Dashboard_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/dashboard.png" class="p-1" style="width: 20%; height: auto" alt="dashboard.png">Dashboard</a>
            <a href="../Admin_Interface/Stocks_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/ready-stock.png" class="p-1" style="width: 25%; height: auto" alt="ready-stock.png">Stocks</a>
            <a href="../Admin_Interface/ProductList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/procurement.png" class="p-1" style="width: 25%; height: auto" alt="procurement.png">Orders List</a>
            <a href="../Admin_Interface/Suppliers_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/wholesale.png" class="p-1" style="width: 23%; height: auto" alt="wholesale.png">Suppliers</a>

            <!--Maintenance-->
            <h3 class="m-5 mb-0">Maintenance</h3>
            <a href="../Admin_Interface/ItemList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/list-items.png" class="p-1" style="width: 20%; height: auto" alt="list-items.png">Employees</a>
            <a href="../Admin_Interface/ReturnList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
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
            </div>
        </div>

        


        <div class="view-content-div">
            <!-- Content goes here -->
            <div class="container">
                <div class="row">
                    <div class="col col-12" style="border-radius: 10px; height: 500px; background-color: white;">
                        <?php
                            include "../Database/db_connect.php";
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM stocks WHERE stock_ID={$id}";
                            $do = $conn->query($sql);
                            $row = $do->fetch_assoc();
                        
                        ?>
                        <div class="row justify-content-center text-center align-items-center " style="height: 70px;">
                            <div class="col col-9" style="background-color: rgb(216, 79, 79); border-radius:10px; color:white;">
                                
                                <h1>EDIT: <?php echo $row['item_name'] ?></h1>
                            </div>
                        </div>

                        <form action="../Database_Operations/execute_stock.php" method="post">
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="iname"><h4>Item Name:</h4></label>
                                    <input type="text" name="iname" id="iname" readonly class="form-control w-75" value="<?php echo $row['item_name'] ?>">
                                </div>
                                <div class="col col-4">
                                    <label for="sQty"><h4>In Stock:</h4></label>
                                    <input type="text" name="sQty" readonly id="sQty" class="form-control w-75" value="<?php echo $row['stock_quantity'] ?>">
                                </div>
                            
                            
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="srPrice"><h4>SR Price:</h4></label>
                                    <input type="text" name="srPrice" id="srPrice" class="form-control w-75" value="<?php echo $row['price'] ?>">
                                </div>
                                <div class="col">
                                    <label for="category"><h4>Category:</h4></label>
                                    <input type="text" name="category" id="category" class="form-control w-75" value="<?php echo $row['category'] ?>">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col col-6">
                                    <input type="text" name="delete_id" hidden value="<?php echo $row['stock_ID'] ?>">
                                    <button type="submit" class="btn btn-danger w-100" name="deleteStockBTN">Delete</button>
                                </div>
                                <div class="col col-6">
                                    <input type="text" name="edit_id" hidden value="<?php echo $row['stock_ID'] ?>">
                                    <button type="submit" class="btn btn-danger w-100" name="editStockBTN">Save</button>
                                </div>
                            </div>
                        </form>

                        <div class="row mt-3">
                            <div class="col col-12">
                            
                                <a href="../Admin_Interface/Stocks_Interface.php" class="btn btn-dark w-100" style="height: 50px; font-family: 'Aileron', sans-serif; font-size: 23px;">Cancel</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>