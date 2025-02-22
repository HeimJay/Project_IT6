<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Stocks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
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
            background-color: rgb(160, 157, 157);
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
            border: 2px solid black;
        }

        h5 {
            font-weight: bold;
            color: white;
        }

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
                <img src="../Images/list-items.png" class="p-1" style="width: 20%; height: auto" alt="list-items.png">Item List</a>
            <a href="ReturnList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/document.png" class="p-1" style="width: 25%; height: auto" alt="document.png">Return List</a>

            <!--Sign-Out-->
            <a href="../Logins/User.php" class="btn btn-dark rounded-pill mx-auto d-flex align-items-center justify-content-center mt-5" style="width: 65%; height: 42px;">
                <img src="../Images/logout.png" style="width: 20%; height: auto" alt="logout.png">Sign Out</a>
        </div>
        <div class="main-content-div mt-3">
            <div class="dashboard-header">
                <img src="../Images/ready-stock.png" class="p-1" style="width: 12%; height: auto" alt="dashboard.png">
                <h1>Stocks</h1>
            </div>
        </div>

        <a href="../Operations/Add.php" class="btn btn-danger rounded-pill add-button fs-3">
            <img src="../Images/add.png" style="width: 20%; height: auto" alt="add.png">Add</a>


        <div class="view-content-div">
            <!-- Content goes here -->

            <div class="container">

                <div class="row border r-header text-center align-items-center mb-2">
                    <div class="col col-2">Supplier Name</div>
                    <div class="col col-2">Item Name</div>
                    <div class="col col-2">Category</div>
                    <div class="col col-1">SRPrice</div>
                    <div class="col col-1">Qty.</div>
                    <div class="col col-2">Arrival Date:</div>
                    <div class="col col-2"></div>
                </div>
                <?php

                include '../Database/db_connect.php';
                try {
                    $sql = "SElECT * FROM vulcanizing";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                ?>

                            <div class="row text-center align-items-center r-body">
                                <div class="col col-2">
                                    <input type="text" hidden value="<?php echo $row['Supplier_ID'] ?>" name="sba">
                                    <strong><?php echo $row['Supplier_Name'] ?></strong>
                                </div>
                                <div class="col col-2">
                                    <strong><?php echo $row['Item_Name'] ?></strong>
                                </div>
                                <div class="col col-2">
                                    <span><?php echo $row['Category'] ?></span>
                                </div>
                                <div class="col col-1">
                                    <span><?php echo '₱ ' . $row['SR_Price'] ?></span>
                                </div>
                                <div class="col col-1">
                                    <span><?php echo $row['Quantity'] ?></span>
                                </div>
                                <div class="col col-2">
                                    <span><?php echo $row['Arrival_Date'] ?></span>
                                </div>
                                <div class="col col-2 d-flex justify-content-between">
                                    <form action="../Operations/Edit.php" method="get">
                                        <input type="text" hidden value="<?php echo $row['Supplier_ID'] ?>" name="sba">
                                        <button type="submit" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i> EDIT</button>
                                    </form>
                                    <form action="../Database_Operations/deleteSQL.php" method="post">
                                        <input type="text" hidden value="<?php echo $row['Supplier_ID'] ?>" name="sba">
                                        <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash"></i> DELETE</button>
                                    </form>
                                </div>
                                <div class="w-100"></div>
                            </div>
                <?php
                        }
                    }

                    $conn->close();
                } catch (\Exception $e) {
                    die($e);
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>