<?php
session_start();


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "vulcanizing";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_name = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM admin WHERE admin_name = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $admin_name);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        if ($password === $row["password"]) { 
            $_SESSION["admin_name"] = $row["admin_name"];
            header("Location: Dashboard_Interface.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Admin not found.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <img src="Vulcanizing.png" class="card-img-top mx-auto mb-0" style="width: 90%; height: auto;" alt="Vulcanizing.png">
                <div class="d-grid gap-0 mt-0">
                    <h1 class="card-title text-center" style="min-height: 4rem;">Login as Admin</h1>
                    <form method="post" action="">
                        <h5 class="ms-5" style="margin-left: 12px;">USERNAME</h5>
                        <div class="d-flex align-items-center mb-3" style="width: 85%; margin: 0px 12px 12px 12px">
                            <img src="user-interface.png" style="width: 10%; height: auto; margin-right: 4px;" alt="logo.png">
                            <input type="text" class="form-control rounded-pill" name="username" placeholder="Enter your username" required>
                        </div>
                        <h5 class="ms-5" style="margin-left: 12px;">PASSWORD</h5>
                        <div class="d-flex align-items-center mb-3" style="width: 85%; margin: 0px 12px 12px 12px">
                            <img src="padlock.png" style="width: 10%; height: auto; margin-right: 4px;" alt="padlock.png">
                            <input type="password" class="form-control rounded-pill" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-danger rounded-pill mx-auto d-flex align-items-center justify-content-center mt-3" style="width: 75%; height: 42px;">Login</button>
                    </form>
                    <?php if (isset($error)) echo "<p class='text-danger mt-2 text-center'>$error</p>"; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
