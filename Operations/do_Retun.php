<?php
    include "../Database/db_connect.php";
    session_start();
    $id = $_SESSION['emp_login_ID']; 
    try{
        $sql = "SELECT * FROM employees WHERE employee_ID='$id'";
        $do = $conn->query($sql);
        
        $empRow = $do->fetch_assoc();

    } catch(\Exception $e){
        die($e);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Admin_Interface/style_adminInterface.css">
    
    <style>

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
                <img src="../Images/document.png" style="width: 10%; height: auto" alt="dashboard.png">
                <h1>Return List</h1>
            </div>

        </div>
        <div class="view-content-div">
            <div class="row border w-100 m-0" style="height: 500px;">
                <div class="col col-12">

                    <form action="../Database_Operations/returnStock.php" method="post">
                        <div class="row border justify-content-around">
                            
                            <div class="col col-4 mt-5">
                                            
                                <label for="selected_item"><h4>Stock ID/Name:</h4></label>
                                
                                <select name="selected_item" id="selected_item" class="form-select">

                                    <option value="">None</option>
                                    <?php

                                        try{
                                            include "../Database/db_connect.php";
                                            $sql = "SELECT * FROM stocks";
                                            $do = $conn->query($sql);
                                            while($row = $do->fetch_assoc()){
                                                echo '<option value="' . $row['stock_ID'] . '"> '. $row['item_name'] . ' </option>';
                                            }
                                        }catch(\Exception $e){
                                            die($e);
                                        }
                                    ?>

                                </select>
                            </div>

                            <div class="col col-4 mt-5">
                                        
                                <label for="selected_supplier"><h4>Supplier ID/Name:</h4></label>
                                
                                <select name="selected_supplier" id="selected_supplier" class="form-select">

                                    <option value="">None</option>
                                    <?php
                                        
                                        try{
                                            include "../Database/db_connect.php";
                                            $sql = "SELECT * FROM suppliers";
                                            $do = $conn->query($sql);
                                            while($row = $do->fetch_assoc()){
                                                echo '<option value="' . $row['supplier_ID'] . '"> '. $row['s_Name'] . ' </option>';
                                            }

                                        }catch(\Exception $e){
                                            die($e);
                                        }
                                    ?>

                                </select>
                            </div>

                            


                        </div>
                        <div class="row border justify-content-center">
                            <div class="col col-3 mt-3">
                                <label for="sel_emp"><h4>Employee:</h4></label> <br>
                                <input type="text" name="selected_employee" hidden value="<?php echo $id ?>">
                                <input type="text" disabled readonly class="form-control" value="<?php echo $empRow['e_Name'] ?>">
                            </div>
                            <div class="col col-1 mt-4">
                                <label for="retQty"><h4>Qty</h4></label>
                                <input type="text" name="retQty" required class="form-control">
                            </div>

                            <div class="col col-2 mt-4">
                                <label for="retDate"><h4>Return Date:</h4></label>
                                <input type="date" name="retDate" required class="form-control">
                            </div>

                            <div class="col col-2 mt-5">
                                <button type="submit" name="returnBTN" class="btn btn-primary">Return Stock</button>
                            </div>
                            <div class="col col-2 mt-5">
                                <a href="../Admin_Interface/ReturnList_Interface.php" class="btn btn-outline-primary">Cancel</a>
                            </div>

                        </div>

                    </form>

                    
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>