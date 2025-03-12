<?php

    include "../Database/db_connect.php";

    try{
        $suppID = $_POST['editSuppID'];
        $sql = "SELECT * FROM suppliers WHERE supplier_ID='$suppID'";
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
    <title>Admin Dashboard | Edit Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
                <h1><img src="../Images/wholesale.png" width="40"> Edit Supplier</h1>
            </div>

            <div class="card border-danger">
                <div class="card-header bg-danger text-white text-center">
                    <h5>Edit Supplier</h5>
                </div>
                <div class="card-body">
                    <form action="../Database_Operations/execute_Suppliers.php" method="POST">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" name="sID" hidden value="<?php echo $row['supplier_ID'] ?>">
                                <label for="Sfname" class="form-label"><h4>First Name:</h4></label>
                                <input type="text" name="Sfname" id="Sfname" class="form-control" value="<?php echo $row['sFname'] ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="Slname" class="form-label"><h4>Last Name:</h4></label>
                                <input type="text" name="Slname" id="Slname" class="form-control" value="<?php echo $row['sLname'] ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="conNum" class="form-label"><h4>Contact #:</h4></label>
                                <input type="text" name="conNum" id="conNum" class="form-control" value="<?php echo $row['sContactNum'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="Scname" class="form-label"><h4>Company Name:</h4></label>
                                <input type="text" name="Scname" id="Scname" class="form-control" value="<?php echo $row['company_name'] ?>" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="../Admin_Interface/Suppliers_Interface.php" class="btn btn-dark">Cancel</a>
                            <button type="submit" name="sEditSaveBTN" class="btn btn-danger">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>