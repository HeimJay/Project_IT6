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
                <img src="../Images/procurement.png" class="p-1" style="width: 25%; height: auto" alt="procurement.png">Orders List</a>
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

            <div class="row w-100" style="margin-left: 0px; height:500px;">
                <div class="col col-12">

                    <form action="" method="post"> 
                        <div class="row justify-content-end align-items-center" style="height: 70px;">
                            <div class="col col-5 mt-2 p-1" style="background-color: rgb(216, 79, 79); border-radius:50px;" >
                               <input type="text" name="sSearch" placeholder="Search" class="form-control rounded-pill border border-dark">
                            </div>
                            <div class="col col-1 mt-2 text-center border" style="background-color: rgb(216, 79, 79); border-radius:10px; padding-top:5px; padding-bottom:5px;">
                                <button type="submit" name="empSearchBTN" class="btn btn-danger"><i class="bi bi-search"></i></button>
                            </div>
                            <div class="col col-3 text-center">
                        
                                <a href="../Operations/do_addEmployee.php" class="btn btn-danger">Add Employee</a>
                        
                            </div>
                        </div>
                    </form>

                    <div class="row m-1" style="overflow: auto; height:430px;">

                        <div class="col col-12 mt-4" >

                            <?php 
                            
                                $sql;

                                if(isset($_POST['empSearchBTN'])){
                                    $sValue = $_POST['sSearch'];

                                    $sql = "SELECT * FROM employees WHERE eFname LIKE '%$sValue%' OR
                                                                            eLname LIKE '%$sValue%' OR
                                                                            emp_position LIKE '%$sValue%' OR
                                                                            eAddress LIKE '%$sValue%'";
                                }
                                else{
                                    $sql = "SELECT * FROM employees";
                                }

                                try{
                                    
                                    $do = $conn->query($sql);

                                    if($do->num_rows>0){
                                        while($rows = $do->fetch_assoc()){
                            
                            ?>

                                <form action="../Operations/do_editEmployee.php" method="post">
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
                                            <input type="text" hidden name="empID" value="<?php echo $rows['employee_ID'] ?>">
                                            <button class="btn btn-success" type="submit">EDIT</button>
                                        </div>
                                    </div>
                                </form>

                            <?php  
                                        }
                                    }else{
                                        echo "
                                            <div class='row mt-2 py-2 justify-content-center'>
                                                <div class='col col-5 text-center'>
                                                <Strong>No Result</Strong>
                                                </div>
                                            </div>
                                            ";
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