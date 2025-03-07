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
    
    
</head>

<body>
<div class="container-fluid vh-100">
        <div class="row d-flex justify-content-center align-items-center h-100">

            
            <div class="col col-5">
                <div class="card shadow">
                    <img src="../Images/Vulcanizing.png" class="card-img-top mx-auto mb-5" style="width: 200px; height: 150px;" alt="Vulcanizing.png">

                    <div class="card-body mt-1">
                        
                        <form action="../User_Interface/function.php" method="POST">
                            <div class="row justify-content-center" >
                                <div class="col col-9 mt-2">
                                    <label for="usrname"><h3>Username:</h3></label>
                                    <input type="text" name="usrname" id="usrname" required class="form-control">
                                </div>
                                <div class="w-100"></div>
                                <div class="col col-9 mt-2" >
                                    <label for="passwrd"><h3>Password:</h3></label>
                                    <input type="password" name="passwrd" id="passwrd" required class="form-control">
                                </div>

                                <div class="col col-9 mt-2 text-center" >
                                    <button type="submit" name="loginAdminBTN" class="btn btn-primary w-100">Login</button>
                                </div>


                                <div class="col col-9 mt-2 text-center">       
                                    <a href="User.php" class="btn btn-outline-primary w-100">Cancel</a>
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