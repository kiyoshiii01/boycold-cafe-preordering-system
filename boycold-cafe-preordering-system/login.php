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

        <h1 class="form-title" style="font-size: 2.8rem;">Login</h1>

        <div class="form-box-container">
            <form action="home.php" method="GET">

                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter email">
                </div>

                <div class="input-group" style="margin-bottom: 25px;">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter Password">
                </div>

                <div style="margin-bottom: 20px;">
                    <button type="submit" class="submit-btn">
                        Log in
                    </button>
                </div>
            </form>

            <!-- No Account / Register Link -->
            <div class="form-footer-link" style="text-align: center; margin-top: 15px;">
                <span style="color: #4A3525;">No account?</span> <a href="create_account.php" style="color: #4A3525; font-weight: bold; text-decoration: underline;">Register</a>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>