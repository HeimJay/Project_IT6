<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>  
    <div class="container vh-100">
        <div class="row border justify-content-center align-items-center h-100">
            <div class="col col-7">
                <div class="card shadow">
                    <div class="card-body">
                    
                    <div class="row justify-content-center">
                        <div class="col col-8 text-center"><H1>Create Account</H1></div>
                    </div>

                    <form action="function.php" method="POST">

                        <div class="row justify-content-center">
                            <div class="col col-5 mt-3">
                                <label for="fname"><h5>First Name:</h5></label>
                                <input type="text" name="fname" id="fname" required class="form-control">
                            </div>
                            
                            <div class="col col-5 mt-3">
                                <label for="lname"><h5>Last Name:</h5></label>
                                <input type="text" name="lname" id="lname" required class="form-control">
                            </div>

                            <div class="col col-5 mt-3">
                                <label for="caddress"><h5>Address:</h5></label>
                                <input type="text" name="caddress" id="caddress" required class="form-control">
                            </div>

                            <div class="col col-5 mt-3">
                                <label for="cConNum"><h5>Contact #:</h5></label>
                                <input type="text" name="cConNum" id="cConNum" required class="form-control">
                            </div>




                            <div class="col col-5 mt-3">
                                <label for="uName"><h5>Email:</h5></label>
                                <input type="email" name="uName" id="uName" required class="form-control">
                            </div>
                            
                            <div class="col col-5 mt-3">
                                <label for="pw"><h5>Password:</h5></label>
                                <input type="text" name="pw" id="pw" required class="form-control">
                            </div>
                            
                            

                        </div>

                        <div class="row justify-content-center mt-5">
                    
                            <div class="col col-10">
                                <button type="submit" class="btn btn-primary w-100" name="crAcc">Create Account</button>
                            </div>
                        </div>

                    </form>

                    <div class="row justify-content-center mt-3">
                    
                        <div class="col col-10">
                            <a href="../Logins/User.php" class="btn btn-outline-primary w-100" >Cancel</a>
                        </div>
                    </div>

                    


                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>