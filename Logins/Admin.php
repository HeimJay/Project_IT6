<?php
include "../Database/db_connect.php";
include "../Database/header.html";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'Aileron';
            src: url('../Fonts/aileron-regular.woff2') format('woff2'),
                url('../Fonts/aileron-regular.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Aileron', sans-serif;
        }

        .input-container {
            position: relative;
        }

        .input-container img {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
        }

        .input-with-icon {
            padding-left: 45px;
        }
    </style>
</head>

<body>
    <div class="container-fluid vh-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-5">
                <div class="card shadow">
                    <img src="../Images/Vulcanizing.png" class="card-img-top mx-auto my-2" style="width: 250px; height: 200px;" alt="Vulcanizing.png">
                    <div class="card-body mt-1">
                        <form action="../User_Interface/function.php" method="POST">
                            <div class="row justify-content-center">
                                <div class="col col-9 mt-1 text-center">
                                    <h1>Login as Admin</h1>
                                </div>
                                <div class="col col-9 mt-1">
                                    <label for="usrname">
                                        <h5>USERNAME</h5>
                                    </label>
                                    <div class="input-container">
                                        <img src="../Images/user-interface.png" alt="User Icon">
                                        <input type="text" name="usrname" id="usrname" placeholder="Enter Username" required class="form-control rounded-pill border border-dark input-with-icon" style="height: 45px;">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col col-9 mt-2">
                                    <label for="passwrd">
                                        <h5>PASSWORD</h5>
                                    </label>
                                    <div class="input-container">
                                        <img src="../Images/padlock.png" alt="Padlock Icon">
                                        <input type="password" name="passwrd" id="passwrd" placeholder="Enter Password" required class="form-control rounded-pill border border-dark input-with-icon" style="height: 45px;">
                                    </div>
                                </div>
                                <div class="col col-9 mt-4 text-center">
                                    <button type="submit" name="loginAdminBTN" required class="form-control rounded-pill btn btn-danger w-100">LOGIN</button>
                                </div>
                                <div class="col col-9 mt-2 text-center">
                                    <a href="User.php" class="form-control rounded-pill btn btn-outline-secondary w-100">CANCEL</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>