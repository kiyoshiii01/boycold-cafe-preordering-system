<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Login</title>
    <link rel="stylesheet" href="css/style.css?v=2">
</head>
<body class="form-page">

    <div style="width: 100%; max-width: 450px; text-align: center; margin: auto;">
        <!-- Login Title sa Itaas -->
        <h1 class="form-title" style="font-size: 2.8rem; color: white; margin-bottom: 20px;">Login</h1>

        <!-- Form Container -->
        <div class="form-box-container">
            <form action="home.php" method="GET">
                
                <!-- Email Field (Tinanggal ang required) -->
                <div class="input-group" style="margin-bottom: 20px; text-align: left;">
                    <label style="color: white; font-weight: bold; display: block; margin-bottom: 5px;">Email</label>
                    <input type="email" name="email" placeholder="Enter email" style="width: 100%; padding: 12px; border-radius: 6px; border: none; box-sizing: border-box; background-color: #C2D69B;">
                </div>

                <!-- Password Field (Tinanggal ang required) -->
                <div class="input-group" style="margin-bottom: 25px; text-align: left;">
                    <label style="color: white; font-weight: bold; display: block; margin-bottom: 5px;">Password</label>
                    <input type="password" name="password" placeholder="Enter Password" style="width: 100%; padding: 12px; border-radius: 6px; border: none; box-sizing: border-box; background-color: #C2D69B;">
                </div>

                <!-- Log In Button -->
                <div style="margin-bottom: 20px;">
                    <button type="submit" class="submit-btn" style="width: 100%; padding: 12px; background-color: #C2D69B; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; font-size: 1.1rem;">
                        Log in
                    </button>
                </div>
            </form>

            <!-- No Account / Register Link -->
            <div style="text-align: center; color: white; font-size: 1rem; margin-top: 15px;">
                No account? <a href="create_account.php" style="color: white; font-weight: bold; text-decoration: underline;">Register</a>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>