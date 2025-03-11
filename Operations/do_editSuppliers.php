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
                <img src="../Images/wholesale.png" class="p-1" style="width: 11%; height: auto" alt="dashboard.png">
                <h1>Supplier</h1>
            </div>

            

        </div>
        <div class="view-content-div">

            <div class="row w-100" style="height: 480px; margin:10px; background-color:white; border-radius:10px;">
                <div class="col col-12">

                    <form action="../Database_Operations/execute_Suppliers.php" method="POST">
                        <div class="row justify-content-center text-center">
                            <div class="col col-5 mt-1 border" style="background-color:rgb(216, 79, 79); border-radius:10px;">
                                <h1 style="color:white; padding-top: 10px;">Edit Supplier</h1>
                            </div>
                        </div>
                        <div class="row mt-3" style="height: 250px;">
                            <div class="col col-12">
                                <div class="row justify-content-around">
                                    <div class="col col-5">
                                        <input type="text" name="sID" hidden value="<?php echo $row['supplier_ID'] ?>">
                                        <label for="Sfname"><h4>First Name:</h4></label>
                                        <input type="text" name="Sfname" readonly required class="form-control w-100" value="<?php echo $row['sFname'] ?>">
                                    </div>
                                    <div class="col col-5">
                                        <label for="Slname"><h4>Last Name:</h4></label>
                                        <input type="text" name="Slname" readonly required class="form-control w-100" value="<?php echo $row['sLname'] ?>">
                                    </div>
                        
                                </div>
                                <div class="row justify-content-around">
                                    <div class="col col-5">
                                        <label for="conNum"><h4>Contact #:</h4></label>
                                        <input type="text" name="conNum" required class="form-control w-100" value="<?php echo $row['sContactNum'] ?>">
                                    </div>
                                    <div class="col col-5">
                                        <label for="Scname"><h4>Company Name:</h4></label>
                                        <input type="text" name="Scname" required class="form-control w-100" value="<?php echo $row['company_name'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col col-12">
                                <button type="submit" name="sEditSaveBTN" class="btn btn-danger w-100 mt-3">Save</button>
                                <a href="../Admin_Interface/Suppliers_Interface.php" class="btn btn-dark w-100 mt-3">Cancel</a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>

            

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>