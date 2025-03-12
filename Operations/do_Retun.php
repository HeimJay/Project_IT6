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
    <title>Admin Dashboard | Return Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Admin_Interface/style_adminInterface.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-danger text-white vh-100 p-3" style="width: 250px;">
            <div class="text-center">
                <img src="../Images/Vulcanizing.png" class="img-fluid rounded-circle mb-2" style="width: 70%;">
                <h5>3G Tires Parts and Vulcanizing Shop</h5>
            </div>

            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a href="../Admin_Interface/Dashboard_Interface.php" class="nav-link text-white rounded-pill btn btn-outline-dark">
                        <img src="../Images/dashboard.png" width="25">Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Admin_Interface/Stocks_Interface.php" class="nav-link text-white rounded-pill btn btn-outline-dark">
                        <img src="../Images/ready-stock.png" width="25"> Stocks
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Admin_Interface/ProductList_Interface.php" class="nav-link text-white rounded-pill btn btn-outline-dark">
                        <img src="../Images/procurement.png" width="25"> Orders List
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Admin_Interface/Suppliers_Interface.php" class="nav-link text-white rounded-pill btn btn-outline-dark">
                        <img src="../Images/wholesale.png" width="25"> Suppliers
                    </a>
                </li>
            </ul>

            <hr class="text-white">

            <h6 class="text-center">Maintenance</h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="../Admin_Interface/ItemList_Interface.php" class="nav-link text-white rounded-pill btn btn-outline-dark">
                        <img src="../Images/list-items.png" width="25"> Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Admin_Interface/ReturnList_Interface.php" class="nav-link text-white rounded-pill btn btn-outline-dark">
                        <img src="../Images/document.png" width="25"> Return List
                    </a>
                </li>
            </ul>

            <form action="../User_Interface/function.php" method="post" class="mt-3">
                <button type="submit" name="signoutBTN" class="btn btn-dark w-100">
                    <img src="../Images/logout.png" width="25"> Sign Out
                </button>
            </form>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1><img src="../Images/document.png" width="40"> Return Stock</h1>
            </div>

            <div class="card border-danger">
                <div class="card-header bg-danger text-white text-center">
                    <h5>Return Stock</h5>
                </div>
                <div class="card-body">
                    <form action="../Database_Operations/returnStock.php" method="post">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="selected_item" class="form-label"><h4>Stock ID/Name:</h4></label>
                                <select name="selected_item" id="selected_item" class="form-select">
                                    <option value="">None</option>
                                    <?php
                                        try{
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
                            <div class="col-md-4">
                                <label for="selected_supplier" class="form-label"><h4>Supplier ID/Name:</h4></label>
                                <select name="selected_supplier" id="selected_supplier" class="form-select">
                                    <option value="">None</option>
                                    <?php
                                        try{
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
                            <div class="col-md-4">
                                <label for="sel_emp" class="form-label"><h4>Employee:</h4></label>
                                <input type="text" name="selected_employee" hidden value="<?php echo $id ?>">
                                <input type="text" disabled readonly class="form-control" value="<?php echo $empRow['e_Name'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="retQty" class="form-label"><h4>Qty:</h4></label>
                                <input type="text" name="retQty" id="retQty" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="retDate" class="form-label"><h4>Return Date:</h4></label>
                                <input type="date" name="retDate" id="retDate" class="form-control" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" name="returnBTN" class="btn btn-primary">Return Stock</button>
                            <a href="../Admin_Interface/ReturnList_Interface.php" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>