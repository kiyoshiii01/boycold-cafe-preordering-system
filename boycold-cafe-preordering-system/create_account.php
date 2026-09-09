<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boycold Cafe - Create Account</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="form-page">

    <div style="width: 100%; max-width: 450px; text-align: center;">
        <h1 class="form-title" style="font-size: 2.5rem;">Create Account</h1>

        <div class="form-box-container">
            <form action="#" method="POST">
                
                <div class="input-group">
                    <label>Full Name</label>
                    <input type="text" name="fullname" placeholder="Enter full name" required>
                </div>

                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter email" required>
                </div>

                <div class="input-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" placeholder="Enter phone number" required>
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter password" required>
                </div>

                <div class="input-group" style="margin-bottom: 25px;">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm password" required>
                </div>

                <div>
                    <button type="submit" class="submit-btn">
                        Register
                    </button>
                </div>
            </form>
        </div>

        <div class="form-footer-link" style="text-align: left; margin-top: 20px;">
            <a href="login.php" style="color: #4A3525; font-weight: bold; text-decoration: underline;">← Back to Login</a>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>