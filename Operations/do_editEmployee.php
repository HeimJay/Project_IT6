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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
     
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
                <h1>Employee: <?php echo $row['e_Name'] ?></h1>
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
                                    <div class="col col-3" style="color: white; border-radius: 10px; background-color: rgb(216, 79, 79);">
                                        <h2 style="text-align: center; margin-top: 3px;">Edit Employee</h2>
                                    </div>

                                </div>

                                <form action="../Database_Operations/execute_employees.php" method="post">
                                    <div class="row">

                                        <div class="col col-4 mt-2">
                                            <label for="eFname"><h4>First Name:</h4></label> <br>
                                            <input type="text" name="eFname" readonly id="eFname" class="form-control" required value="<?php echo $row['eFname'] ?>">
                                        </div>
                                        <div class="col col-4 mt-2">
                                            <label for="eLname"><h4>Last Name:</h4></label> <br>
                                            <input type="text" name="eLname" readonly id="eLname" class="form-control" required value="<?php echo $row['eLname'] ?>">
                                        </div>
                                        <div class="col col-4 mt-2">
                                            <label for="eAddress"><h4>Address:</h4></label> <br>
                                            <input type="text" name="eAddress" id="eAddress" class="form-control" required value="<?php echo $row['eAddress'] ?>">
                                        </div>


                                        <div class="col mt-4">
                                            <label for="eContact"><h4>Contact #:</h4></label> <br>
                                            <input type="text" name="eContact" id="eContact" class="form-control" required value="<?php echo $row['eContactNum'] ?>">
                                        </div>
                                        <div class="col mt-4">
                                            <label for="ePosition"><h4>Position:</h4></label> <br>
                                            <input type="text" name="ePosition" id="ePosition" class="form-control" required value="<?php echo $row['emp_position'] ?>">
                                        </div>

                                        <div class="col mt-4">
                                            <label for="eUname"><h4>Username:</h4></label> <br>
                                            <input type="text" name="eUname" readonly id="eUname" class="form-control" required value="<?php echo $row['e_username'] ?>">
                                        </div>
                                        <div class="col mt-4">
                                            <input type="text" value="<?php echo $empID ?>" hidden name="empID">
                                            <label for="ePass"><h4>Password:</h4></label> <br>
                                            <input type="text" name="ePass" id="ePass" class="form-control" required value="<?php echo $row['e_password'] ?>">
                                        </div>

                                        
                                        
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col col-6">
                                            <button class="btn btn-danger w-100" name="deleteEmpBTN" type="submit">Delete</button>
                                        </div>
                                        <div class="col col-6">
                                            <button class="btn btn-danger w-100" name="editEmpBTN" type="submit">Save</button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col col-12">
                                        <a href="../Admin_Interface/ItemList_Interface.php" class="btn btn-dark fs-4 w-100">Cancel</a>
                                        </div>
                                    </div>
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