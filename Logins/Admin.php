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
            src: url('path/to/aileron-regular.woff2') format('woff2'),
                url('path/to/aileron-regular.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Aileron', sans-serif;
        }

        .btn-danger {
            font-family: 'Aileron', sans-serif;
            font-size: 23px;
        }

        .card-body a {
            font-size: 23px;
        }

        .form-control {
            border: 2px solid black;

        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">

            <div class="card" style="width: 35rem; min-height: 35rem;">
                <img src="../Images/Vulcanizing.png" class="card-img-top mx-auto mb-0" style="width: 90%; height: auto;" alt="Vulcanizing.png">
                <div class="d-grid gap-0 mt-0">
                    <h1 class="card-title text-center" style="min-height: 4rem;">Login as Admin</h1>
                    <h5 class="ms-5" style="margin-left: 12px;">USERNAME</h5>
                    <div class="d-flex align-items-center mb-3" style="width: 85%; margin: 0px 12px 12px 12px">
                        <img src="../Images/user-interface.png" style="width: 10%; height: auto; margin-right: 4px;" alt="logo.png">
                        <input type="text" class="form-control rounded-pill" placeholder="Enter your username">
                    </div>
                    <h5 class="ms-5" style="margin-left: 12px;">PASSWORD</h5>
                    <div class="d-flex align-items-center mb-3" style="width: 85%; margin: 0px 12px 12px 12px">
                        <img src="../Images/padlock.png" style="width: 10%; height: auto; margin-right: 4px;" alt="padlock.png">
                        <input type="password" class="form-control rounded-pill" placeholder="Enter your password">
                    </div>
                    <a href="../Admin_Interface/Dashboard_Interface.php" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 75%; height: 42px;">Login</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>