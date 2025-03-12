<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style_adminInterface.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php
include "../Database/db_connect.php";
session_start();

$emp_ID = $_SESSION['emp_login_ID'];

try {
    $sql = "SELECT * FROM employees WHERE employee_ID='$emp_ID'";
    $do = $conn->query($sql);
    $empRow = $do->fetch_assoc();
} catch (\Exception $e) {
    die($e);
}
?>

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
            <div class="d-flex align-items-center">
                <img src="../Images/dashboard.png" width="40">
                <h2 class="ms-3">Welcome, <?php echo $empRow['e_Name'] ?></h2>
            </div>

            <div class="row mt-4">
                <!-- Recent Orders -->
                <div class="col-md-6">
                    <div class="card border-danger ">
                        <div class="card-header bg-danger text-white">
                            <h5 class="text-center mb-0">Recent Orders</h5>
                        </div>
                        <div class="card-body overflow-auto" style="max-height: 250px;">
                            <?php
                            $cDate = date("Y-m-d");
                            $sql = "SELECT * FROM orders_view WHERE order_date='$cDate'";
                            $do = $conn->query($sql);

                            if ($do->num_rows > 0) {
                                while ($rows = $do->fetch_assoc()) {
                            ?>
                                    <div class="border rounded p-2 mb-2 bg-light">
                                        <strong>Name:</strong> <?php echo $rows['c_name'] ?><br>
                                        <strong>Item:</strong> <?php echo $rows['item_name'] ?><br>
                                        <strong>Qty:</strong> <?php echo $rows['order_quantity'] ?><br>
                                        <strong>Date:</strong> <?php echo $rows['order_date'] ?>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "<p class='text-center text-danger'><strong>No Current Orders</strong></p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Stock In -->
                <div class="col-md-6">
                    <div class="card border-danger ">
                        <div class="card-header bg-danger text-white">
                            <h5 class="text-center mb-0">Stock In</h5>
                        </div>
                        <div class="card-body overflow-auto" style="max-height: 250px;">
                            <?php
                            $sql = "SELECT * FROM stock_in_views ORDER BY arrival_date DESC";
                            $do = $conn->query($sql);

                            if ($do->num_rows > 0) {
                                while ($rows = $do->fetch_assoc()) {
                            ?>
                                    <div class="border rounded p-2 mb-2 bg-light">
                                        <strong>Employee:</strong> <?php echo $rows['e_Name'] ?><br>
                                        <strong>Supplier:</strong> <?php echo $rows['s_Name'] ?><br>
                                        <strong>Company:</strong> <?php echo $rows['company_name'] ?><br>
                                        <strong>Item:</strong> <?php echo $rows['item_name'] ?><br>
                                        <strong>Qty:</strong> <?php echo $rows['arrived_quantity'] ?><br>
                                        <strong>Arrived Date:</strong> <?php echo $rows['arrival_date'] ?>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "<p class='text-center text-danger'><strong>No Stock Arrivals</strong></p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Low Stock Alert -->
            <div class="row mt-4">
                <div class="col">
                    <div class="card border-warning ">
                        <div class="card-header bg-warning text-dark text-center">
                            <h5>Low Stock Alert</h5>
                        </div>
                        <div class="card-body overflow-auto" style="max-height: 250px;">
                            <?php
                            $sql = "SELECT * FROM stocks WHERE stock_quantity < 10";
                            $do = $conn->query($sql);

                            if ($do->num_rows > 0) {
                                while ($rows = $do->fetch_assoc()) {
                            ?>
                                    <div class="border rounded p-2 mb-2 bg-light">
                                        <strong>Item:</strong> <?php echo $rows['item_name'] ?><br>
                                        <strong>Category:</strong> <?php echo $rows['category'] ?><br>
                                        <strong>In Stock:</strong> <?php echo $rows['stock_quantity'] ?>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "<p class='text-center text-warning'><strong>All stocks are sufficient</strong></p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
