<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Add Stock</title>
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
                <img src="../Images/procurement.png" class="p-1" style="width: 25%; height: auto" alt="procurement.png">Product List</a>
            <a href="../Admin_Interface/Suppliers_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/wholesale.png" class="p-1" style="width: 23%; height: auto" alt="wholesale.png">Suppliers</a>

            <!--Maintenance-->
            <h3 class="m-5 mb-0">Maintenance</h3>
            <a href="../Admin_Interface/ItemList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="../Images/list-items.png" class="p-1" style="width: 20%; height: auto" alt="list-items.png">Item List</a>
            <a href="../Admin_Interface/ReturnList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
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

        


        <div class="view-content-div">
            <!-- Content goes here -->
            <div class="container">
                <div class="row">
                    <div class="col col-12">
                        <div class="row">
                            <div class="col " style="border-radius: 10px; height: 500px; background-color: white;">

                                <div class="row justify-content-center align-items-center mb-5" style="height: 70px;">
                                    <div class="col col-2" style="color: white; border-radius: 10px; background-color: rgb(216, 79, 79);">
                                        <h2 style="text-align: center; margin-top: 3px;">Add Stock</h2>
                                    </div>

                                </div>

                                <form action="../Database_Operations/execute_addStock.php" method="post">
                                    <div class="row">

                                        <div class="col col-3 mt-3">
                                        
                                            <label for="selected_supplier"><h4>Supplier ID:</h4></label>
                                            
                                            <select name="selected_supplier" id="selected_supplier" class="form-select">

                                                <option value="">None</option>
                                                <?php
                                                    include "../Database/db_connect.php";
                                                    $sql = "SELECT * FROM suppliers";
                                                    $do = $conn->query($sql);
                                                    while($row = $do->fetch_assoc()){
                                                        echo '<option value="' . $row['supplier_ID'] . '"> '. $row['supplier_name'] . ' </option>';
                                                    }
                                                ?>

                                            </select>
                                        </div>

                                        <div class="col col-3 mt-3">
                                        
                                            <label for="selected_employee"><h4>Employee ID:</h4></label>
                                            
                                            <select name="selected_employee" id="selected_employee" class="form-select">

                                                <option value="">None</option>
                                                <?php
                                                    include "../Database/db_connect.php";
                                                    $sql = "SELECT * FROM employees";
                                                    $do = $conn->query($sql);
                                                    while($row = $do->fetch_assoc()){
                                                        echo '<option value="' . $row['employee_ID'] . '"> '. $row['employee_name'] . ' </option>';
                                                    }
                                                ?>

                                            </select>
                                        </div>

                                        <div class="col col-6 mt-3">
                                            <label for="iname"><h4>Item Name:</h4></label> <br>
                                            <input type="text" name="iname" id="iname" class="form-control" required>
                                        </div>

                                        <div class="w-100"></div>

                                        <div class="col col-3 mt-3">
                                            <label for="aqty"><h4>Arrived Quantity:</h4></label> <br>
                                            <input type="text" name="aqty" id="aqty" class="form-control" required>
                                        </div>

                                        <div class="col col-3 mt-3">
                                            <label for="category"><h4>Category:</h4></label> <br>
                                            <input type="text" name="category" id="category" class="form-control" required>
                                        </div>

                                        <div class="col col-3 mt-3">
                                            <label for="sprice"><h4>SR Price:</h4></label> <br>
                                            <input type="text" name="sprice" id="sprice" class="form-control" required>
                                        </div>

                                        <div class="col col-3 mt-3">
                                            <label for="date"><h4>Date:</h4></label> <br>
                                            <input type="date" name="date" id="date" class="form-control" required>
                                        </div>


                                        
                                    </div>
                                    <button class="add btn-danger" type="submit">Add</button>
                                    <a href="../Admin_Interface/Stocks_Interface.php" class="cancel btn-dark fs-4">Cancel</a>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>