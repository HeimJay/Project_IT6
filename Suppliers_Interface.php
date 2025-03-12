<?php
    include "../Database/header.html";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Suppliers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_adminInterface.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-danger text-white vh-100 p-3" style="width: 250px;">
            <div class="text-center">
                <img src="../Images/Vulcanizing.png" class="img-fluid rounded-circle mb-2" style="width: 70%;">
                <h5>3G Tires & Vulcanizing Shop</h5>
            </div>

            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a href="Dashboard_Interface.php" class="nav-link text-white rounded-pill btn btn-outline-dark">
                        <img src="../Images/dashboard.png" width="25">Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Stocks_Interface.php" class="nav-link text-white rounded-pill btn btn-outline-dark">
                        <img src="../Images/ready-stock.png" width="25"> Stocks
                    </a>
                </li>
                <li class="nav-item">
                    <a href="ProductList_Interface.php" class="nav-link text-white rounded-pill btn btn-outline-dark">
                        <img src="../Images/procurement.png" width="25"> Orders List
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Suppliers_Interface.php" class="nav-link text-white rounded-pill btn btn-outline-dark">
                        <img src="../Images/wholesale.png" width="25"> Suppliers
                    </a>
                </li>
            </ul>

            <hr class="text-white">

            <h6 class="text-center">Maintenance</h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="ItemList_Interface.php" class="nav-link text-white rounded-pill btn btn-outline-dark">
                        <img src="../Images/list-items.png" width="25"> Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="ReturnList_Interface.php" class="nav-link text-white rounded-pill btn btn-outline-dark">
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
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h1><img src="../Images/wholesale.png" width="40"> Suppliers</h1>
                <form action="" method="post" class="d-flex">
                    <input type="text" name="sSearch" placeholder="Search" class="form-control me-2">
                    <button type="submit" name="suppSearchBTN" class="btn btn-danger"><i class="bi bi-search"></i></button>
                </form>
            </div>

            <div class="d-flex justify-content-end mb-4">
                <a href="../Operations/do_addSuppliers.php" class="btn btn-danger">Add Supplier</a>
            </div>

            <div class="card border-danger">
                <div class="card-header bg-danger text-white text-center">
                    <h5>Suppliers List</h5>
                </div>
                <div class="card-body overflow-auto" style="max-height: 400px;">
                    <?php
                        include "../Database/db_connect.php";
                        $sql;
                        if(isset($_POST['suppSearchBTN'])){
                            $sValue = $_POST['sSearch'];
                            $sql = "SELECT * FROM suppliers WHERE sFname LIKE '%$sValue%' OR sLname LIKE '%$sValue%' OR company_name LIKE '%$sValue%'";
                        }else{
                            $sql = "SELECT * FROM suppliers";
                        }
                        try{
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                while($rows = $result->fetch_assoc()){
                    ?>
                        <div class="row border mt-2 py-2" style="background-color: rgb(216, 79, 79); color:white; border-radius: 10px;">
                            <div class="col-8">
                                <strong>Name:</strong> <?php echo $rows['s_Name'] ?><br>
                                <strong>Contact #:</strong> <?php echo $rows['sContactNum'] ?><br>
                                <strong>Company:</strong> <?php echo $rows['company_name'] ?>
                            </div>
                            <div class="col-2">
                                <form action="../Operations/do_editSuppliers.php" method="POST">
                                    <input type="text" name="editSuppID" hidden value="<?php echo $rows['supplier_ID'] ?>">
                                    <button type="submit" name="editBTN" class="btn btn-success mt-3"><i class="bi bi-pencil-square"></i> EDIT</button>
                                </form>
                            </div>
                            <div class="col-2">
                                <form action="../Database_Operations/execute_Suppliers.php" method="POST">
                                    <input type="text" name="deleteSuppID" hidden value="<?php echo $rows['supplier_ID'] ?>">
                                    <button type="submit" class="btn btn-success mt-3" name="deleteBTN"><i class="bi bi-trash"></i> DELETE</button>
                                </form>
                            </div>
                        </div>
                    <?php
                                }
                            }else{
                                echo "<p class='text-center text-danger'><strong>No Result</strong></p>";
                            }
                        }catch(\Exception $e){
                            die($e);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>