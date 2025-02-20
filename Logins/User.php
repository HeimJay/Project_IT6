<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>
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
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">

            <div class="card" style="width: 30rem; min-height: 35rem;">
                <img src="../Images/Vulcanizing.png" class="card-img-top mx-auto mb-5" style="width: 90%; height: auto;" alt="Vulcanizing.png">
                <div class="d-grid gap-6 mt-3">
                    <a href="#" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center" style="width: 75%; height: 4rem;">Browse Products</a>
                    <div class="card-body text-center mt-1">
                        <a href="Admin.php">Login as Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>