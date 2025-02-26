<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Suppliers</title>
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
            
            background-color: rgb(211, 206, 206);
            margin-top: 5 auto;
            margin: 0 auto;
            border-radius: 10px;
            padding-left: 22px;
            padding-top: 10px;
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
                <img src="../Images/wholesale.png" class="p-1" style="width: 11%; height: auto" alt="dashboard.png">
                <h1>Suppliers</h1>
            </div>

            

        </div>
        <div class="view-content-div">

            <div class="row w-100 justify-content-center" style="height: 50px;">
                <div class="col col-8 text-center">
                    <h1>Add New Supplier:</h1>
                </div>
            </div>
            <div class="row w-100 justify-content-center align-items-center" style="height: 450px;">
                <div class="col col-8">
                    
                    <form action="execute_addSuppliers.php" method="POST">
                        <div class="row ">
                            <div class="col">
                                <label for="sfname"><h4>First Name:</h4></label>
                                <input type="text" name="sfname" id="sfname" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="slname"><h4>Last Name:</h4></label>
                                <input type="text" name="slname" id="slname" class="form-control" required>
                            </div>
                            <div class="w-100"></div>
                            <div class="col mt-2">
                            <label for="cname"><h4>Company:</h4></label>
                            <input type="text" name="cname" id="cname" class="form-control" required>
                            </div>
                        
                        </div>
                        <div class="row mt-5">
                            <div class="col-col-12">
                                <button type="submit" class="btn btn-primary w-100">Add Supplier</button>
                            </div>
                        </div>
                    </form>


                    <div class="row mt-3">
                        <div class="col-col-12">
                            <a href="../Admin_Interface/Suppliers_Interface.php" class="btn btn-outline-primary w-100">Cancel</a>
                        </div>
                    </div>


                </div>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>