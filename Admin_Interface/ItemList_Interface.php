<?php
    include "../Database/db_connect.php";
    include "../Database/header.html";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Item List</title>
    
    <link rel="stylesheet" href="style_adminInterface.css">
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
                <img src="../Images/list-items.png" class="p-1" style="width: 20%; height: auto" alt="list-items.png">Employees</a>
            <a href="ReturnList_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 85%; height: 42px;">
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
                <img src="../Images/list-items.png" class="p-1" style="width: 10%; height: auto" alt="dashboard.png">
                <h1>Employees</h1>
            </div>

        </div>
        <div class="view-content-div">

            <div class="row border w-100" style="margin-left: 0px; height:500px;">
                <div class="col col-12">


                    <div class="row justify-content-end ">
                        <div class="col col-3">
                            
                            <a href="../Operations/do_addEmployee.php" class="btn btn-danger">Add Employee</a>
                            
                        </div>

                        <div class="col col-12 mt-4" style="overflow: auto;">

                            <?php   
                                try{

                                    $sql = "SELECT * FROM employees";
                                    $do = $conn->query($sql);

                                    if($do->num_rows>0){
                                        while($rows = $do->fetch_assoc()){
                            
                            ?>

                            <form action="" method="post">
                                <div class="row mx-1" style="background-color: rgb(216, 79, 79); border-radius:10px;">
                                    <div class="col col-5 py-2" style="color: white;">
                                        <strong>Name:</strong>
                                        <span><?php echo $rows['e_Name'] ?></span> <br>
                                        <strong>Contact #:</strong>
                                        <span><?php echo $rows['eContactNum'] ?></span>
                                    </div>
                                    <div class="col col-5 py-2" style="color: white;">
                                        <strong>Position:</strong>
                                        <span><?php echo $rows['emp_position'] ?></span> <br>
                                        <strong>Address:</strong>
                                        <span><?php echo $rows['eAddress'] ?></span>
                                    </div>
                                    <div class="col col-2 pt-3">
                                        <button class="btn btn-success">EDIT</button>
                                    </div>
                                </div>
                            </form>

                            <?php  
                                        }
                                    }

                                }catch(\Exception $e){
                                    die($e);
                                }
                            ?>

                        </div>

                    </div>
    
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>