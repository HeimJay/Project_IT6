<?php
    include "../Database/db_connect.php";

    try{
        $empID = $_POST['empID'];

        $sql = "SELECT * FROM employees WHERE employee_ID='$empID'";
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
    <title>Admin Dashboard | Edit Employee</title>
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
                <h1><img src="../Images/list-items.png" width="40"> Employee: <?php echo $row['e_Name'] ?></h1>
            </div>

            <div class="card border-danger">
                <div class="card-header bg-danger text-white text-center">
                    <h5>Edit Employee</h5>
                </div>
                <div class="card-body">
                    <form action="../Database_Operations/execute_employees.php" method="post">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="eFname" class="form-label"><h4>First Name:</h4></label>
                                <input type="text" name="eFname" id="eFname" class="form-control" value="<?php echo $row['eFname'] ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="eLname" class="form-label"><h4>Last Name:</h4></label>
                                <input type="text" name="eLname" id="eLname" class="form-control" value="<?php echo $row['eLname'] ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="eAddress" class="form-label"><h4>Address:</h4></label>
                                <input type="text" name="eAddress" id="eAddress" class="form-control" value="<?php echo $row['eAddress'] ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="eContact" class="form-label"><h4>Contact #:</h4></label>
                                <input type="text" name="eContact" id="eContact" class="form-control" value="<?php echo $row['eContactNum'] ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="ePosition" class="form-label"><h4>Position:</h4></label>
                                <input type="text" name="ePosition" id="ePosition" class="form-control" value="<?php echo $row['emp_position'] ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="eUname" class="form-label"><h4>Username:</h4></label>
                                <input type="text" name="eUname" id="eUname" class="form-control" value="<?php echo $row['e_username'] ?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" value="<?php echo $empID ?>" hidden name="empID">
                                <label for="ePass" class="form-label"><h4>Password:</h4></label>
                                <input type="text" name="ePass" id="ePass" class="form-control" value="<?php echo $row['e_password'] ?>" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-danger" name="deleteEmpBTN" type="submit">Delete</button>
                            <button class="btn btn-danger" name="editEmpBTN" type="submit">Save</button>
                            <a href="../Admin_Interface/ItemList_Interface.php" class="btn btn-dark">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>