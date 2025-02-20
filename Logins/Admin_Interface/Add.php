<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stock</title>
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
            background-color: white;
        }

        .full-page-div {
            width: 100%;
            height: 100%;
            display: flex;
        }

        .side-page-div {
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
            width: 80%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 20px;
        }

        .form-container {
            width: 50%;
            background-color: rgb(216, 79, 79);
            padding: 20px;
            border-radius: 10px;
            color: white;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            background-color: black;
            color: white;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: white;
            color: black;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="full-page-div">
        <div class="side-page-div">
            <div class="logo-container">
                <img src="Vulcanizing.png" style="width: 60%; height: auto;" alt="Vulcanizing.png">
                <h5 class="text-center" style="margin-left: 10px; color: white;">3G Tires Parts and Vulcanizing Shop</h5>
            </div>
            <!--Dashboard-->
            <a href="Dashboard_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="dashboard.png" class="p-1" style="width: 20%; height: auto" alt="dashboard.png">Dashboard</a>
            <a href="Stocks_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="ready-stock.png" class="p-1" style="width: 25%; height: auto" alt="ready-stock.png">Stocks</a>
            <a href="ProductList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="procurement.png" class="p-1" style="width: 25%; height: auto" alt="procurement.png">Product List</a>
            <a href="Suppliers_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="wholesale.png" class="p-1" style="width: 23%; height: auto" alt="wholesale.png">Suppliers</a>

            <!--Maintenance-->
            <h3 class="m-5 mb-0" style="color: white;">Maintenance</h3>
            <a href="ItemList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="list-items.png" class="p-1" style="width: 20%; height: auto" alt="list-items.png">Item List</a>
            <a href="ReturnList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
                <img src="document.png" class="p-1" style="width: 25%; height: auto" alt="document.png">Return List</a>

            <!--Sign-Out-->
            <a href="../User.php" class="btn btn-dark rounded-pill mx-auto d-flex align-items-center justify-content-center mt-5" style="width: 65%; height: 42px;">
                <img src="logout.png" class="p-1" style="width: 20%; height: auto" alt="logout.png">Sign Out</a>
        </div>
        <div class="main-content-div">
            <div class="form-container">
                <h2>Add New Stock</h2>
                <form method="post" action="Add.php">
                    <div class="form-group">
                        <label for="stock_name">Stock Name:</label>
                        <input type="text" id="stock_name" name="stock_name" required>
                    </div>
                    <div class="form-group">
                        <label for="stock_symbol">Stock Symbol:</label>
                        <input type="text" id="stock_symbol" name="stock_symbol" required>
                    </div>
                    <div class="form-group">
                        <label for="stock_price">Stock Price:</label>
                        <input type="number" step="0.01" id="stock_price" name="stock_price" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add Stock">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>