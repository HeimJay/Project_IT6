<?php
    include "../Database/header.html";
    session_start();
    $custID = $_SESSION['login_ID'];

    include "../Database/db_connect.php";
    
    try{
        $sql = "SELECT * FROM customers WHERE customer_ID='$custID'";
        $do = $conn->query($sql);
        $row = $do->fetch_assoc();

        $_SESSION['custName'] = $row['cFname'];

    }catch(\Exception $e){
        die($e);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="userStyle.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .account-row {
            background-color: white; /* Change this to your desired background color */
            border-radius: 10px;
            color: black; /* Change this to your desired text color */
            margin-bottom: 10px; /* Add some space between rows */
        }
    </style>
</head>

<body>

    <div class="container-fluid vh-100">
        <div class="row h-100">

            <!-- SIDE PANEL -->
            <div class="col col-3 bg-danger text-white p-3">
                <div class="text-center">
                    <img src="../Images/Vulcanizing.png" class="img-fluid rounded-circle mb-2" style="width: 70%;">
                    <h5>3G Tires Parts and Vulcanizing Shop</h5>
                </div>

                <div class="mt-3">
                    <div class="border p-2 rounded text-center">
                        <h4>Welcome, <?php echo $row['cFname'] ?></h4>
                    </div>

                    <div class="mt-3">
                        <a href="user_account.php" class="nav-link text-white rounded-pill btn btn-outline-dark">Account</a>
                    </div>

                    <div class="mt-3">
                        <a href="history_order.php" class="nav-link text-white rounded-pill btn btn-outline-dark">View Order/s History</a>
                    </div>

                    <div class="mt-3">
                        <form action="function.php" method="POST">
                            <button type="submit" name="signoutBTN" class="btn btn-dark w-100">Sign out</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- PANEL -->
            <div class="col col-9">

                <!-- HEADER -->   
                <div class="row mt-3 mx-4 justify-content-center text-center" style="height: 70px; background-color: rgb(216, 79, 79); border-radius:10px;">
                    <div class="col col-3" style="color:white; height: 70px;">
                        <h2 class="pt-3">Account</h2>
                    </div>
                </div>

                <!-- BODY -->
                <div class="row mx-4 border mt-2" style="height: 530px;">
                    <div class="col col-12">
                        <div class="row account-row">
                            <div class="col col-6">
                                <div class="row m-2" style="height: 510px;">
                                    <div class="col col-12">
                                        <div class="row justify-content-center mt-5">
                                            <div class="col col-5 border text-center" style="background: white; border-radius:50%;">
                                                <img src="../Images/user-interface.png" alt="User Icon" style="width: 150px; height: 150px; margin-top: 25px; margin-bottom: 25px;">
                                            </div>
                                        </div>

                                        <div class="row align-items-center" style="height: 70px;">
                                            <div class="col text-center">
                                                <h4 style="background-color: white; border-radius:10px;">Hi, <?php echo $row['c_name'] ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="row m-2" style="height: 510px;">
                                    <div class="col co-12">
                                        <div class="row justify-content-center mt-5" style="height: 400px;">
                                            <div class="col col-10 border" style="background-color:white; border-radius:20px;">
                                                <form action="function.php" method="post">
                                                    <div class="row mt-4">
                                                        <div class="col col-6">
                                                            <input type="text" hidden name="cID" value="<?php echo $custID ?>">

                                                            <label for="">First Name:</label> <br>
                                                            <input type="text" name="cFname" class="form-control rounded-pill" value="<?php echo $row['cFname'] ?>"><br>
                                                            <label for="">Contact #:</label> <br>
                                                            <input type="text" name="ccont" class="form-control rounded-pill" value="<?php echo $row['cContactNum'] ?>"><br>
                                                            <label for="">Username:</label> <br>
                                                            <input type="text" name="usrname" class="form-control rounded-pill" value="<?php echo $row['c_username'] ?>"><br>
                                                        </div>
                                                        <div class="col col-6">
                                                            <label for="">Last Name:</label> <br>
                                                            <input type="text" name="cLname" class="form-control rounded-pill" value="<?php echo $row['cLname'] ?>"><br>
                                                            <label for="">Address:</label> <br>
                                                            <input type="text" name="addr" class="form-control rounded-pill" value="<?php echo $row['address'] ?>"><br>
                                                            <label for="">Password:</label> <br>
                                                            <input type="text" name="passwrd" class="form-control rounded-pill" value="<?php echo $row['c_password'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col col-6">
                                                            <button class="btn btn-info w-100" name="cDelBTN">Delete</button>
                                                        </div>
                                                        <div class="col col-6">
                                                            <button class="btn btn-info w-100" name="cSaveBTN">Save</button>
                                                        </div>
                                                        <div class="col col-12 mt-3">
                                                            <a href="order_interface.php" class="btn btn-outline-primary w-100">Cancel</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>