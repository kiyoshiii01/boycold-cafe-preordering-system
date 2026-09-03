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
        <!-- Title -->
        <h1 class="form-title" style="font-size: 2.5rem;">Create Account</h1>

        <!-- Form Container -->
        <div class="form-box-container">
            <form action="#" method="POST">
                
                <!-- Full Name Field -->
                <div class="input-group">
                    <label>Full Name</label>
                    <input type="text" required>
                </div>

                <!-- Email Field -->
                <div class="input-group">
                    <label>Email</label>
                    <input type="email" required>
                </div>

                <!-- Phone Number Field -->
                <div class="input-group">
                    <label>Phone Number</label>
                    <input type="tel" required>
                </div>

                <!-- Password Field -->
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" required>
                </div>

                <!-- Confirm Password Field -->
                <div class="input-group" style="margin-bottom: 25px;">
                    <label>Confirm Password</label>
                    <input type="password" required>
                </div>

                <!-- Register Button -->
                <div>
                    <button type="submit" class="submit-btn">
                        Register
                    </button>
                </div>
            </form>
        </div>

        <!-- Back to Login link -->
        <div class="form-footer-link" style="text-align: left; margin-top: 20px;">
            <a href="login.php">← Back to Login</a>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>
</html>